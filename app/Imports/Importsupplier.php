<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class Importsupplier implements ToModel,WithHeadingRow
{




    public function model(array $row)
   {

        $tableimport =  Supplier::create([
            'supplier_name' => $row['supplier_name'],
            'address' => $row['address'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'supplier_date' => $row['supplier_date'],
            'business_id' => Auth::user()->business_id,

           ]);
   }
}
