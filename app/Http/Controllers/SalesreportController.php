<?php

namespace App\Http\Controllers;

use App\Models\Salesreport;
use App\Models\Saledetail;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesreportExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class SalesreportController extends Controller
{
    public function export()
    {
        return Excel::download(new SalesreportExport, 'salesreport.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_salesreport ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

            $salesreporting = Saledetail::with('productsale')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
              $image = Business::find(Auth::user()->business_id);
              $name = Business::find(Auth::user()->business_id);
             return view('salesreport.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'salesreporting'=>$salesreporting,'image'=>$image,'name'=>$name]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salesreport  $salesreport
     * @return \Illuminate\Http\Response
     */
    public function show(Salesreport $salesreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salesreport  $salesreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Salesreport $salesreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salesreport  $salesreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salesreport $salesreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salesreport  $salesreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salesreport $salesreport)
    {
        //
    }

    public function search(Request $request){
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $salesreporting = Saledetail::with('productsale')->where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
        return view('salesreport.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'salesreporting'=>$salesreporting,'image'=>$image,'name'=>$name]);
       }

}
