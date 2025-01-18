<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//
Route::get('/dashboard', function () {
    return redirect('/profile2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // routes/web.php
    Route::get('/profile2', [TestController::class, 'show'])->name('profile.show');
    Route::get('/profile2/edit', [TestController::class, 'edit'])->name('profile.edit');
    Route::post('/profile2', [TestController::class, 'update'])->name('profile.update');

});

require __DIR__.'/auth.php';
