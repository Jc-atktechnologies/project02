<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_details';

    /* validation rules for different forms */
    public const account_preference_rules = [
        'user_id'   => 'required|integer',
        'form_type' => 'required'
    ];
}
