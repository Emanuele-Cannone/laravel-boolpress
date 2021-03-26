@extends('layouts.app')

@section('content')
<div class="container">
    <h1>io sono la pagina index di admin</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">Slug</th>
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
                    <td><a href="{{ route('guest.post.show', $item->slug ) }}" class="btn btn-info">Dettaglio post</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection

