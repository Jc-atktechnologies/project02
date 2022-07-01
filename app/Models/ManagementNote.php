<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementNote extends Model
{
    use HasFactory;
    protected $table = 'management_notes';
    /**
     * validation rules for user registration form
     */
    public const user_management_note_rules = [
        'user_id'   => 'required|integer',
        'note'      => 'required'
    ];
}
