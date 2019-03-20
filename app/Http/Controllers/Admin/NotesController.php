<?php
namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Note;
use Illuminate\Http\Request;
use Lloople\Notificator\Notificator;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// TODO: really, only own notes, or all. Depends.
		$this->authorize('see-notes');
		
		$notes = Note::published()->paginate(16);
		return view('notes.index_admin', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-notes');
		
        return view('notes.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'title' => 'required',
			'content' => 'required',
		]);
		
		$note = Note::create([
			'title' => $request->title,
			'user_id' => 1,
			'published' => $request->published,
			'content' => $request->content,
		]);
		
		$note->syncTagsFromUserInput($request->tags);
		
		Notificator::success('Note created successfully');
		return redirect()->route('notes.edit', $note);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
			'title' => 'required',
			'content' => 'required',
		]);
		
		$note = Note::update([
			'title' => $request->title,
			'user_id' => 1,
			'published' => $request->published,
			'content' => $request->content,
		]);
		
		$note->syncTagsFromUserInput($request->tags);
		
		Notificator::success('Note updated successfully');
		return redirect()->route('notes.show', $note->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function jsonSearchTags(Request $request)
	{
		$foundTags = Tag::bySearch($request->q)->get();
		$result = [
			'success' => true,
			'result' => $foundTags->pluck('label')->toArray()
		];
		
		return response()->json($result);
	}
}
