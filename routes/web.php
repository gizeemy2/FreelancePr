<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; 

// Login formu göster
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Login formundan gelen veriyi işle
Route::post('/login', [AuthController::class, 'login']);

// Çıkış route'u
Route::post('/logout', function () {
    Auth::logout(); // Kullanıcı çıkışı
    return redirect('/login'); // Çıkınca ön yüze yönlendir
})->name('logout');


Route::get('/', function () {
    return view('welcome');
});

// Eğer kullanıcı giriş yapmamışsa -> login sayfasına yönlendir
Route::get('/admin', function () {
    if (auth()->check()) {
        return view('dashboard'); 
    } else {
        return redirect()->route('login'); 
    }
});


Route::get('/', [HomeController::class, 'index']);



// Route::get('/admin', function () {
//     return view('dashboard'); // blade dosyanın tam yolu
// });
