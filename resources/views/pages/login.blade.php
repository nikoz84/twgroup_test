@extends('layout.index')

@section('content')
<section class="row d-flex justify-content-center text-white">
    <div class="col-5">
        <form method="post" action="{{ route('make.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="Su email: teste@email.com">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
        </form>

        @include('partials/show-errors', ['errors' => $errors])
</div>
</section>
@endsection


