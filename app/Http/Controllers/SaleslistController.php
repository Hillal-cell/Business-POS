<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use App\Models\Saledetail;
use App\Models\Stock;
use App\Models\Business;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;


class SaleslistController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->view_saleslist ){
            $notifications = User::select('users.id', 'users.name', 'users.email')
            ->selectRaw('COUNT(messages.is_read) AS unread')
            ->leftJoin('messages', function ($join) {
                $join->on('users.business_id', '=', 'messages.business_id')
                     ->where('messages.is_read', '=', 0);
            })
            ->where('users.business_id', Auth::user()->business_id)
            ->groupBy('users.id', 'users.name', 'users.email')
            ->first();
            $license = Business::where('id', Auth::user()->business_id)->first();
            $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $saleslist = Sales::with('salelistpdt')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $cat = Product::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
           $name = Business::find(Auth::user()->business_id);
            return view('saleslists.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'saleslist'=>$saleslist,'image'=>$image,'name'=>$name,'cat'=>$cat]);
        }else{
        return redirect('/');
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        }



    public function show($id)
    {
    //   return  $stocklist = Sales::all();
    //     // $stocklist = Stock::with('stocklistpdt')->find($id);
    //     return view('salelists.salelist')->with('stocklist', $stocklist);
    }

    public function search(Request $request){
        $notifications = User::select('users.id', 'users.name', 'users.email')
        ->selectRaw('COUNT(messages.is_read) AS unread')
        ->leftJoin('messages', function ($join) {
            $join->on('users.business_id', '=', 'messages.business_id')
                 ->where('messages.is_read', '=', 0);
        })
        ->where('users.business_id', Auth::user()->business_id)
        ->groupBy('users.id', 'users.name', 'users.email')
        ->first();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
        $saleslist = Sales::where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
        $name = Business::find(Auth::user()->business_id);
        $stocklist = Stock::where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
        $image = Business::find(Auth::user()->business_id);
        return view('saleslists.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'saleslist'=>$saleslist,'stocklist'=>$stocklist,'image'=>$image,'name'=>$name]);
       }



       public function searches(Request $request)
       {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();
      
           $selectedValue = $request->select;
           $cat = Product::orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
           $image = Business::find(Auth::user()->business_id);
           $stocklist = Stock::where('business_id', Auth::user()->business_id)->get();
           $saleslist = Saledetail::where('business_id', Auth::user()->business_id)->where('product_id', $selectedValue)->get();
           $saleslist = Sales::with('salelistpdt')->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();

           $name = Business::find(Auth::user()->business_id);
        //    $records = Sales::where('business_id', Auth::user()->business_id)->where('total', $selectedValue)->get();
           return view('saleslists.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'saleslist'=>$saleslist,'stocklist'=>$stocklist,'cat'=>$cat,'image'=>$image,'name'=>$name]);

        //    return view('your_view', compact('records'));
       }


}
