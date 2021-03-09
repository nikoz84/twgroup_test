@extends('layout.index')

@section('content')
<section>
    <header class="row text-white">
        <h2>PUBLICACIONES</h2>
    </header>
    <div class="row text-white d-flex justify-content-between">
        <p>Total: <b>{{ $paginator->total() ? $paginator->total() : 'Sin publicaciones' }}</b></p>
        <a href="{{ route('form.publication') }}">+ Nueva Publicación</a>
    </div>
    {{ $paginator->links() }}
    <div class="row">
        @foreach ($paginator->items() as $publication)
        <div class="card col-lg-3 text-white bg-info mb-3 ml-5" style="max-width: 18rem;">
            <div class="card-header">Publicador(a): {{$publication->user->name}}</div>
            <div class="card-body">
            <h5 class="card-title">
                <a class="text-white" style="text-decoration: underline" href="{{ route('publication.show', $publication->id) }}">{{$publication->title}}</a>
            </h5>
            <p class="card-text">{{$publication->excerpt}}</p>
            <span class="text-light">
                {{$publication->created_at}}
            </span>
            </div>
        </div>
        @endforeach
    </div>
    {{ $paginator->links() }}
</section>
@endsection
