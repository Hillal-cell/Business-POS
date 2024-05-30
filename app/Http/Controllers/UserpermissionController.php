<?php

namespace App\Http\Controllers;

use App\Models\Userpermission;
use App\Models\Business;
use App\Models\Flyrole;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class UserpermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        //Min('id') is the first added role while creating a business
      $admin = Userpermission::where('business_id', Auth::user()->business_id)->min('id');
      $userpermissions = Userpermission::where('id','!=',Auth::user()->role_id)->where('id','!=',$admin)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
      $license = Business::where('id', Auth::user()->business_id)->first();
      $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            // $userpermissions = Userpermission::where('id','!=',Auth::user()->role_id)->where('id','!=',1)->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
             return view('userpermissions.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'userpermissions'=>$userpermissions,'image'=>$image,'name'=>$name]);
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
        $post_role = Userpermission::where('business_id', Auth::user()->business_id)->create([
            'rolename' => ucfirst(strtolower($request->rolename)),
            'business_id' => Auth::user()->business_id,
          ]);

        //   $action = 'Expense added successfully';
        //   $audit = Audit::create([
        //       'action' => $action,
        //       'user_id' => Auth::user()->id,
        //       'category' => 1,
        //     'business_id' => Auth::user()->business_id,
        //   ]);

          return redirect('/role')->with('messages', "Role saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $userpermission = Userpermission::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('userpermissions.userpermission')->with(['license'=>$license,'message'=>$message,'notifications'=>$notifications,'userpermission'=>$userpermission,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function edit(Userpermission $userpermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perm = Userpermission::where('id',$id)->update([
            $request->column => $request->status,
        ]);
        if($perm){
            return "updated";
        }else{
            return "Failed";
        }

    }

    public function validaterole(Request $request){
        $role = Userpermission::where('rolename','=',$request->name)->where('business_id', Auth::user()->business_id)->first();
     if($role){
       return 'exists';
        }else{
         return 'doesnot';
        }
         }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userpermission=Userpermission::find($id);
        $userpermission->update([
          'status'=>0,
        ]);
      return redirect()->back();
    }
}
