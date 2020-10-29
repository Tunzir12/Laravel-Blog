<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //connecting to category model (Post.php)
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
