<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LossType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public const LOSS_TYPE_RULES = [
        'title'         => 'required|unique:loss_types',

    ];
}
