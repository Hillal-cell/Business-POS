<?php

namespace App\Http\Controllers;
use App\Models\Purchasecart;
use App\Models\Purchase;
use App\Models\Coreproduct;
use App\Models\Audit;
use App\Models\Task;
use App\Models\Stock;
use App\Models\Batch;
use App\Models\Purchasedetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Message;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Task::where('business_id', Auth::user()->business_id)->where('status',1)->count();
        $message = Task::where('business_id', Auth::user()->business_id)->where('status', 1)->orderBy('id','desc')->get();

            $purchase = Purchase::all();
            $cat = Coreproduct::where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
            $image = Business::find(Auth::user()->business_id);
            $name = Business::find(Auth::user()->business_id);
             return view('purchases.index',['message'=>$message,'notifications'=>$notifications,'purchase'=>$purchase,'cat'=>$cat,'image'=>$image,'name'=>$name]);

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
// return $request;
        $newcart= [];
        $post_service = Purchase::create([
        // 'date' => $request->date,
        'total' => $request->total,
        'discount' => $request->discount,
        'supplier_name' => $request->supplier_name,
        'supplier_contact' => $request->supplier_contact,
        'business_id' => Auth::user()->business_id,
        ]);


        $product = Coreproduct::where('status',1)->get();
        $cart = Purchasecart::with('purchasecart')->get();
        $total = 0;
        foreach($cart as $carts){
            $post_sale = Purchasedetail::create([
                'purchase_id' => $post_service->id,
                'coreproduct_id' => $carts->coreproduct_id,
                'qty' => $carts->qty,
                'buyingunit' => $carts->buyingunit,
                'batchno' => $carts->batchno,
                'expirydate' => $carts->expirydate,
                'business_id' => Auth::user()->business_id,
            ]);

            $batch_sale = Batch::create([
                //We go to coreproduct_id to pick the id which will aid us to get product name
                'product_id' => $carts->coreproduct_id,
                'batchno' => $carts->batchno,
                'expirydate' => $carts->expirydate,
                'business_id' => Auth::user()->business_id,
            ]);
            // $image = Business::find(Auth::user()->business_id);
            // $name = Business::find(Auth::user()->business_id);
             //From purchasecarts table coreproduct_id
            // $stk = Stock::where('business_id', Auth::user()->business_id)->where('product_id', $carts->coreproduct_id)->first();
            // $pdt = Purchase::where('business_id', Auth::user()->business_id)->where('id', $carts->coreproduct_id)->first();


            // $stk->qty = $stk->qty+$carts->qty;
            // $pdt->quantity = $pdt->quantity-$carts->qty;

            // $stk->save();
            // $pdt->save();

            $carts->delete();
            $newcart = Purchasecart::with('purchasecart')->where('business_id', Auth::user()->business_id)->get();
        }


        return Redirect()->back();
        // return view('purchasecarts.index',['product'=>$product,'cart'=>$newcart,'total'=>0,'image'=>$image,'name'=>$name,'receipt'=>$post_service])->with('message', "Purchase added successfully");
     }
}
