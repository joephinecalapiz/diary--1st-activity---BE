<?php

namespace App\Http\Controllers;

use App\Models\Mydiary;
use Illuminate\Http\Request;

class MydiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mydiary = Mydiary::all();
        return response()-> json($mydiary);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'description'=> 'required',
        ]);
        $mydiary = new Mydiary();
        $mydiary-> title = input['title'];
        $mydiary-> description = input['description'];
        $mydiary-> save();
        return response()->json($mydiary);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mydiary $mydiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mydiary $mydiary)
    {
        $input = $request-> validate([
            'title' => 'required',
            'description'=> 'required',
        ]);
        $mydiary-> title = input['title'];
        $mydiary-> description = input['description'];
        $mydiary-> save();
        return response()->json($mydiary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mydiary $mydiary)
    {
        return response ()-> json($mydiary->delete());
    }
}
