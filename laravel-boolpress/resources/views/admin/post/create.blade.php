@extends('layouts.app')


@section('content')

<div class="container">
  <form action="{{ route('post.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">

      <label for="campo-titolo" class="form-label">Titolo</label>
      <input class="form-control" type="text" id="campo-titolo" name="slug" value={{ $item->slug }}>

      <label for="campo-content" class="form-label">Corpo</label>
      <textarea class="form-control" id="campo-content" rows="3" name="content" >{{ $item->content }}</textarea>

      <button class="btn btn-success">Aggiorna</button>
    </div>
  </form>
</div>


@endsection







