<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // includi i post

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::All();
        
        $data = [
            'posts' => $posts
        ];
    
        return view('guest.post.index', $data);
    }

    public function show($slug)
    {
        
        $posts = Post::where('slug', $slug)->first();
        
        $data = [
            'item' => $posts
        ];
    
        return view('guest.post.show', $data);
    }
}
