@extends('layouts.app')




@section('content')

@foreach ($posts as $item)
<div class="container">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $iteme['title'] }}</h5>
        <p class="card-text">{{ $iteme['content'] }}</p>
        <a href="#" class="btn btn-primary">Dettaglio post</a>
      </div>
    </div>
</div>
@endforeach


@endsection