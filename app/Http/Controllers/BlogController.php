<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class BlogController extends Controller
{
    //

    public function getIndex(){

        $posts= Post::paginate(5);

        return view('blog.index')->withPosts($posts);
    }


    public function getSingle($slug){

        //fetch from the database based on slugs
        $post= Post::where('slug','=', $slug)->first();


        //return view and pass in the object

        return view('blog.single')->withPost($post);

    }

    
    
    
}
