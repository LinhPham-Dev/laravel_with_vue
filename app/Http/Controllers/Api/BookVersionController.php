<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookVersionResource;
use App\Models\Book;
use App\Models\BookVersion;
use Illuminate\Http\Request;

class BookVersionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        // Validate
        // $data = $request->validate([
        //     'from' => "date_format:Y-m-d"
        // ]);

        $book = Book::findOrFail($id);

        // $bookVersions = ['bookVersions' => new BookVersionResource($book->bookVersions()->get())];

        return $book->bookVersions()->count() > 0
            ? response()->json($book->bookVersions()->get(), 202, ['message' => "Get book versions successfully!"])
            : response()->json([], 202, ['message' => "Not found any version of this book!"]);
    }
}
