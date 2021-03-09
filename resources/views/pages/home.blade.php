@extends('layout.index')

@section('content')
<div class="jumbotron bg-dark text-white">
    <h1 class="display-4">Prueba de conocimientos en Laravel Framework</h1>
    <p class="lead">Leer archivo README.md para instalación</p>
    <hr class="my-4">
    <p>Haga su login <a href="{{route('login')}}">AQUI</a></p>
</div>
@endsection
