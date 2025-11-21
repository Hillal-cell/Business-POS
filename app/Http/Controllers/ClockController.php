<?php

namespace App\Http\Controllers;

use App\Models\Clock;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Task;

class ClockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentTime = Carbon::now()->format('H:i');
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
      

    return view('clocks.index', ['license'=>$license,'message'=>$message,'notifications'=>$notifications,'currentTime' => $currentTime]);
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
     * @param  \App\Models\Clock  $clock
     * @return \Illuminate\Http\Response
     */
    public function show(Clock $clock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clock  $clock
     * @return \Illuminate\Http\Response
     */
    public function edit(Clock $clock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clock  $clock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clock $clock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clock  $clock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clock $clock)
    {
        //
    }
}
