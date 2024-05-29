<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTextRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $texts = Auth::user()->authors;

        return view('text-list', ['texts' => $texts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(('text-edit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTextRequest $request)
    {
        //
        

        $author_info = $request->safe()->only(['author_name', 'url']);
        $contenido = $request->safe()->only(['contenido']);


        $author = new Author();
        $author->name = $author_info["author_name"];
        $author->url = $author_info["url"];
        $author -> save();

        $author->users()->attach(Auth::user(), array('content'=>$contenido["contenido"]));

        return redirect(route('texts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
