@extends('layouts.app')

@section('title', 'Blog - Dashboard')

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
      <a class="dropdown-item" href="{{ route('profile') }}">Info Utente</a>
      <a class="dropdown-item" href="#">Tag</a>
      <a class="dropdown-item" href="#">Categorie</a>
    </div>
    </div> 
  </div> 
</div>

<div class="container">
  <table class="table">
      <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Autore</th>
            <th scope="col">Titolo</th>
            <th scope="col">Immagine</th>
            <th scope="col">Tag</th>
            <th scope="col">Creato il</th>
            <th scope="col">Dettagli</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($posts as $item)
          <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->user->name }}</td>
              {{-- <td>{{ $item->user->id }}</td> --}}
              <td>{{ $item->title }}</td>
              {{-- <td>{{ $item->tags }}</td> --}}
              <td><img src=" {{ asset('storage/'.$item->cover) }}" alt=""></td>
              <td>
                @foreach ($tags as $tag)
                    @if ( $item->tags->contains($tag->id) == 'checked')
                    {{ $tag->slug }}      
                    @endif
                @endforeach
              </td>
              
              {{-- <td>{{ $item->content }}</td> --}}
              <td>{{ $item->created_at }}</td>
              <td><a href="{{ route('post.show', $item->slug ) }}" class="btn btn-info">Modifica post</a></td>
          </tr>
      </tbody>
      @endforeach
  </table>
    </div>
@endsection

