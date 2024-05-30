<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function expensecategory(){
        return $this->belongsTo(Expensecategory::class,'expensecategory_id','id');
    }


}
