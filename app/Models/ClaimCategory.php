<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimCategory extends Model
{
    use HasFactory;
    protected $fillable =['title'];


    const CREATE_VALIDATION_RULES = [
        'title'=>'required|unique:claim_categories'
    ];
    
}
