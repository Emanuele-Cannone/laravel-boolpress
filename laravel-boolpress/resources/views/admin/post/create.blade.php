@extends('layouts.app')

@section('title', 'Blog - Nuovo Post')
    


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
  <form action="{{route('post.store')}}" method="post">
    @csrf

    @method('POST')

      <label for="campo-user" class="form-label">User Id</label>
      <input class="form-control mb-2" disabled="true" type="text" id="campo-user" name="user_id" value={{ Auth::user()->id }}>

      <label class="form-label">User Name</label>
      <input class="form-control  mb-2" disabled="true" type="text" value={{ Auth::user()->name }}>

      <label for="campo-slug" class="form-label">Slug</label>
      <input class="form-control  mb-2" type="text" id="campo-slug" name="slug">

      <label for="campo-titolo" class="form-label">Titolo</label>
      <input class="form-control  mb-2" type="text" id="campo-titolo" name="title">

      <label for="campo-content" class="form-label">Corpo</label>
      <textarea class="form-control  mb-2" id="campo-content" rows="3" name="content" ></textarea>



      <button class="btn btn-success mt-3">Crea Post</button>
</form>
</div>


@endsection







