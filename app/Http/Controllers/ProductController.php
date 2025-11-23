<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Unit;
use App\Models\Business;
use App\Models\Task;
use App\Models\Batch;
use App\Models\Stock;
use App\Models\Audit;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  Picqer;
use App\Models\User;
use App\Models\Message;

class ProductController extends Controller
{

    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_product ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();

            $productcategories = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $product = Product::with('member','unit')->where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $unit = Unit::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $pdt = Productcategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('products.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'productcategories'=>$productcategories,'unit'=>$unit,'image'=>$image,'pdt'=>$pdt,'name'=>$name]);
        }else{
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product_code = rand(106890122, 100000000);
        $redColor = '255, 0, 0';

        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes = $generator->getBarcode($product_code,
        $generator::TYPE_STANDARD_2_5, 2, 60);

        $products = Product::where('business_id', Auth::user()->business_id)->create([
            'product_name' => ucfirst(strtolower($request->product_name)),
            'product_code' => $product_code,
            'product_categoryid' => $request->product_categoryid,
            'unit_id' => $request->unit_id,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'alert_stock' => $request->alert_stock,
            'buying_price' => $request->buying_price,
            'barcode' => $barcodes,
            'business_id' => Auth::user()->business_id,
        ]);


        //Saving records to stock table
        $stock = Stock::create([
            'product_id' => $products->id,
            'qty' => $products->quantity,
            'buying_price' => $products->buying_price,
            // 'date' => $products->date,
            'date' => now()->toDateString(),
            'business_id' => Auth::user()->business_id,
            ]);



            $action = 'Product registered successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 3,
            'business_id' => Auth::user()->business_id,
            ]);
          return redirect('/products')->with('messages', "Product saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $product = Product::with('member','unit')->where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('products.product',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $product_code = rand(106890122, 100000000);
        $redColor = '255, 0, 0';

       $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
       $barcodes = $generator->getBarcode($product_code,
       $generator::TYPE_STANDARD_2_5, 2, 60);

        $check = Product::where('id',$id)->first();
        if ($check) {
            $staff = Product::where('id',$id)->where('business_id', Auth::user()->business_id)->update([
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_categoryid' => $request->product_categoryid,
                'unit_id' => $request->unit_id,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'alert_stock' => $request->alert_stock,
                'buying_price' => $request->buying_price,
                'business_id' => Auth::user()->business_id,

            ]);

            $action = 'Product Updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 3,
            'business_id' => Auth::user()->business_id,
            ]);

        return redirect('/products')->with('messages', "Product updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $savings=Product::find($id);
        $savings->update([
          'status'=>0,
        ]);

        $action = 'Product deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 3,
            'business_id' => Auth::user()->business_id,
        ]);
      return redirect()->back();
    }


    public function validateproduct(Request $request){
        $Location = Product::where('product_name','=',$request->name)->where('status',1)->where('business_id', Auth::user()->business_id)->first();
     if($Location){
       return 'exists';
        }else{
         return 'doesnot';
        }
         }


         public function search(Request $request){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $license = Business::where('id', Auth::user()->business_id)->first();
            $product = Product::where('status',1)->whereBetween('created_at', [$request->fromDate,$request->toDate])->where('business_id', Auth::user()->business_id)->get();
            $productcategories = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->get();
            $unit = Unit::where('status',1)->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('products.index',['license'=>$license,'notifications'=>$notifications,'product'=>$product,'productcategories'=>$productcategories,'unit'=>$unit,'image'=>$image,'name'=>$name]);
           }


           public function filter(Request $request)
           {
            $selectedValue = $request->select;

            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $license = Business::where('id', Auth::user()->business_id)->first();


            $productcategories = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $product = Product::with('member','unit')->where('status',1)->where('business_id', Auth::user()->business_id)->where('product_categoryid', $selectedValue)->orderBy('id','desc')->get();
            $unit = Unit::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            // $pdt = Productcategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
               return view('products.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'productcategories'=>$productcategories,'unit'=>$unit,'product'=>$product,'name'=>$name]);

           }

}
