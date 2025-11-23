<?php

namespace App\Http\Controllers;

use App\Models\Expensecategory;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class ExpensecategoryController extends Controller
{
    public function export()
    {
        return Excel::download(new CategoryExport, 'productcategory.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $license = Business::where('id', Auth::user()->business_id)->first();
        $message = Task::where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $expensecategory = Expensecategory::where('status',1)->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
             return view('expensecategories.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'expensecategory'=>$expensecategory,'image'=>$image,'name'=>$name]);

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
        $post = Expensecategory::create([
            'expense_category' => ucfirst(strtolower($request->expense_category)),
            'business_id' => Auth::user()->business_id,
          ]);

          $action = 'Expense Category registered successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 7,
            'business_id' => Auth::user()->business_id,

          ]);

      return redirect('/expensecategory')->with('messages', 'Expense Category Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expensecategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
        $license = Business::where('id', Auth::user()->business_id)->first();

        $member = Expensecategory::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
         return view('expensecategories.expensecategory',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'member'=>$member,'image'=>$image,'name'=>$name]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expensecategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Expensecategory $productcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Expensecategory::where('id',$id)->first();
        if ($check) {
            $service = Expensecategory::where('id',$id)->where('business_id', Auth::user()->business_id)->update([
                'expense_category' => $request->expense_category,
            ]);

            $action = 'Expense Category Updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 7,
            'business_id' => Auth::user()->business_id,
            ]);

        return redirect('/expensecategory')->with('messages', "Expense Category updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expensecategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category=Expensecategory::find($id);
        $category->update([
          'status'=>0,
        ]);

        $action = 'Expense Category deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 7,
            'business_id' => Auth::user()->business_id,
        ]);
      return redirect()->back();
    }

    public function validateexpensecategory(Request $request){
        $Location = Expensecategory::where('expense_category','=',$request->name)->where('status',1)->where('business_id', Auth::user()->business_id)->first();
     if($Location){
       return 'exists';
        }else{
         return 'doesnot';
        }
         }

         public function search(Request $request){
            $expensecategory = Expensecategory::where('status',1)->where('business_id', Auth::user()->business_id)->whereBetween('created_at', [$request->fromDate,$request->toDate])->orderBy('id','desc')->get();
             $image = Business::find(Auth::user()->business_id);
             $name = Business::find(Auth::user()->business_id);
            return view('expensecategories.index',['expensecategory'=>$expensecategory,'image'=>$image,'name'=>$name]);
           }
}
