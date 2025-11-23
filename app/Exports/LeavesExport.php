<?php

namespace App\Exports;

use App\Models\Leave;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class LeavesExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $leave = Leave::with('leavetype')->where('status',1)->orderBy('id','desc')->where('business_id', Auth::user()->business_id)->get();
        return view('leaves.export',['leave' => $leave]);
    }
}
