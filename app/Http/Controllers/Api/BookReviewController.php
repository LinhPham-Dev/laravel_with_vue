<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookReviewResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {

        $book = Book::findOrFail($id);

        return ['bookReviews' => BookReviewResource::collection(
            $book->reviews()->latest()->get()
        )];

        // return $book->reviews()->count() > 0
        //     ? response()->json($book->reviews()->latest()->get(), 202, ['message' => "Get reviews of this book successfully!"])
        //     : response()->json([], 202, ['message' => "Not found any reviews of this book!"]);
    }
}
