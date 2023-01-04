<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'integer|numeric',
            'body' => 'required',
            'cover_image' => 'sometimes|image|nullable|max:1999'
        ]);
        
        //Handle File Upload
        /*if($request->hasFile('cover_image')){


            //// Get filename with the extension
            //$filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //// Get just filename
            //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //// Get just ext
            //$extension = $request->file('cover_image')->getClientOriginalExtension();
            //// Filename to store
            //$fileNameToStore= $filename.'_'.time().'.'.$extension;
            //// Upload Image
            //$path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        //}else{
            //$fileNameToStore = 'noimage.jpg';


        
          $image = $request->file('cover_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $post->cover_image = $filename;



        }
        */


        //create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->slug = $request->input('slug');
        $post->body = Purifier::clean($request->input('body'));
        $post->user_id = auth()->user()->id;


        //Handle File Upload
        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //$location = public_path('images/' . $filename);
            $location = 'images/' . $filename;
            Image::make($image)->resize(800, 400)->save($location);

            
        }else{
            $filename = 'noimage.jpg';
        }
        
       
        $post->cover_image = $filename;
        $post->save();

        $post->tags()->sync($request->tags, false);

        return redirect('/posts')->with('success', 'Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
      
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] =$tag->name;
         }

        //check for the correct user
        if (Auth::check()) {
            $current_userid = Auth::id();
            if($current_userid !=$post->user_id){
                return redirect('/posts')->with('error', 'Unauthorized Page');
            }
            return view('posts.edit')->with('post', $post)->withCategories($cats)->withTags($tags2);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
             $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
            ]);
        }else{
                $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
                'cover_image' => 'image'
            ]);
        }
        
        

        

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->slug = $request->input('slug');
        
        //update post
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            //$filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            //$extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            //$fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
           // $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/' . $filename;
            Image::make($image)->resize(800, 400)->save($location);
            
            $oldFilename = $post->cover_image;
            //update with the new one
            $post->cover_image = $filename;
            //delete old one
            if($post->cover_image != 'noimage.jpg'){
                Storage::delete($oldFilename);
            }

       }else{
            $filename = 'noimage.jpg';
       }
        
        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags, true);
        }else{
            $post->tags()->sync(array());
        }

        return redirect('/posts')->with('success', 'Post Updated');
    }


    public function delete($id)
    {
        
        $post = Post::find($id);
        return view('posts.delete')->withPost($post);
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Auth::check()) {
            $current_userid = Auth::id();
            
            if($current_userid !=$post->user_id){
                return redirect('/posts')->with('error', 'Unauthorized Page');
            }

            $post->tags()->detach();

            if($post->cover_image != 'noimage.jpg'){
                //Delete Image
              // Storage::delete('public/cover_image/'.$post->cover_image);
                 Storage::delete($post->cover_image);
            }

            $post->delete();
            return redirect('/posts')->with('success', 'Post Deleted');
        }
    }
}