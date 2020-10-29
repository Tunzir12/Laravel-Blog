<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //connecting to category model (Tag.php)
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
