<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class ExpensesExport implements FromView,ShouldAutoSize
{

    public function view(): View
    {

        $expense = Expense::where('status',1)->where('business_id', Auth::user()->business_id)->get();
        return view('expenses.export',['expense' => $expense]);
    }
}
