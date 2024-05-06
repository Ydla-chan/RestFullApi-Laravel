<?php

namespace App\Http\Controllers;

use App\Models\Films;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function index()
    {
        $films = Films::all();
        return response()->json($films);
    }
    public function store(Request $request)
    {
        $films = new Films();
        $films->title = $request->title;
        $films->director = $request->director;
        $films->producer = $request->producer;
        $films->release_date = $request->release_date;
        $films->save();
        return response()->json([
            'message' => 'Film created successfully',
        ]);
    }
    public function show($id)
    {
        $films = films::find($id);
        if (!empty($films)) {
            return response()->json($films);
        } else {
            return response()->json(['message' => 'Film not found']);
        }
    }
    public function update(Request $request, $id)
    {
        if (Films::where('id', $id)->exists()) {
            $films = Films::find($id);
            $films->title = is_null($request->title) ? $films->title : $request->title;
            $films->director = is_null($request->director) ? $films->director : $request->director;
            $films->producer = is_null($request->producer) ? $films->producer : $request->producer;
            $films->release_date = is_null($request->release_date) ? $films->release_date : $request->release_date;
            $films->save();
            return response()->json([
                'message' => 'Film updated successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Film not found'
            ]);
            }
    }
    public function destroy($id)
    {
        if (Films::where('id', $id)->exists()) {
            $films = Films::find($id);
            $films->delete();
            return response()->json([
                'message' => 'Film deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Film not found'
            ]);
        }
    }
}
