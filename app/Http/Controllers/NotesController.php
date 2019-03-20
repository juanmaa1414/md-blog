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
    public function index(Request $request)
    {
		$paginated = Note::published()->paginate(6);
		$items = collect($paginated->items());
		
		// In the first page, set separately the first header ones
		if ($request->page == "1" || ! $request->page) {
			$firstTwo = [$items[0], $items[1]];
			$notes = $items->splice(2);
		} else {
			$notes = $items;
		}
		
		return view('notes.index', compact('paginated', 'firstTwo', 'notes'));
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
