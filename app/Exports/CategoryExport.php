<?php

namespace App\Exports;

use App\Models\Productcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class CategoryExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $pdtcategory = Productcategory::where('business_id', Auth::user()->business_id)->get();
        return view('productcategories.export',['pdtcategory' => $pdtcategory]);
    }
}
