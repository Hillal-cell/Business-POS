<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffsExport;
use App\Models\Business;
use App\Models\Flyrole;
use App\Models\Userpermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Task;

class StaffController extends Controller
{

    public function export()
    {
        return Excel::download(new StaffsExport, 'staff.xlsx');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_staff ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();

            $staff = Staff::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('staff.index',['message'=>$message,'license'=>$license,'notifications'=>$notifications,'staff'=>$staff,'image'=>$image,'name'=>$name]);
        }else{
            return redirect('/');
        }

    }

    public function users()
    {
        $staff = User::all();
        return view('staff.index')->with('staff',$staff);
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

        $post = Staff::create([
            'staff_name' => $request->staff_name,
            'staff_contact' => $request->staff_contact,
            'staff_email' => $request->staff_email,
            'staff_dob' => $request->staff_dob,
            'gender' => $request->gender,
            'leave_days' => $request->leave_days,
            'staff_address' => $request->staff_address,
            'business_id' => Auth::user()->business_id,
          ]);

          return redirect('/staff')->with('messages', "Staff recorded successfully");;
    }


    public function enroll(Request $request, $id)
    {

       $staff = Staff::where('business_id', Auth::user()->business_id)->find($id);
       $user = User::create([
        'name' => $staff->staff_name,
        'email' => $staff->staff_email,
        // 'staff_contact' => $staff->staff_contact,
        'role_id' => $request->rolename,
        // 'staff_id' => $staff->id,
        'password' => bcrypt($request->password),
        'business_id' => Auth::user()->business_id,

    ]);

    $staff->enroll=1;
    $staff->save();
    // return redirect('/staff',[]);

          return redirect('/staff')->with('messages', "Staff $user->name enrolled successfully");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();


            $license = Business::where('id', Auth::user()->business_id)->first();

        $flyrole = Userpermission::orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
        //  $roles = Userpermission::where('business_id', Auth::user()->business_id)->get();
        $staff = Staff::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('staff.staff')->with(['message'=>$message,'license'=>$license,'notifications'=>$notifications,'staffs'=>$staff,'image'=>$image,'flyrole'=>$flyrole,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }


    public function validatestaff(Request $request){
        $Location = Staff::where('staff_name','=',$request->name)->where('status',1)->where('business_id', Auth::user()->business_id)->first();
     if($Location){
       return 'exists';
        }else{
         return 'doesnot';
        }
         }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $staff=Staff::find($id);
        $staff->update([
          'status'=>0,
        ]);
        return redirect('/staff')->with('messages', "User removed successfully");
    }
}
