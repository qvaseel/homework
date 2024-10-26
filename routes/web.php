<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [MainController::class, 'showIndex']) -> name('home');

    Route::get('/array', [MainController::class, 'showArray']) -> name('array');

    Route::get('/reports', [ReportController::class, 'index']) -> name('report.index');

    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

    Route::post('/reports', [ReportController::class, 'store'])->name('report.store');

    Route::get('/reports/{report}', [ReportController::class, 'show'])->name('report.show');

    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('report.update');

});


require __DIR__.'/auth.php';
