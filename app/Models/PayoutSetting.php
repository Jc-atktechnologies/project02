<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayoutSetting extends Model
{
    use HasFactory;
    /**
    * validation rules for user registration form
     */
    public const user_permission_rules = [
        'user_id'   => 'required|integer',
        'form_type' => 'required'
    ];
}
