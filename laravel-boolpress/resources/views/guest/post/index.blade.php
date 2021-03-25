@extends('layouts.app')




@section('content')


    @foreach ($posts as $item)
        <div class="container">
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->user->name }}</h5>
                <h5 class="card-title">{{ $item->slug }}</h5>
                <p class="card-text">{{ $item->content }}</p>
                <a href="#" class="btn btn-primary">Dettaglio post</a>
            </div>
            </div>
        </div>
    @endforeach


@endsection