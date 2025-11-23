<?php

namespace App\Http\Controllers;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchasereport;
use App\Models\Purchasedetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;


class PurchasereportController extends Controller
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
       
        $purchasereporting = Purchasedetail::with('coreproductsale')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
       return view('purchasereports.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'purchasereporting'=>$purchasereporting,'image'=>$image,'name'=>$name]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchasereport  $purchasereport
     * @return \Illuminate\Http\Response
     */
    public function show(Purchasereport $purchasereport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchasereport  $purchasereport
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchasereport $purchasereport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchasereport  $purchasereport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchasereport $purchasereport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchasereport  $purchasereport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchasereport $purchasereport)
    {
        //
    }
}
