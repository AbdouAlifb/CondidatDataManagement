<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\DiagnosticsController;


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

Route::get('/index', [UsersController::class, 'dashboard'])->name('index');
Route::post('/diagnostics', [DiagnosticsController::class, 'store'])->name('diagnostics.store');
Route::get('/user/diagnostics', [DiagnosticsController::class, 'userIndex'])->name('diagnostics.userIndex');

Route::middleware(['admin'])->group(function () {
    Route::get('/diagnostics', [DiagnosticsController::class, 'index'])->name('diagnostics.index');

// Route for the Questions index page
Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');

// Route for creating a new question
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');

// Route for storing a new question
Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');

// Route for editing a question
Route::get('/questions/edit/{question}', [QuestionController::class, 'edit'])->name('questions.edit');

// Route for updating a question
Route::put('/questions/update/{question}', [QuestionController::class, 'update'])->name('questions.update');

// Route for deleting a question
Route::delete('/questions/destroy/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

// Route for creating a new response
Route::get('/responses/create', [ResponseController::class, 'create'])->name('responses.create');

// Route for storing a new response
Route::post('/responses/store', [ResponseController::class, 'store'])->name('responses.store');
});
















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


