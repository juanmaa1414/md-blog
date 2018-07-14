<?php
namespace App\Http\Controllers;

use App\Note;
use Facades\Parsedown;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$notes = Note::published()->paginate(6);
		return view('notes.index', compact('notes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
		$note = Note::where('slug', $slug)->firstOrFail();
		$parsedHTML = Parsedown::text($note->content);
		$note->content = $parsedHTML;
		return view('notes.show', compact('note'));
    }
}
