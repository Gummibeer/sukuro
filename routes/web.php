<?php

use App\Config;
use App\Http\Controllers\Auth\CallbackOauthController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RedirectOauthController;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(callback: static function (): void {
    Route::prefix('oauth/{provider}')->name('oauth.')->group(static function (): void {
        Route::get('redirect', RedirectOauthController::class)->name('redirect');
        Route::get('callback', CallbackOauthController::class)->name('callback');
    })->whereIn('provider', [
        'discord',
    ]);
});

Route::middleware('auth')->group(callback: static function (): void {
    Route::delete('logout', LogoutUserController::class)->name('logout');
});

Route::get('/', function (): ViewContract {
    return view('home');
})->name('home');

Route::middleware('auth')->get('/achievements', function (): ViewContract {
    return view('achievements');
})->name('achievements');

Route::get('/new', function (): RedirectResponse {
    return redirect()->route('game', [
        'seed' => Config::random(),
    ]);
})->name('new');

Route::get('/{seed}', function (string $seed): ViewContract {
    return view('game', [
        'seed' => $seed,
    ]);
})->name('game');
