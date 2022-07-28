<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('welcome', function () {
    $items = DB::table('tbl_user')->get();
    return view ('welcome', compact('existingItem'));
});
Route::get('/', function () {
    return view('welcome');
});

*/
use App\Http\Controllers\ItemController;

 
Route::get('/', [ItemController::class, 'show']);

Route::post('/todo', [ItemController::class, 'store']);

Route::post('/check/{id}', [ItemController::class, 'update']);

Route::delete('/task/{id}', [ItemController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
