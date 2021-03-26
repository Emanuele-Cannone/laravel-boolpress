@extends('layouts.app')


@section('content')

<div class="container">
    <div class="card text-center">
      <div class="card-header">
        {{ $item->user->name }}
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $item->slug }}</h5>
        <p class="card-text">{{ $item->content }}</p>
            
            <a href="{{ route('post.edit', $item->id) }}"><button class="btn btn-warning">Modifica</button></a>
            <form class="d-inline" action="{{ route('post.destroy', $item->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Elimina</button>  
            </form>
      </div>
    </div>
</div>


@endsection







