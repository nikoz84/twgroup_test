<ul class="list-group list-group-flush">
    @if (count($comments) == 0)
    <li class="list-group-item list-group-item-dark">
        <b>Sin comentários</b>
    </li>
    @endif
    @foreach ($comments as $comment)
    <li class="list-group-item list-group-item-dark">
        <p><b>{{$comment->owner->name}}</b>: {{ $comment->content }}</p>
        @if (auth()->user()->id == $comment->owner->id)
        <a class="btn btn-link btn-danger text-white"
            href="{{route('delete.comment', [
                'id' => $comment->id ,
                'user_id' => $comment->owner->id,
                'publication_id' => $comment->publication_id
                ])}}">
            Eliminar
        </a>
        @endif
    </li>
    @endforeach
</div>
