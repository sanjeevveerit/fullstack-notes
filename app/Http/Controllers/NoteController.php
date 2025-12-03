<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Note::all();
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
        ]);

        $note = Note::create($validated);

        return response()->json(['message'=>"note created successfully",
        'data'=>$note],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return $note;
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

        return response()->json(['message' => "note updated successfully",
        'data' => $note], 200);
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
