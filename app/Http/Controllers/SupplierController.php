<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuppliersExport;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Audit;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;
use App\Imports\Importsupplier;

class SupplierController extends Controller
{

    public function importView(Request $request){
        return view('suppliers.index');
    }

    public function import(Request $request){

        try {
            //code...
            Excel::import(new Importsupplier,
            $request->file('file')->store('files'));
         return redirect()->back();
        } catch (\Exception $e) {
            return redirect('/supplier')->with('error', "Please Import correct excel");
        }


    }

    public function export()
    {
        return Excel::download(new SuppliersExport, 'supplier.xlsx');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_supplier ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $license = Business::where('id', Auth::user()->business_id)->first();

            $supplier = Supplier::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
             return view('suppliers.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'supplier'=>$supplier,'image'=>$image,'name'=>$name]);
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
        $post_service = Supplier::where('business_id', Auth::user()->business_id)->create([
            'supplier_name' => ucfirst(strtolower($request->supplier_name)),
            'address' => ucfirst(strtolower($request->address)),
            'phone' => $request->phone,
            'email' => $request->email,
            'supplier_date' => $request->supplier_date,
            'business_id' => Auth::user()->business_id,
          ]);

          $action = 'Supplier saved successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 5,
            'business_id' => Auth::user()->business_id,
          ]);

          return redirect('/supplier')->with('messages', "Supplier saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $supplier = Supplier::where('business_id', Auth::user()->business_id)->find($id);
        $image = Business::find(Auth::user()->business_id);
        $name = Business::find(Auth::user()->business_id);
        return view('suppliers.supplier',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'supplier'=>$supplier,'image'=>$image,'name'=>$name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Supplier::where('id',$id)->first();
        if ($check) {
            $service = Supplier::where('id',$id)->where('business_id', Auth::user()->business_id)->update([
                'supplier_name' => $request->supplier_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'supplier_date' => $request->supplier_date,
            'business_id' => Auth::user()->business_id,
            ]);

            $action = 'Supplier updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 5,
            'business_id' => Auth::user()->business_id,
            ]);

        return redirect('/supplier')->with('messages', "Supplier updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $supplier=Supplier::find($id);
        $supplier->update([
          'status'=>0,
        ]);

        $action = 'Supplier deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 5,
            'business_id' => Auth::user()->business_id,
        ]);

      return redirect()->back();
    }

    public function search(Request $request){
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

        $license = Business::where('id', Auth::user()->business_id)->first();

        $supplier = Supplier::where('business_id', Auth::user()->business_id)->where('status',1)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
        $name = Business::find(Auth::user()->business_id);
        $image = Business::find(Auth::user()->business_id);
        return view('suppliers.index',['license'=>$license,'message'=>$message,'notifications'=>$notifications,'supplier'=>$supplier,'name'=>$name,'image'=>$image]);
       }
}
