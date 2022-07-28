<?php

use App\Http\Controllers\ItemController;
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
/* Show Task Dashboard */
Route::get('/item', [ItemController::class, 'index']);
Route::prefix('/item')->group( function () {
    /* Add Task */
    Route::post('/store', [ItemController::class, 'store']);
    /* Update Task */
    Route::put('/{id}', [ItemController::class, 'update']);
    /* Delete Task */
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});