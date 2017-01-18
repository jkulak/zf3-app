<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Card;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
        // $note = new Note;
        // $note->body = $request->body;
        // $card->notes()->save($note);

        // $note = new Note(['body' => $request->body]);

        // $card->notes()->save(
        //     new Note(['body' => $request->body])
        // );

        // $card->notes()->create(['body' => $request->body]);

        // $card->notes()->create($request->all());

        // return $request->all();
        $card->addNote(
            new Note($request->all())
        );

        return back();

        // return \Redirect::to('/some/new/uri');
        // return redirect()->to('/new/uri');
        // return redirect('/new/uri');

        // return $request->all();
        // return \Request::all();
        // return request()->all(); // a request helper function
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return back();
    }
}