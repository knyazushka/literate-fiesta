<?php
namespace App\Http\Controllers\API;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request, BookFilter $bookFilter)
    {
        return BookResource::collection(
            Book::with('authors')->filter($bookFilter)->paginate(25)->appends($request->query())
        );
    }

    public function store(Request  $request)
    {
        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book created',
            'summary' => $book
        ], 201);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json([
            'message' => 'Book updated',
            'summary' => $book
        ], 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
