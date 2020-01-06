<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;

    protected $table = 'faculty';
    protected $fillable = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function department(){
        return $this->hasMany('App\Department');
    }
    public  function student(){
        return $this->hasMany('App\User');
    }
}
