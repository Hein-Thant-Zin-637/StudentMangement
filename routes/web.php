<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/register');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/course', App\Http\Controllers\CourseController::class);

Route::resource('/teacher', App\Http\Controllers\TeacherController::class);

Route::resource('/batch', App\Http\Controllers\BatchController::class);

Route::resource('/student', App\Http\Controllers\StudentController::class);

Route::resource('/enrollement', App\Http\Controllers\EnrollementController::class);

Route::resource('/payment', App\Http\Controllers\PaymentController::class);

Route::get('/print/{id}', [App\Http\Controllers\PaymentController::class, 'print'])->name('payment.print');






