<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
class PostController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]); // this will make sure you can access the array behind the arrow without being logged in
    }
    
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function create(){
        if(Auth::user()->is_admin == '1'){
            return view('posts.create');
        }else{
            return redirect()->route('index')->with('status', 'You can\'t create a post!');
    };
    }
    public function store(Request $request){
        if (Auth::user()->is_admin != '1') {
            return redirect()->route('index')->with('status', 'You can\'t create a post!');
        }else{
        $validated = $request->validate([
            'title'         => 'required|min:3',
            'content'       => 'required|min:10',
        ])
        ;

        $post = new Post;

        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->user_id = Auth::user()->id;;
        $post->save();

        return redirect()->route('index')->with('status', 'Post added!');
    }}

    public function edit($id){
        $post = Post::findOrFail($id);
        if($post->user_id == Auth::user()->id || Auth::user()->is_admin == '1')
            return view('posts.edit', compact('post'));
        else
            return redirect()->route('index')->with('status', 'You can\'t edit this post!');
        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request) {
        $post = Post::findOrFail($id);
    
        // Check if the user can edit the post
        if ($post->user_id != Auth::user()->id && Auth::user()->is_admin != '1') {
            return redirect()->route('index')->with('status', 'You can\'t edit this post!');
        }
    
        $validated = $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required|min:10',
        ]);
    
        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->save();
    
        return redirect()->route('index')->with('status', 'Post updated!');
    }
     
    public function destroy($id) {
        $post = Post::findOrFail($id);
    
        // Check if the user can delete the post
        if ($post->user_id != Auth::user()->id && Auth::user()->is_admin != '1') {
            return redirect()->route('index')->with('status', 'You can\'t delete this post!');
        }
    
        $post->delete();
    
        return redirect()->route('index')->with('status', 'Post deleted!');
    }

}
