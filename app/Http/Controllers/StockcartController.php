<?php

namespace App\Http\Controllers;

use App\Models\Stockcart;
use App\Models\Product;
use App\Models\Business;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
class StockcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->role->view_stockcart ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

            $stock = Stockcart::with('stockproduct')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $image = Business::find(Auth::user()->business_id);
                        $product = Product::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $name = Business::find(Auth::user()->business_id);
            return view('stocks.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stock'=>$stock,'product'=>$product,'image'=>$image,'name'=>$name]);
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
        $price = Product::where('id',$request->product_id)->first()->buying_price;
        $post_stock = Stockcart::create([
            'product_id' => $request->product_id,
            'qty' => $request->qty_id,
            'buying_price' => $price,
            'date' => $request->date,
            'business_id' => Auth::user()->business_id,
          ]);
          return redirect('/stockcart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stockcart  $stockcart
     * @return \Illuminate\Http\Response
     */
    public function show(Stockcart $stockcart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockcart  $stockcart
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockcart $stockcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockcart  $stockcart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockcart  $stockcart
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $memberstock=Stockcart::find($id);
        $memberstock->delete();
        return redirect('/stockcart')->with('messages', "Record removed successfully");
    }

    public function getSubCatAgainstMainCatEdit($id){
    $data =  DB::table('products')->where('id', $id)->where('business_id', Auth::user()->business_id)->first()->buying_price;
    return response()->json($data);
    }

    public function quantity($id){
        $datas =  DB::table('products')->where('id', $id)->where('business_id', Auth::user()->business_id)->first()->quantity;
        return response()->json($datas);
        }
}
