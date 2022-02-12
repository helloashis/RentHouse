<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'user_id','title','floore','rooms','type','available','price','description','features','address','dist','city','status'
    ];



    public function getuser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function get_type(){
        return $this->hasOne(Rendtype::class, 'id', 'type');
    }

    public function getcity(){
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function getdist(){
        return $this->hasOne(District::class, 'id', 'dist');
    }
}
