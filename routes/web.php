<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// お問い合わせ入力画面を表示するルート
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/confirm', [ContactController::class, 'confirm']);

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

//Route::get('/login', function () {
    //return view('login');
//})->name('login');

//Route::get('/register', function () {
    //return view('register');
//})->name('register');

require __DIR__.'/auth.php';

