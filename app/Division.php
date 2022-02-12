<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'title','slug', 'status',
    ];

    public function district(){
        return $this->hasMany('App\District', 'division_id');
    }
    public function user(){
        return $this->hasMany('App\User', 'division');
    }

}
