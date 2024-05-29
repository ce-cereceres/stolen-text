<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $texts = Auth::user()->authors;
        return view('compare', ['texts'=>$texts]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function compare(Request $request)
    {
        //
        $textoComparar = $request->all();
        $texts = Auth::user()->authors;

        foreach ($texts as $text) {
            if ($textoComparar["textoComparar"] == $text->pivot->content) {
                return view('robado', ['text'=>$text]);
            }

        
            
        }

        return view('norobado');


    }
}
