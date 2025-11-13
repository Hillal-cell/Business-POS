<?php

namespace App\Http\Controllers;

use App\Models\Toasty;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class ToastyController extends Controller
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

        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('toasty.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'name'=>$name]);


    }

    // public function check()
    // {
    //     $connected = @fsockopen('www.google.com', 80);
    //     if ($connected){
    //         fclose($connected);
    //         return view('toasty.check');
    //     } else {
    //         return view('toasty.check');
    //     }
    // }
    public function check()
    {
        return view('toasty.check');
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
        $post = Toasty::create([
            'name' => ucfirst(strtolower($request->name)),
          ]);


      return redirect('/toasty')->with('messages', "Name saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toasty  $toasty
     * @return \Illuminate\Http\Response
     */
    public function show(Toasty $toasty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toasty  $toasty
     * @return \Illuminate\Http\Response
     */
    public function edit(Toasty $toasty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toasty  $toasty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toasty $toasty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toasty  $toasty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toasty $toasty)
    {
        //
    }
}
