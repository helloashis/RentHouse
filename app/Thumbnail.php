<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{


    public function getpost(){
        return $this->hasOne(Post::class,'id','post_id');
    }
}
