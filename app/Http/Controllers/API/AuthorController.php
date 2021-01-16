<?php
namespace App\Http\Controllers\API;

use App\Filters\AuthorFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request, AuthorFilter $authorFilter)
    {
        return AuthorResource::collection(
            Author::with('books')->filter($authorFilter)->paginate(25)->appends($request->query())
        );
    }

    public function store(Request  $request)
    {
        $author = Author::create($request->all());

        return response()->json([
            'message' => 'Author created',
            'summary' => $author
        ], 201);
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return response()->json([
            'message' => 'Author updated',
            'summary' => $author
        ], 200);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(null, 204);
    }
}
