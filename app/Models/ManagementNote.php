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
    /**
     * to get the user name, who added the file
     * function will return the user name
     */
    public function userDetail(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
