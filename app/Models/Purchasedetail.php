<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasedetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function coreproductsale(){
        return $this->belongsTo(Coreproduct::class,'coreproduct_id','id');
    }
}
