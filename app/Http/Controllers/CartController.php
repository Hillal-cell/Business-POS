<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_cart ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $license = Business::where('id', Auth::user()->business_id)->first();

            $product = Product::with('member','unit')->where('business_id', Auth::user()->business_id)->get();
            $cart = Cart::with('cart')->where('business_id', Auth::user()->business_id)->where('user_id', Auth::user()->id)->get();
            // $cart = Cart::with('cart')->where('user_id', Auth::user()->id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);

            $total = 0;
            foreach($cart as $carts){
                $total = $total+($carts->selling_priceid*$carts->qty);
            }
            return view('cart.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'image'=>$image,'cart'=>$cart,'total'=>$total,'name'=>$name]);
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
//Go to Cart table with column product_id we compare it with the request
        $exisitingpdt = Cart::where('product_id', $request->product_id)->where('business_id', Auth::user()->business_id)->where('user_id', Auth::user()->id)->first();

        //We get the id in the product table, compare it with the request of the blade name product_id
        $pdtqty = Product::where('id', $request->product_id)->where('business_id', Auth::user()->business_id)->first();

        if($exisitingpdt){
            return redirect('/cart')->with('error', "Product already exists");
            // return 'This product already exists';
            //Our variable $pdtqty points to quantity in the product table < request in the name of the blade
        }elseif($pdtqty->quantity<$request->qty){
            return redirect('/cart')->with('error', "Quantity exceeds quantity in stock");
        }
        else{
            //When saving  form without having input field for price
        $price = Product::where('id',$request->product_id)->where('business_id', Auth::user()->business_id)->first()->selling_price;
        $post_service = Cart::create([
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'user_id' => Auth::user()->id,
            'selling_priceid' => $price,
            'business_id' => Auth::user()->business_id,
          ]);
          return redirect('/cart');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $cart = Cart::with('cart')->where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('cart.cart',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'cart'=>$cart,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Cart::where('id',$id)->first();
        if ($check) {
            $service = Cart::where('id',$id)->where('business_id', Auth::user()->business_id)->update([
                 'qty' => $request->qty,
                 'selling_priceid' => $request->selling_priceid,

            ]);
        return redirect('/cart')->with('message', "Record updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members=Cart::find($id);
        $members->delete();
        return redirect('/cart')->with('message', "Record removed successfully");
    }
}
