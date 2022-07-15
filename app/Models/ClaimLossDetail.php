<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimLossDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function lossType(){
        return $this->belongsTo(LossType::class);
    }
}
