<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ExternalBooksController;
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

Route::get('external-books', [ExternalBooksController::class, 'show']);

Route::prefix('/v1')->namespace('App\Http\Controllers')->group(function()
{
        //Access for Books Data
    Route::post('books', [BooksController::class, 'create']);
    Route::get('books', [BooksController::class, 'read']);
    Route::patch('books/{id}', [BooksController::class, 'update']);
    Route::delete('books/{id}', [BooksController::class, 'delete']);
    Route::get('books/{id}', [BooksController::class, 'show']);
    Route::get('search-name/{name}', [BooksController::class, 'searchName']);
    Route::get('search-country/{country}', [BooksController::class, 'searchCountry']);
    Route::get('search-publisher/{publisher}', [BooksController::class, 'searchPublisher']);
    Route::get('search-year/{year}', [BooksController::class, 'searchYear']);
});
