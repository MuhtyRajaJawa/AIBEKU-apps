<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.index');
})->name('landing');


/*
|--------------------------------------------------------------------------
| Inspirasi
|--------------------------------------------------------------------------
*/

Route::get('/inspirasi', function () {
    return view('inspirasi.index');
})->name('inspirasi');

Route::get('/inspirasi/{slug}', function ($slug) {
    return view('inspirasi.show', [
        'slug' => $slug
    ]);
})->name('inspirasi.show');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/user', function () {

    if (!Auth::check()) {
        return response()->json([], 401);
    }

    return response()->json([
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
    ]);

});

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return response()->json([
        'success' => true
    ]);

});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Scan
|--------------------------------------------------------------------------
*/

Route::get('/scan', function () {
    return view('scan.index');
})->name('scan');

Route::post('/analyze-image', [AnalyzeController::class, 'analyze'])
    ->name('analyze.image');


Route::post('/chat-ai', [ChatController::class, 'chat']);

Route::get('/gemini-test', function () {

    $apiKey = env('GEMINI_API_KEY');

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post(
        "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}",
        [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => "Balas hanya dengan tulisan: Halo AIBEKU"
                        ]
                    ]
                ]
            ]
        ]
    );

    return response()->json([
        'status' => $response->status(),
        'body' => $response->json(),
    ]);

});