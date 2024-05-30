<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class StocksreportExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $stock = Stock::with('stocklistpdt')->where('business_id', Auth::user()->business_id)->get();;
        return view('stockreport.export',['stock' => $stock]);
    }
}
