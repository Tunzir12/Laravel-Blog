<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //connecting to category model (Category.php)
    public function category(){
        return $this->belongsTo('App\Category');
    }


    //connecting to category model (Tag.php)
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    //connecting to Comment model (Comment.php)
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
