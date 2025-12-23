<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Resources\NoteResource;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return Note::all();
        //return Note::paginate(10);
        $query = Note::orderBy('id','desc');

        if($request->has('search')){
            $query->where('title','like',"%$request->search%");
        }

        return NoteResource::collection($query->paginate(10));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ],
        [
            'title.required' => 'The title field is mandatory.',
            'body.required' => 'The body field is mandatory.',
        ]);

        $note = Note::create($validated);

        return response()->json([
            'message'=>"note created successfully",
            'data'=> new NoteResource($note),
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //return $note;
        return new NoteResource($note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
        ]);

        $note->update($validated);

        return response()->json([
            'message' => "note updated successfully",
            'data' => new NoteResource($note)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json(['message' => 'note deleted successfully'], 200);
    }
}
