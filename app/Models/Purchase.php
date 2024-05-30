<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productcore(){
        return $this->belongsTo(Coreproduct::class,'coreproduct_id','id');
    }

}
