@extends('layouts.app')


@section('content')

<div class="container">
  @if (session('status') == 'ok')
    <h1>messaggio inviato</h1>
  @endif
</div>



@endsection



