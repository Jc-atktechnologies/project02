<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attatchment extends Model
{
    use HasFactory;
    protected $table = 'attatchments';
    /**
     * validation rules for user registration form
     */
    public const user_attachment_rules = [
        'user_id'       => 'required|integer',
        'attachment'    => 'required|file|mimes:png,gif,jpeg,jpg,pdf,doc',
        'description'   => 'required'
    ];
    /**
     * to get the user name, who added the file
     * function will return the user name
    */
    public function userDetail(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
