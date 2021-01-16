<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookAuthorController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books', BookController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::resource('authors', AuthorController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::resource('books.authors', BookAuthorController::class)->only([
    'index', 'store'
]);
