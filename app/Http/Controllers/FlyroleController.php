<?php

namespace App\Http\Controllers;

use App\Models\Flyrole;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use App\Models\Userpermission;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
class FlyroleController extends Controller
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
        $flyrole = Userpermission::orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
    return view('flyroles.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'flyrole'=>$flyrole,'name'=>$name]);
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
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    public function search(Request $request){
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $flyrole = Userpermission::whereBetween('created_at', [$request->fromDate,$request->toDate])->where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('flyroles.index',['notifications'=>$notifications,'flyrole'=>$flyrole,'image'=>$image,'name'=>$name]);
       }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userpermit=Userpermission::find($id);
        $userpermit->update([
          'status'=>0,
        ]);


      return redirect()->back();
    }
}
