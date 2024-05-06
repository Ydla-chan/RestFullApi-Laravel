<?php

namespace App\Http\Controllers;
use App\Models\Musics;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Musics::all();
        return response()->json($musics);
    }
    public function store(Request $request)
    {
        $musics = new Musics();
        $musics->title = $request->title;
        $musics->artist = $request->artist;
        $musics->producer = $request->producer;
        $musics->release_date = $request->release_date;
        $musics->save();
        return response()->json([
            'message' => 'Music created successfully',
        ]);
    }
    public function show($id)
    {
        $musics = Musics::find($id);
        if (!empty($musics)) {
            return response()->json($musics);
        } else {
            return response()->json(['message' => 'Music not found']);
        }
    }
    public function update(Request $request, $id)  
    {
        if (Musics::where('id', $id)->exists()) {
            $musics = Musics::find($id);
            $musics->title = is_null($request->title) ? $musics->title : $request->title;
            $musics->artist = is_null($request->artist) ? $musics->artist : $request->artist;
            $musics->producer = is_null($request->producer) ? $musics->producer : $request->producer;
            $musics->release_date = is_null($request->release_date) ? $musics->release_date : $request->release_date;
            $musics->save();
            return response()->json([
                'message' => 'Music updated successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Music not found'
            ]);
            }
    }
    public function destroy($id)
    {
        if (Musics::where('id', $id)->exists()) {
            $musics = Musics::find($id);
            $musics->delete();
            return response()->json([
                'message' => 'Music deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Music not found'
            ]);
        }

    }
}
