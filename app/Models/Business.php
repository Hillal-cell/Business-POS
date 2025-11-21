<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function businessrole(){
        return $this->hasOne(User::class,'business_id','id');
    }
}
