@extends('layouts.app')

@section('title', 'Blog - Modifica Post')

@section('content')

<div class="d-flex justify-content-center mb-3">
  <div class="dropdown">
    <a href="{{ route('post.create') }}"><button type="button" class="btn btn-success">Nuovo Post</button></a>
    <button class="ml-2 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Visualizza
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{ route('post.index') }}">Dashboard</a>
      <a class="dropdown-item" href="{{ route('guest.post.index') }}">Post</a>
      <a class="dropdown-item" href="#">Utenti</a>
      <a class="dropdown-item" href="#">Tag</a>
      <a class="dropdown-item" href="#">Categorie</a>
    </div>
    </div> 
  </div> 
</div>

<div class="container">
  <form action="{{ route('post.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">

      <label for="campo-titolo" class="form-label">Titolo</label>
      <input class="form-control" type="text" id="campo-titolo" name="slug" value={{ $item->slug }}>

      <label for="campo-content" class="form-label">Corpo</label>
      <textarea class="form-control" id="campo-content" rows="3" name="content" >{{ $item->content }}</textarea>

      <button class="btn btn-success mt-3">Aggiorna</button>
    </div>
  </form>
</div>


@endsection







