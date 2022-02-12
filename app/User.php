<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'photo', 'phone', 'email', 'password','division','district',
    ];

    public function getposts() {
        return $this->hasMany(Post::class,'user_id' , 'id');
    }
    public function getcity(){
        return $this->hasOne(City::class, 'id', 'city');
    }
    public function getdist(){
        return $this->hasOne(District::class, 'id', 'district');
    }
    public function getdiv(){
        return $this->hasOne(Division::class, 'id', 'division');
    }

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
}
