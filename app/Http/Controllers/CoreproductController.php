<?php

namespace App\Http\Controllers;

use App\Models\Coreproduct;
use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;


class CoreproductController extends Controller
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
        $coreproduct = Coreproduct::where('business_id', Auth::user()->business_id)->where('status',1)->orderBy('id','desc')->get();
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
     return view('coreproducts.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'coreproduct'=>$coreproduct,'image'=>$image,'name'=>$name]);
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
        $post_service = Coreproduct::where('business_id', Auth::user()->business_id)->create([
            'core_product' => $request->core_product,
            'business_id' => Auth::user()->business_id,
          ]);
          return redirect('/coreproduct')->with('messages', "Core Product saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coreproduct  $coreproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Coreproduct $coreproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coreproduct  $coreproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Coreproduct $coreproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coreproduct  $coreproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coreproduct $coreproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coreproduct  $coreproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coreproduct $coreproduct)
    {
        //
    }
}
