<?php

use App\Http\Controllers\AsrListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('asr-lists', AsrListController::class);
Route::get('/asr-lists/search/{name}', [AsrListController::class, 'search']);

// Route::get('/asr-lists', [AsrListController::class, 'index']);
// Route::post('/asr-lists', [AsrListController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
