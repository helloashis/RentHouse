<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'district_id',
        'name',
        'slug',
        'status'
    ];
}
