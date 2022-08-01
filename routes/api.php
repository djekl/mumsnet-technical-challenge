<?php

use App\Http\Controllers\Api\CreateBookController;
use App\Http\Controllers\Api\GetBookController;
use App\Http\Controllers\Api\GetCollectorSummaryController;
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

Route::post('books', CreateBookController::class);
Route::get('books/{book}', GetBookController::class);
Route::get('collectors/{collector}/recently-added', GetCollectorSummaryController::class);
