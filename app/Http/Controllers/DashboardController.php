<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Task;
use App\Models\Message;
use App\Models\Business;
use App\Models\Productcategory;
use App\Models\User;
use App\Models\Saledetail;
use App\Models\Sales;
use App\Models\Barcode;
use App\Models\Unit;
use App\Models\Expense;
use App\Models\Audit;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuppliersExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function dashboard(Request $request)
    {
        $currentDate = date('Y-m-d');
        if(Auth::user()->role_id == 0){
            $business = Business::count();
           // return Auth::user();
           $businesslist = Business::with('businessrole')->get();
           return view('admin',['business'=>$business,'businesslist'=>$businesslist]);
         } elseif($currentDate>=Auth::user()->business->business_enddate ){
            $name = Business::find(Auth::user()->business_id);
           // return 'expired';
           return view('expired.index',['name'=>$name]);
            // return Auth::user();
         }
         else{



//return Auth::user();


             //For All
             if($request->period == 0){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();
                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = 'All';

                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->sum('product_total');

             }
             //For Today
             elseif($request->period == 1){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', date('Y-m-d'))->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', date('Y-m-d'))->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', date('Y-m-d'))->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = 'Today';
                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', date('Y-m-d'))->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', date('Y-m-d'))->sum('product_total');

                }
             //For Yesterday
             elseif($request->period == 2){
                // return $request->period;

                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::yesterday())->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::yesterday())->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::yesterday())->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = 'Yesterday';
                 $image = Business::find(Auth::user()->business_id);
                 $name = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::yesterday())->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::yesterday())->sum('product_total');

                }
             //Last 7 days
             elseif($request->period == 7){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today ()->subDays (7))->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today ()->subDays (7))->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today ()->subDays (7))->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today ()->subDays (7))->sum('qty');
                 $heading = 'Last 7 days';
                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today ()->subDays (7))->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::today ()->subDays (7))->sum('product_total');

                }
             //Last 14 days
             elseif($request->period == 14){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today()->subDays(13))->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today()->subDays(13))->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today()->subDays(13))->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = 'Last 14 days';
                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::today()->subDays(13))->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::today()->subDays(13))->sum('product_total');

                }
             //Last 28 days
             elseif($request->period == 28){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->subDays(28))->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->subDays(28))->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at', '>=', Carbon::now()->subDays(28))->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = '28 days';
                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->subDays(28))->sum('product_total');
                //  $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at', Carbon::now()->subDays(28))->sum('product_total');

                }
             //This month
             elseif($request->period == 3){
                $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
                $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
                $license = Business::where('id', Auth::user()->business_id)->first();

                 $expense = Expense::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->month)->sum('expense_amount');
                 $unit = Unit::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->month)->count();
                 $product = Product::where("status",1)->where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->month)->count();
                 $savings = Saledetail::where('business_id', Auth::user()->business_id)->sum('qty');
                 $heading = 'Month';
                 $name = Business::find(Auth::user()->business_id);
                 $image = Business::find(Auth::user()->business_id);
                 $pdt_total = Sales::where('business_id', Auth::user()->business_id)->whereDate('created_at','>=', Carbon::now()->month)->sum('product_total');
                }

                // Get the current year
                $year = Carbon::now()->year;

                // Create an array to hold the monthly sales data
                $monthlySales = [];
                // Loop through each month from January to December
                for ($month = 1; $month <= 12; $month++) {
                    // Get the sales data for the current month and year
                    $sales = Sales::selectRaw('SUM(product_total) as total_sales')
                        ->whereMonth('date', $month)
                        ->where('business_id', Auth::user()->business_id)
                        ->whereYear('date', $year)
                        ->groupBy('date')
                        ->first();

                    // Get $monthlySales if their is no data put 0 else put $sales
                    $monthlySales[$month] = $sales ? $sales->total_sales : 0;
                }

             return view('dashboard',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'expense'=>$expense,'product'=>$product,'unit'=>$unit,'sales'=>$monthlySales,'heading'=>$heading,'image'=>$image,'name'=>$name,'pdt_total',$pdt_total]);
    }

    }





    public function myprofile()
    {
         return view('profile');
    }

    public function con()
    {
         return view('connect.index');
    }


    public function fetchaudits()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $audits = Audit::with('user')->where('business_id', Auth::user()->business_id)->get();
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
        return view('audits.index',['message'=>$message,'license'=>$license,'notifications'=>$notifications,'audits'=>$audits,'image'=>$image,'name'=>$name]);

    }

    public function createuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|confirmed|min:3',
        ]);

        $user = User::where('business_id', Auth::user()->business_id)->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        return redirect('/')->with('message', "User saved");

    }

    public function search(Request $request){
        $audits = Audit::whereBetween('created_at', [$request->fromDate,$request->toDate])->where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
        return view('audits.index',['audits'=>$audits,'image'=>$image]);
       }
}
