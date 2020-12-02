<?php

namespace App;

use App\User;
use App\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $table = 'department';
    protected $fillable = ['faculty_id','name'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function students(){
        return $this->hasMany(User::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }
}