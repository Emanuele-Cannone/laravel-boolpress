<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Tag;

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
        $tags = Tag::all();

        $data = [
            'tags' => $tags
        ];

        return view('admin.post.create', $data);
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

        
        if(array_key_exists('tags', $data)){
            $newPost->tags()->sync($data['tags']); // va qui perchè i tags hanno una chiave associativa in relazione che viene creata solamente dopo il salvataggio
        }

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
        $tags = Tag::all();
        $data = [
            'tags' => $tags,
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
         if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']); // va qui perchè i tags hanno una chiave associativa in relazione che viene creata solamente dopo il salvataggio
        }

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
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('post.index');
    }
}
