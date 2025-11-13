<?php

namespace App\Http\Controllers;

use App\Models\Productcategory;
use App\Models\Audit;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Message;


class ProductcategoryController extends Controller
{
    public function export()
    {
        return Excel::download(new CategoryExport, 'productcategory.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_productcategory ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $license = Business::where('id', Auth::user()->business_id)->first();
            $productcategory = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
             return view('productcategories.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'productcategory'=>$productcategory,'image'=>$image,'name'=>$name]);
        }else{
            redirect('/');
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

     public function validateImage(Request $request){

    }

    public function store(Request $request)
    {
        $request->validate([
        'category_name' => ['required', 'string', 'min:2'],
        ]);




        if($request->hasfile('image')){
            $file = $request->file('image');
            $sizeInBytes = $file->getSize();
            if ($sizeInBytes > 104857600) { // Check if size is greater than 100MB (104857600 bytes)
                return redirect('/productcategory')->with('error', "Image too big");
            }

            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
        }

        $post = Productcategory::create([
            'category_name' => ucfirst(strtolower($request->category_name)),
            'image'=>$filename??'',
            'business_id' => Auth::user()->business_id,
          ]);

          $action = 'Product Category registered successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 2,
            'business_id' => Auth::user()->business_id,

          ]);

      return redirect('/productcategory')->with('messages', 'Category Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $member = Productcategory::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
         return view('productcategories.productcategory',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'member'=>$member,'image'=>$image,'name'=>$name]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Productcategory $productcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $check = Productcategory::where('id',$id)->first();
        $check->category_name = $request->category_name;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $check->image = $filename;
        }
        $check->save();
        $action = 'Product Category Updated successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 2,
        'business_id' => Auth::user()->business_id,
        ]);

        return redirect('/productcategory')->with('messages', "Product Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category=Productcategory::find($id);
        $category->update([
          'status'=>0,
        ]);

        $action = 'Product Category deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 2,
            'business_id' => Auth::user()->business_id,
        ]);


      return redirect()->back();
    }

    public function validateproductcategory(Request $request){
        $Location = Productcategory::where('category_name','=',$request->name)->where('status',1)->where('business_id', Auth::user()->business_id)->first();
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
            $productcategory = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
             $image = Business::find(Auth::user()->business_id);
             $name = Business::find(Auth::user()->business_id);
            return view('productcategories.index',['license'=>$license,'notifications'=>$notifications,'productcategory'=>$productcategory,'image'=>$image,'name'=>$name]);
           }
}
