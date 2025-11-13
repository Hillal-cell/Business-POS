<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use App\Exports\LeavesExport;
use App\Models\Staff;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;


class LeaveController extends Controller
{

    public function export()
    {
        return Excel::download(new LeavesExport, 'leave.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $leave = Leave::with('leavetype')->where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $userstaff = Staff::orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        return view('leaves.index',['message'=>$message,'notifications'=>$notifications,'license'=>$license,'leave'=>$leave,'image'=>$image,'userstaff'=>$userstaff,'name'=>$name]);


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
        $staff = Staff::find($request->staffuser_id);
        $bal = (int)$staff->leave_days;
        if ($request->leave_days>$bal) {
            return redirect('/leave')->with('error', "Leave Days exceeded");
        }
        $post_service = Leave::where('business_id', Auth::user()->business_id)->create([
            'staffuser_id' => $request->staffuser_id,
            'leave_name' => $request->leave_name,
            'leave_days' => $request->leave_days,
            'business_id' => Auth::user()->business_id,
          ]);

        $staff->leave_days = $bal-$request->leave_days;
        $staff->save();

        return redirect('/leave')->with('messages', "Leave saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $leave = Leave::with('leavetype')->where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('leaves.leave')->with(['message'=>$message,'license'=>$license,'notifications'=>$notifications,'leave'=>$leave,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    public function getLeave($id){
        $data =  Staff::where('id', $id)->where('business_id', Auth::user()->business_id)->first()->leave_days;
        return response()->json($data);
        }


}
