@extends('layouts.app')




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

    @foreach ($posts as $item)
        <div class="container">
            <div class="card mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->user->name }}</h5>
                        <h5 class="card-title">{{ $item->slug }}</h5>
                        <p class="card-text">{{ $item->content }}</p>
                        <a href="{{ route('guest.post.show', $item->slug ) }}" class="btn btn-primary">Dettaglio post</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection



