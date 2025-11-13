<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class ProductsExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $product = Product::where('business_id', Auth::user()->business_id)->get();;
        return view('products.export',['product' => $product]);
    }
}
