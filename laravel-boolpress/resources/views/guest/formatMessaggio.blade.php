@extends('layouts.app')


@section('content')

<h1>questo è il messaggio dal form contatti del sito</h1>
<div>
	{{	$lead->nome	}}
	{{	$lead->mail	}}
	{{	$lead->messagge	}}
</div>



@endsection



