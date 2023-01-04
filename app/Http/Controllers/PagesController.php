<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Mail;
use DB;

class PagesController extends Controller
{
    public function index(){

        $title = 'Technology, Its Pace And Us';
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
      
        
    	return view('pages.index')->with('title', $title)->with('posts', $posts);
    }

    public function about(){
        $title = 'About';
    	return view('pages.about')->with('title', $title);
    }

    public function services(){
    	$data = array(
            'title' => 'Services',
    		'services' => ['Web Development', 'Software Development', 'Mobile App Development', 'Database Management Services', 'Web Hosting', 'IT Support']
    	);
    	return view('pages.services')->with($data);
    }

    public function contact(){
        $title = 'Contact';
        return view('pages.contact')->with('title', $title);
    }


    public function gallery(){
        $title = 'Gallery';
        return view('pages.gallery')->with('title', $title);
    }

    public function technology(){
        $title = 'Technology';
        return view('pages.technology')->with('title', $title);
    }

    public function discussion(){
        $title = 'Discussion';
        return view('pages.discussion')->with('title', $title);
    }

    public function Coding(){
        $title = 'Coding';
        return view('pages.coding')->with('title', $title);
    }


    public function postcontact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('virendra.mishra1001@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your Email was Sent!');
        return redirect('/');
    }

    public function profile(){

        
        $title = 'User Profile';
        return view('pages.profile')->with('title', $title);  
    }
}
