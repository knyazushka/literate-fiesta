<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    public function index(Book $book)
    {
        return response()->json($book->authors()->get(), 200);
    }

    public function store(Request  $request, Book $book)
    {
        $author = $request->input('author_id');
        $book->authors()->attach($author);

        return response()->json([
            'message' => 'Author added',
            'summary' => ['book_id' => $book->id, 'author_id' => $author]
        ], 201);
    }
}
