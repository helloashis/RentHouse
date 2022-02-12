<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //

    protected $fillable =[
        'fb_ulr','inst_url','twt_url','gle_url',
    ];
}
