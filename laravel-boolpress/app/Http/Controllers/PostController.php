<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // includi i post

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::All();
        dump($posts);

        $data = [
            'posts' -> $posts
        ];
        
        return view('guest.post.index', $data);
    }
}
