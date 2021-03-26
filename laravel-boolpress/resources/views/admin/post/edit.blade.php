@extends('layouts.app')


@section('content')

<div class="container">
  <div class="mb-3">

    <label for="campo-titolo" class="form-label">Titolo</label>
    <input class="form-control" type="text" id="campo-titolo" value={{ $item->slug }}>

    <label for="campo-content" class="form-label">Corpo</label>
    <textarea class="form-control" id="campo-content" rows="3">{{ $item->content }}</textarea>
  
  </div>
</div>


@endsection







