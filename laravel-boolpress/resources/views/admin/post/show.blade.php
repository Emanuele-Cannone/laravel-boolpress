@extends('layouts.app')

@section('title', 'Blog - Dettaglio Post')

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
      <a class="dropdown-item" href="{{ route('profile') }}">Info Utente</a>
      <a class="dropdown-item" href="#">Tag</a>
      <a class="dropdown-item" href="#">Categorie</a>
    </div>
  </div> 
</div> 


  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        {{ $item->user->name }}
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $item->slug }}</h5>
        <p class="card-text">{{ $item->content }}</p>
        <img src=" {{ asset('storage/'.$item->cover) }}" alt="">
        <div class="mt-3">
          <a href="{{ route('post.edit', $item->slug) }}"><button class="btn btn-warning">Modifica</button></a>
          <form class="d-inline" action="{{ route('post.destroy', $item->id) }}" method="post">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger">Elimina</button>  
          </form>
        </div>
      </div>
    </div>
  </div>



@endsection







