<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class District extends Model
{
    protected $fillable = [
        'title','division_id', 'status',
    ];

}
