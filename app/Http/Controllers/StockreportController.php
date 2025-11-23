<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StocksreportExport;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class StockreportController extends Controller
{

    public function export()
    {
        return Excel::download(new StocksreportExport, 'stockreport.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_stockreport ){

            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();
           
            $stockreporting = Stock::with('stocklistpdt')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('stockreport.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stockreporting'=>$stockreporting,'image'=>$image,'name'=>$name]);
        }else{
            redirect('/');
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
     * @param  \App\Models\Stockreport  $stockreport
     * @return \Illuminate\Http\Response
     */
    public function show(Stockreport $stockreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockreport  $stockreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockreport $stockreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockreport  $stockreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockreport $stockreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockreport  $stockreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockreport $stockreport)
    {
        //
    }

    public function search(Request $request){
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $stockreporting = Stock::with('stocklistpdt')->where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
        return view('stockreport.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stockreporting'=>$stockreporting,'image'=>$image,'name'=>$name]);
      }
}
