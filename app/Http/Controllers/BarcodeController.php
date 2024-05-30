<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Task;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role->view_barcode ){
            $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
            $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();
            $license = Business::where('id', Auth::user()->business_id)->first();

            $barcode = Product::select('barcode','product_code',"product_name")->where('business_id', Auth::user()->business_id)->orderBy('id','desc')->get();
            $name = Business::find(Auth::user()->business_id);
            $image = Business::find(Auth::user()->business_id);
            return view('barcodes.index',['message'=>$message,'license'=>$license,'notifications'=>$notifications,'barcode'=>$barcode,'name'=>$name,'image'=>$image]);
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

        $post_service = Barcode::where('business_id', Auth::user()->business_id)->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'bar_code' => $request->bar_code,
          ]);
          return redirect('/barcode')->with('messages', "Product saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function edit(Barcode $barcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Barcode::where('id',$id)->first();
        if ($check) {
            $service = Barcode::where('id',$id)->update([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'bar_code' => $request->bar_code,
            ]);
            }
        return redirect('/barcode')->with('messages', "Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $barcode=Barcode::find($id);
        $barcode->update([
          'status'=>0,
        ]);
      return redirect()->back();
    }
}
