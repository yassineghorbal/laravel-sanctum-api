<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        return Show::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'artist' => 'required',
            'date' => 'required',
            'place' => 'required',
            'price' => 'required',
            'seats' => 'required'
        ]);
        return Show::create($request->all());
    }

    public function show($id)
    {
        return Show::find($id);
    }

    public function update(Request $request, $id)
    {
        $show = Show::find($id);
        $show->update($request->all());
        return $show;
    }

    public function destroy($id)
    {
        return Show::destroy($id);
    }

    public function search($artist)
    {
        return Show::where('name', 'like', '%' . $artist . '%')->get();
    }
}
