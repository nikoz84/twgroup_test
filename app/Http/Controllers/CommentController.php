<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationComment;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {

        $comment = new Comment;
        $has_comment = $comment->userHasComment($request->user_id, $request->publication_id)
            ->get()->first();

        if($has_comment->total == 1){
            return back()->withErrors([
                'Solo es permitido 1 comentário'
            ]);
        }

        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->publication_id = $request->publication_id;

        if($comment->save()){
            $this->sendEmail($request->publication_id);
            return redirect()
                ->route('publication.show', ['id' => $request->publication_id]);
        }

        return back()->withErrors([
            'No fue posible adicionar el comentario'
        ]);


    }

    protected function sendEmail($publication_id)
    {
        try {
            $publication = Publication::find($publication_id);
            Mail::send(new NotificationComment(Auth::user(), $publication));
            return true;
        } catch (Exception $ex) {
            Log::notice($ex->getMessage());
            return false;
        }
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);

        if($comment->delete()){
            return back()->withErrors([
                'Comentário eliminado com suceso!'
            ]);
        }
    }
}
