<form method="post" action="{{route('new.comment')}}">
    <div>
        <div class="form-group">
            <label for="content">Escriba un comentário</label>
            <textarea rows="3" class="form-control" id="content"
                placeholder="Escriva su comentário aqui" name="content"></textarea>
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <input type="hidden" name="publication_id" value="{{$id}}">
            @csrf
        </div>
        <div class="form-group">
            <button class="btn btn-secondary btn-block" type="submit">Enviar</button>
        </div>
    </div>
</form>

@include('partials/show-errors', ['errors' => $errors])
