<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
      $books = Books::all();
      return response()->json($books);
    }
    public function store(Request $request)
    {
        $books = new Books();
        $books->name = $request->name;
        $books->author = $request->author;
        $books->description = $request->description;
        $books->category = $request->category;
        $books->save();
        return response()->jsonn([
            'message' => 'Book created successfully',
        ]);
    }
    public function show($id)
    {
        $books = Books::find($id);
        if(!empty($books)){
            return response()->json($books);
        }else{
            return response()->json(['message' => 'Book not found']);
        }
    }
    public function update(Request $request, $id)
    {
        if(Books::where('id', $id)->exists()){
            $books = Books::find($id);
            $books->name = is_null($request->name) ? $books->name : $request->name;
            $books->author = is_null($request->author) ? $books->author : $request->author;
            $books->description = is_null($request->description) ? $books->description : $request->description;
            $books->category = is_null($request->category) ? $books->category : $request->category;
            $books->save();
            return response()->json([
                'message' => 'Book updated successfully'
            ]);
        }else{
            return response()->json([
                'message' => 'Book not found'
            ]);
        }
    }
    public function destroy($id)
    {
    if(books::where('id', $id)->exists()){
        $books = Books::find($id);
        $books->delete();
        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }else{
        return response()->json([
            'message' => 'Book not found'
        ]); 
    }

}
}