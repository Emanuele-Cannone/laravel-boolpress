@extends('layouts.app')



@section('content')

<div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->user->name }}</h5>
                <h5 class="card-title">{{ $item->slug }}</h5>
                <p class="card-text">{{ $item->content }}</p>
            </div>
    </div>
</div>
    

@endsection






