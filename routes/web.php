<?php


use App\Http\Controllers\ExternalBooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ExternalBooksController::class, 'app']);

	Route::match(['patch','get'], 'edit-book', [ExternalBooksController::class, 'editBook']);
	// Route::get('external-books', [ExternalBooksController::class, 'app']);
        //Access for Books Data
    
