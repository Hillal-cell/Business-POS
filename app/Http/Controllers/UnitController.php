<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UnitsExport;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Carbon;

class UnitController extends Controller
{

    public function export()
    {
        return Excel::download(new UnitsExport, 'unit.xlsx');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_unit ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();

            $units = Unit::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('units.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'units'=>$units,'image'=>$image,'name'=>$name]);
        }else{
            return redirect('/');
        }

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
        $post = Unit::where('business_id', Auth::user()->business_id)->create([
            'unit_name' => ucfirst(strtolower($request->unit_name)),
            'symbol' => $request->symbol,
            'business_id' => Auth::user()->business_id,
          ]);

          $action = 'Unit registered successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
            'business_id' => Auth::user()->business_id,
              'category' => 4
          ]);

      return redirect('/unit')->with('messages', 'Unit Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

       $unit = Unit::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('units.unit',with(['license'=>$license,'message'=>$message,'notifications'=>$notifications,'unit'=>$unit,'image'=>$image,'name'=>$name]));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Unit::where('id',$id)->first();
        if ($check) {
            $service = Unit::where('id',$id)->update([
                'unit_name' => $request->unit_name,
                'symbol' => $request->symbol,
            ]);

            $action = 'Unit Updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 4,
            'business_id' => Auth::user()->business_id,
            ]);

        return redirect('/unit')->with('messages', "Unit updated successfully");
    }
    }

    public function validateunit(Request $request){
        $Location = Unit::where('unit_name','=',$request->name)->where('status',1)->where('business_id', Auth::user()->business_id)->first();
     if($Location){
       return 'exists';
        }else{
         return 'doesnot';
        }
         }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit=Unit::find($id);
        $unit->update([
          'status'=>0,
        ]);

        $action = 'Unit deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 4,
            'business_id' => Auth::user()->business_id,
        ]);


      return redirect()->back();
    }

    public function search(Request $request){
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $unit = Unit::where('status',1)->whereBetween('created_at', [$request->fromDate,$request->toDate])->where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('units.index',['license'=>$license,'notifications'=>$notifications,'unit'=>$unit,'image'=>$image,'name'=>$name]);
       }
}
