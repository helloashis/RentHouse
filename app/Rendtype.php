<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendtype extends Model
{
    protected $fillable = [
        'title','slug','icon'
    ];

    public function posts(){
        return $this->hasOne(Rendtype::class,'id','type');
    }
}
