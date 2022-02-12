<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class District extends Model
{
    protected $fillable = [
        'name','division_id', 'status',
    ];

}
