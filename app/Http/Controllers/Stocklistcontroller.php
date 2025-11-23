<?php

namespace App\Http\Controllers;

use App\Models\Stocklist;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class StocklistController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->view_stocklist ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();

            $stocklist = Stock::with('stocklistpdt')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            return view('stocklists.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stocklist'=>$stocklist,'image'=>$image,'name'=>$name]);
        }else{
            return redirect('/');
        }

    }


    public function show($id)
    {

        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $stocklist = Stock::with('stocklistpdt')->find($id);
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
          return view('stocklists.stocklist',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stocklist'=>$stocklist,'image'=>$image,'name'=>$name]);
    }

    public function search(Request $request){

        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $stocklist = Stock::whereBetween('created_at', [$request->fromDate,$request->toDate])->where('business_id', Auth::user()->business_id)->get();
             $image = Business::find(Auth::user()->business_id);
             $name = Business::find(Auth::user()->business_id);
        return view('stocklists.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'stocklist'=>$stocklist,'image'=>$image,'name'=>$name]);
       }
}
