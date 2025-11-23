<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class UnitsExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $unit = Unit::where('business_id', Auth::user()->business_id)->get();
        return view('units.export',['unit' => $unit]);
    }
}
