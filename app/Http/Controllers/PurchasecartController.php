<?php

namespace App\Http\Controllers;

use App\Models\Purchasecart;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Coreproduct;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
class PurchasecartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();
           
        $product = Coreproduct::where('business_id', Auth::user()->business_id)->get();
        // $stock = Purchasecart::with('productcore')->where('business_id', Auth::user()->business_id)->get();
        $cart = Purchasecart::with('purchasecart')->where('business_id', Auth::user()->business_id)->where('user_id', Auth::user()->id)->get();
        // $cart = Cart::with('cart')->where('user_id', Auth::user()->id)->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);

        $total = 0;
        foreach($cart as $carts){
            $total = $total+($carts->buyingunit*$carts->qty);
        }
        return view('purchasecarts.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'image'=>$image,'cart'=>$cart,'total'=>$total,'name'=>$name]);
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
        // return $request;
        $exisitingpdt = Purchasecart::where('coreproduct_id', $request->coreproduct_id)->where('business_id', Auth::user()->business_id)->where('user_id', Auth::user()->id)->first();

        //We get the id in the product table, compare it with the request of the blade name product_id
        $pdtqty = Purchase::where('id', $request->coreproduct_id)->where('business_id', Auth::user()->business_id)->first();

        if($exisitingpdt){
            return redirect('/purchasecart')->with('error', "Core Product already exists");
            // return 'This product already exists';
            //Our variable $pdtqty points to quantity in the product table < request in the name of the blade
        }
        else{
            //When saving  form without having input field for price
         $post_service = Purchasecart::create([
            'coreproduct_id' => $request->coreproduct_id,
            'qty' => $request->qty,
            'user_id' => Auth::user()->id,
            'buyingunit' => $request->buyingunit,
            'expirydate' => $request->expirydate,
            'batchno' => $request->batchno,
            'business_id' => Auth::user()->business_id,
          ]);
          return redirect('/purchasecart');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchasecart  $purchasecart
     * @return \Illuminate\Http\Response
     */
    public function show(Purchasecart $purchasecart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchasecart  $purchasecart
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchasecart $purchasecart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchasecart  $purchasecart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchasecart $purchasecart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchasecart  $purchasecart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchasecart $purchasecart)
    {
        //
    }
}
