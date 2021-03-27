<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        $data = [
            'posts' => $posts
        ];
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $newPost = new Post();

        $newPost->user_id = Auth::user()->id;
        $newPost->fill($data);
        $slug = Str::slug($newPost->title);// dichiaro la costruzione base dello slug
        $primoSlug = $slug; // mi salvo lo slug creato
        
        
        
        $postEsistente = post::where('slug', $slug)->first();// prendo il primo post con lo slug uguale ad altri (nel caso esista)
        $contatore = 1; // inizializzo la variabile a 0
            
            
        while ($postEsistente) { // se esiste un post con uno slug uguale
            $slug = $primoSlug.'-'.$contatore; // costruisco uno slug concatenando lo slug creato . - . numerocrescente
            $postEsistente = post::where('slug', $slug)->first(); // lo assegno al PRIMO post uguale 
            $contatore++; // aumento il numero
        }
            
        $newPost->slug = $slug; // assegno lo slug 

        $newPost->save();

        return redirect()->route('post.index', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts = Post::where('slug', $slug)->first();
        
        $data = [
            'item' => $posts
        ];

        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = Post::where('slug', $post)->first();
        $data = [
            'item' => $post
        ];

        return view('admin.post.edit', $data);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $data = $request->all();

        $post->update($data);

        return redirect()->route('post.index', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
