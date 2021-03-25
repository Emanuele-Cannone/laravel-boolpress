<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            
        ];
        return view('guest.posts.index', $data);
    }
}
