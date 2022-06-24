<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
//    only the values in array will be inserted if we use the insert method
    protected $fillable = ['created_by','title','status'];
}
