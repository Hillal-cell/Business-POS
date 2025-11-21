<?php

namespace App\Http\Controllers;

use App\Models\Leavesummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use App\Exports\LeavesExport;
use App\Models\Staff;
use App\Models\Leave;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;


class LeavesummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membersavings = [];
        $members = Staff::all();

        $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        // $members = Familymembers::where('status',1)->get();
foreach ($members as $member) {
    $savings = Leave::where(['staffuser_id'=>$member->id, 'status'=>1])->sum('leave_days');
    array_push($membersavings,['id'=>$member->id,'staffuser_id'=>$member->staff_name,'leave_days'=>$savings]);
}

return view('leavesummaries.index',['message'=>$message,'notifications'=>$notifications,'license'=>$license,'savingsummary'=>$membersavings,'image'=>$image,'name'=>$name]);

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
     * @param  \App\Models\Leavesummary  $leavesummary
     * @return \Illuminate\Http\Response
     */
    public function show(Leavesummary $leavesummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leavesummary  $leavesummary
     * @return \Illuminate\Http\Response
     */
    public function edit(Leavesummary $leavesummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leavesummary  $leavesummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leavesummary $leavesummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leavesummary  $leavesummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leavesummary $leavesummary)
    {
        //
    }
}
