<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\Userpermission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::with('businessrole')->where('status',1)->get();
        return view("businesses.index")->with('business', $business);
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

        if($request->hasfile('business_logo')){
            $file = $request->file('business_logo');
            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
        }


        $business = Business::create([
            'business_name' => ucfirst(strtolower($request->business_name)),
            'business_email' => $request->business_email,
            'business_address' => $request->business_address,
            'business_contact' => $request->business_contact,
            'business_enddate' => $request->business_enddate,
            'business_logo'=>$filename,
          ]);

          $Userpermission = Userpermission::create([
            'rolename'=>'Admin',
            'view_productcategory'=>1,
            'add_productcategory'=>1,
            'update_productcategory'=>1,
            'delete_productcategory'=>1,
            'view_product'=>1,
            'add_product'=>1,
            'update_product'=>1,
            'delete_product'=>1,
            'view_unit'=>1,
            'add_unit'=>1,
            'update_unit'=>1,
            'delete_unit'=>1,
            'view_supplier'=>1,
            'add_supplier'=>1,
            'update_supplier'=>1,
            'delete_supplier'=>1,
            'add_staff'=>1,
            'view_staff'=>1,
            'delete_staff'=>1,
            'add_expense'=>1,
            'view_expense'=>1,
            'update_expense'=>1,
            'delete_expense'=>1,
            'view_stockcart'=>1,
            'view_audits'=>1,
            'view_stocklist'=>1,
            'view_cart'=>1,
            'view_barcode'=>1,
            'view_salesreport'=>1,
            'view_stockreport'=>1,
            'view_saleslist'=>1,
            'view_permissions'=>1,
            'business_id'=>$business->id,

          ]);

          $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'business_id' => $business->id,
            'role_id'=>$Userpermission->id,
          ]);


      return redirect('/business')->with('messages', 'Business Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = Business::with('businessrole')->find($id);

        return view('businesses.business')->with('business', $business);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = Business::where('id',$id)->update([
            'business_name' => ucfirst(strtolower($request->business_name)),
            'business_email' => $request->business_email,
            'business_address' => $request->business_address,
            'business_contact' => $request->business_contact,
            'business_enddate' => $request->business_enddate,
          ]);
        return redirect('/business')->with('messages', "Business updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $unit=Business::find($id);
        $unit->update([
          'status'=>0,
        ]);

        $action = 'Business deleted successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 4
        ]);
      return redirect()->back();
    }
}
