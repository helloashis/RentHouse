<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upzilla extends Model
{
    protected $fillable = [
        'title',
        'division_id',
        'district_id',
        'status',
    ];
}
