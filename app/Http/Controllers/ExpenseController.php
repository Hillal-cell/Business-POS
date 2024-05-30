<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Expensecategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Business;
use App\Exports\ExpensesExport;
use App\Models\Audit;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{

    public function export()
    {
        return Excel::download(new ExpensesExport, 'expense.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_expense ){
            $expense = Expense::with('expensecategory')->where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $cat = Expensecategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
            $license = Business::where('id', Auth::user()->business_id)->first();
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        return view('expenses.index',['message'=>$message,'notifications'=>$notifications,'license'=>$license,'expense'=>$expense,'image'=>$image,'cat'=>$cat,'name'=>$name]);

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
        $post_service = Expense::where('business_id', Auth::user()->business_id)->create([
            'expense_name' => $request->expense_name,
            'expense_amount' => $request->expense_amount,
            'expense_date' => $request->expense_date,
            'expense_description' => $request->expense_description,
            'expensecategory_id' => $request->expensecategory_id,
            'business_id' => Auth::user()->business_id,
          ]);

          $action = 'Expense added successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 1,
            'business_id' => Auth::user()->business_id,
          ]);

          return redirect('/expense')->with('messages', "Expense saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $expense = Expense::where('business_id', Auth::user()->business_id)->find($id);
         $image = Business::find(Auth::user()->business_id);
         $name = Business::find(Auth::user()->business_id);
        return view('expenses.expense',['message'=>$message,'license'=>$license,'notifications'=>$notifications,'expense'=>$expense,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Expense::where('id',$id)->first();
        if ($check) {
            $service = Expense::where('id',$id)->where('business_id', Auth::user()->business_id)->update([
                'expense_name' => $request->expense_name,
                'expense_amount' => $request->expense_amount,
                'expense_date' => $request->expense_date,
                'expense_description' => $request->expense_description,
                'expensecategory_id' => $request->expensecategory_id,
            'business_id' => Auth::user()->business_id,
            ]);

            $action = 'Expense updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 1,
            'business_id' => Auth::user()->business_id,
            ]);

            }
        return redirect('/expense')->with('messages', "Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense=Expense::find($id);
        $expense->update([
          'status'=>0,
        ]);

        $action = 'Expense deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 1,
            'business_id' => Auth::user()->business_id,
        ]);

      return redirect()->back();
    }




    public function search(Request $request){
        $expense = Expense::where('status',1)->where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
        $cat = Expensecategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('expenses.index',['expense'=>$expense,'license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'cat'=>$cat,'name'=>$name]);
       }

    //    public function searches(Request $request)
    //    {
    //        $selectedValue = $request->select;
    //        $image = Business::find(Auth::user()->business_id);
    //     //    $stocklist = Stock::where('business_id', Auth::user()->business_id)->get();
    //        $expense = Expense::where('business_id', Auth::user()->business_id)->where('expensecategory_id', $selectedValue)->get();
    //     //    $cat = Expensecategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
    //        $expensecategory = Productcategory::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();

    //     //    $records = Sales::where('business_id', Auth::user()->business_id)->where('total', $selectedValue)->get();
    //        return view('expenses.index',['expense'=>$expense,'image'=>$image,'expensecategory'=>$expensecategory]);

    //     //    return view('your_view', compact('records'));
    //    }


    public function searches(Request $request)
    {

        $selectedValue = $request->select;
      
        $expense = Expense::with('expensecategory')->where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->where('expensecategory_id', $selectedValue)->get();
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $cat = Expensecategory::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('expenses.index',['expense'=>$expense,'license'=>$license,'message'=>$message,'notifications'=>$notifications,'image'=>$image,'cat'=>$cat,'name'=>$name]);

    }

}
