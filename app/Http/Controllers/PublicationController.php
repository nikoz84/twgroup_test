<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /** List all with pagination */
    public function index()
    {
        $paginator = Publication::orderBy('created_at', 'desc')->with('user')->paginate(5);

        return view('pages.publications',['paginator'=> $paginator]);
    }
    /** Show one per ID */
    public function show($id)
    {
        $publication = Publication::with(['comments', 'user'])->findOrFail($id);

        return view('pages.publication', ['publication'=>$publication]);
    }
    public function showFormPublication()
    {

        return view('partials.form-publication', ['message'=> null]);
    }

    public function create(Request $request)
    {
        $publication = new Publication;


        $publication->content = $request->content;
        $publication->user_id = $request->user_id;
        $publication->title = $request->title;

        if($publication->save()){
            return redirect()->route('publications.list');
        }

        return view('partials.form-publication', ['message'=> 'No fue posible crear la publicación']);
    }

    public function delete(Request $request)
    {
        $publication = Publication::find($request->id);

        if($publication->delete()){
            return redirect()->route('publications.list');
        }
    }
}
