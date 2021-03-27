@extends('layouts.app')

@section('content')
    <div class="container">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Azioni
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Nuovo Post</a>
  </div>
</div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Content</th>
                <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->content }}</td>
                    <td><a href="{{ route('post.show', $item->slug ) }}" class="btn btn-info">Dettaglio post</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection

