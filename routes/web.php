<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormDataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/submit-form', [FormDataController::class, 'store'])->name('submit.form');
Route::get('/data', [FormDataController::class, 'index'])->name('data.index');
Route::get('/candidates/{candidate}', [FormDataController::class, 'show'])->name('candidates.show');
Route::delete('/candidates/{candidate}', [FormDataController::class, 'destroy'])->name('candidates.destroy');
