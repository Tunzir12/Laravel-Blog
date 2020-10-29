<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        
        $posts = Post::orderBy('created_at', 'desc')->limit(8)->get();
         
        return view('welcome')->withPosts($posts);
    }

    public function getAbout() {

        $first= 'Maliha';
        $last= 'Tunzira';

        $full= $first . ' ' . $last;


        return view('about')->withFullname($full);
    }

    public function getBrowse() {
        return view('blog.index');
    }

    public function getContact() {
        return view('contact');
    }
    public function postContact(Request $request) {
        $this->validate($request, ['email' => 'required|email',
        'subject'=>'min:5',
        'message'=>'min:10']);

        $data=array(
            'email'=> $request->email,
            'subject'=> $request->subject,
            'bodyMessage' =>$request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){

            $message->from($data['email']);
            $message->to('noreplytoalex@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','email sent done');

        return redirect('/');
    }
}