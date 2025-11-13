<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Saledetail;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        // $price = Product::where('id',$request->product_id)->first()->selling_price;

        //$post_service->receipt gets our sale id



        $newcart= [];
        $post_service = Sales::create([
        'paid' => $request->paid,
        'total' => $request->total,
        'discount' => $request->discount,
        'customer_name' => $request->customer_name,
        'customer_contact' => $request->customer_contact,
        'date' => $request->date,
        'product_total' => $request->product_total,
        'business_id' => Auth::user()->business_id,
        ]);

        $product = Product::with('member','unit')->get();
        $cart = Cart::with('cart')->get();
        $total = 0;
        foreach($cart as $carts){
            $post_sale = Saledetail::create([
                'sale_id' => $post_service->id,
                'product_id' => $carts->product_id,
                'qty' => $carts->qty,
                'selling_priceid' => $carts->selling_priceid,
                // 'unit_id' => $request->unit_id,
                'business_id' => Auth::user()->business_id,
            ]);
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();
            $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            
            $stk = Stock::where('business_id', Auth::user()->business_id)->where('product_id', $carts->product_id)->first();
            $pdt = Product::where('business_id', Auth::user()->business_id)->where('id', $carts->product_id)->first();


            $stk->qty = $stk->qty-$carts->qty;
            $pdt->quantity = $pdt->quantity-$carts->qty;

            $stk->save();
            $pdt->save();

            $carts->delete();
            $newcart = Cart::with('cart')->where('business_id', Auth::user()->business_id)->get();
        }
        return view('cart.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'cart'=>$newcart,'total'=>0,'image'=>$image,'name'=>$name,'receipt'=>$post_service])->with('messages', "Sale added successfully");
    }


    public function printbtn(Request $request)
    {
        // $price = Product::where('id',$request->product_id)->first()->selling_price;

        //$post_service->receipt gets our sale id

        $newcart= [];
        $post_service = Sales::create([
        'paid' => $request->paid,
        'total' => $request->total,
        'discount' => $request->discount,
        'customer_name' => $request->customer_name,
        'customer_contact' => $request->customer_contact,
        'date' => $request->date,
        'product_total' => $request->product_total,
        'business_id' => Auth::user()->business_id,
        ]);

        $product = Product::with('member','unit')->get();
        $cart = Cart::with('cart')->get();
        $total = 0;
        foreach($cart as $carts){
            $post_sale = Saledetail::create([
                'sale_id' => $post_service->id,
                'product_id' => $carts->product_id,
                'qty' => $carts->qty,
                'selling_priceid' => $carts->selling_priceid,
                // 'unit_id' => $request->unit_id,
                'business_id' => Auth::user()->business_id,
            ]);
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();

            $stk = Stock::where('business_id', Auth::user()->business_id)->where('product_id', $carts->product_id)->first();
            $pdt = Product::where('business_id', Auth::user()->business_id)->where('id', $carts->product_id)->first();


            $stk->qty = $stk->qty-$carts->qty;
            $pdt->quantity = $pdt->quantity-$carts->qty;

            $stk->save();
            $pdt->save();

            $carts->delete();
            $newcart = Cart::with('cart')->where('business_id', Auth::user()->business_id)->get();
        }
        return view('cart.index',['license'=>$license,'product'=>$product,'cart'=>$newcart,'total'=>0,'image'=>$image,'name'=>$name,'receipt'=>$post_service])->with('messages', "Receipt printed successfully");;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }

    public function receipt($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();


        $license = Business::where('id', Auth::user()->business_id)->first();

        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        $receipt = Sales::with('salelistpdt')->where('business_id', Auth::user()->business_id)->get();
        return view('cart.receipt',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'name'=>$name,'receipt'=>$receipt]);

    //    return view('cart.receipt');
    }

}
