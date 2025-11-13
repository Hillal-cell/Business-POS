<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function salelistpdt(){
        return $this->hasMany(Saledetail::class,'sale_id','id');
    }

    /**
     * Get all of the comments for the Sales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


}
