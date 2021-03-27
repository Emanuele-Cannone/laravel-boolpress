@extends('layouts.app')


@section('content')

<div class="container">
  <form action="{{route('post.store')}}" method="post">
    @csrf

    @method('POST')

      <label for="campo-user" class="form-label">User Id</label>
      <input class="form-control" disabled="true" type="text" id="campo-user" name="user_id" value={{ Auth::user()->id }}>

      <label class="form-label">User Name</label>
      <input class="form-control" disabled="true" type="text" value={{ Auth::user()->name }}>

      <label for="campo-slug" class="form-label">Slug</label>
      <input class="form-control" type="text" id="campo-slug" name="slug">

      <label for="campo-titolo" class="form-label">Titolo</label>
      <input class="form-control" type="text" id="campo-titolo" name="title">

      <label for="campo-content" class="form-label">Corpo</label>
      <textarea class="form-control" id="campo-content" rows="3" name="content" ></textarea>

      <button class="btn btn-success">Crea Post</button>
</form>
</div>


@endsection







