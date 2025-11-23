<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Business;
use App\Models\Audit;
use App\Models\Task;
use App\Models\Stockcart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class StockController extends Controller
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

        $license = Business::where('id', Auth::user()->business_id)->first();

        $product = Product::with('member','unit')->where('business_id', Auth::user()->business_id)->get();
        $stock = Stockcart::with('stockproduct')->where('business_id', Auth::user()->business_id)->get();

        foreach($stock as $stocks){
            $stk = Stock::where('product_id', $stocks->product_id)->first();
            $pdt = Product::where('id', $stocks->product_id)->first();

            $stk->qty = $stk->qty+$stocks->qty;
            $stk->buying_price = $stocks->buying_price;
            $stk->date = $request->date;
            $pdt->quantity = $pdt->quantity+$stocks->qty;
            $stk->save();
            $pdt->save();
            $stocks->delete();

        }
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $newstock = Stockcart::with('stockproduct')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);

            //return $message;

        $action = 'Stock registered successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 6,
            'business_id' => Auth::user()->business_id,
        ]);
        return view('stocks.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'product'=>$product,'stock'=>$newstock,'image'=>$image,'name'=>$name])->with('messages', "Stock saved successfully");;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
