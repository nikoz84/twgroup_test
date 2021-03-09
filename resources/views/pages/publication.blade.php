@extends('layout.index')

@section('content')
<section class="row">
    <div class="col-lg-6">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h1 class="card-title">
                    {{$publication->title}}
                </h1>
                <p class="card-text">{{$publication->content}}</p>
                <p>Creado en: {{$publication->created_at}}</p>
                <p>Publicador(a): {{$publication->user->name}}</p>
                @if (auth()->user()->id == $publication->user->id)
                <a href="{{route('delete.publication', ['id' => $publication->id])}}"
                    class="card-link text-danger">
                    Eliminar Publicación
                </a>
                @endif
            </div>
        </div>
        <div class="card text-white bg-dark mt-5">
            <div class="card-body">
                @include('partials/form-comment', ['id' => $publication->id])
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card text-white bg-dark ">
            <div class="card-body">
                <h2 class="card-title">
                    Comentários
                </h2>
                @include('pages/comments', ['comments' => $publication->comments])
            </div>
        </div>
    </div>
</section>
@endsection
