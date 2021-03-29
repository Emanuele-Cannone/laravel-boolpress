@extends('layouts.app')


@section('content')
<div class="container">
  <form action="{{ route("azioneInvioMessaggio") }}"	method="post">
    @method('POST')
    @csrf
  
    <div class="form-group">
      <label for="nomeUtente">Nome Utente</label>
      <input type="text" class="form-control" name="nome" id="nomeUtente" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">Inserisci il tuo nome</small>
    </div>
  
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Inserisci la tua mail</small>
    </div>
  
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Messaggio</label>
      <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  
    <button type="submit" class="btn btn-primary">Invia</button>
  
  </form>
</div>


@endsection



