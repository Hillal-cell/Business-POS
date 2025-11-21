<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasecart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purchasecart(){
        return $this->belongsTo(Coreproduct::class,'coreproduct_id','id');
    }
}
