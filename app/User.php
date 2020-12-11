<?php

namespace App;

use App\Faculty;
use App\Request;
use App\Department;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email','matric_no','image' ,'signature','kin','address','password','user_password','designation','faculty_id','department_id','programme','level','last_login_at',
        'last_login_ip','request','blood','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function request(){
        return $this->hasMany(Request::class);
    }
}