<?php

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

Route::get('/insert', [App\Http\Controllers\EnterDataController::class, 'index'])->name('');
Route::get('/insertData',function() {
    return view('insertData');
});  
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('');

Route::get('/menu', [App\Http\Controllers\dataViewController::class, 'index'])->name('');

Route::post('/create', [App\Http\Controllers\EnterDataController::class, 'create'])->name('');
Route::post('/insert', [App\Http\Controllers\EnterDataController::class, 'create'])->name('');
Route::post('/insert2', [App\Http\Controllers\EnterDataController::class, 'create2'])->name('');
Route::get('/search', [App\Http\Controllers\Search2Controller::class, 'index']);

Route::post('/search', [App\Http\Controllers\Search2Controller::class, 'show']);
// Route::get('/sell', [App\Http\Controllers\HomeController::class, 'sell']);
Route::get('/client/{id}', [App\Http\Controllers\HomeController::class, 'client']);
Route::get('/vendor/{id}', [App\Http\Controllers\HomeController::class, 'vendor']);
// Route::get('insert', [App\Http\Controllers\EnterDataController::class, 'insertform']);
