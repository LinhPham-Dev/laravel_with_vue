<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookReviewController;
use App\Http\Controllers\Api\BookVersionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('books', BookController::class)->except([
    'create', 'edit'
]);

Route::get('books/{bookId}/book-versions', BookVersionController::class)->name('books.versions');
Route::get('books/{bookId}/book-reviews', BookReviewController::class)->name('books.reviews');

Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
