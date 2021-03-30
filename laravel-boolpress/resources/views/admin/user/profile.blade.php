@extends('layouts.app')


@section('content')

<div class="container">

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

    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
        <li class="list-group-item">Nome: {{ Auth::user()->name }}</li>
        <li class="list-group-item">Email: {{ Auth::user()->email }}</li>

        @if(Auth::user()->api_token )
        <li class="list-group-item">Token: {{ Auth::user()->api_token }}</li>
            
        @else

        </ul>
    </div>

    <form action="{{ route('genera-token') }}" method="post">
        @csrf
        @method('POST')
        <button class="btn btn-primary mt-2">Genera Api Token</button>
    </form>

    @endif

</div>



    
@endsection
