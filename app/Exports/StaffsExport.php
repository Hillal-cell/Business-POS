<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class StaffsExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $staff = Staff::where('status',1)->where('business_id', Auth::user()->business_id)->get();
        return view('staff.export',['staff' => $staff]);
    }
}
