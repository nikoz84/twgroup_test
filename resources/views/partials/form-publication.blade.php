@extends('layout.index')

@section('content')
<section class="card bg-dark text-white">
    <div class="card-body">
        <div class="card-title d-flex justify-content-center">
            <h2>Adicionar nueva publicación</h2>
        </div>
        <form method="post" action="{{route('new.publication')}}">
            <div class="form-group">
                <label for="titlePub">Título</label>
                <input class="form-control" id="titlePub"
                    placeholder="Escriva un título interesante" name="title">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                @csrf
            </div>
            <div class="form-group">
                <label for="conentPub">Contenido</label>
                <textarea rows="3" class="form-control" id="contentPub" name="content"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary btn-block" type="submit">Enviar</button>
            </div>
        </form>

        @include('partials/show-errors', ['errors' => $errors])
    </div>
</section>
@endsection
