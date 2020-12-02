<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Request extends Model
{


    protected $table = 'request';
    protected $fillable = ['user_id'];



    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}