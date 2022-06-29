<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * validation rules for user details registration form
     */
    public const user_rules = [
        'full_name'     => 'required|min:5|max:100',
        'email'         => 'required|email|unique:users',
        'title'         => 'required|min:2|max:15',
        'mobile_number' => 'required|min:10|max:15',
        'branch_id'     => 'required|integer',
        'dob'           => 'required',
        'ssn'           => 'required',
        'preferred_for' => 'required',
    ];
    public const user_permission_rules = [
        'user_id'   => 'required|integer',
        'form_type' => 'required'
    ];
    public const team_membership_rule = [
        'user_id'   => 'required|integer',
        'form_type' => 'required'
    ];
    public const skill_rule = [
        'user_id'   => 'required|integer',
        'form_type' => 'required'
    ];
}
