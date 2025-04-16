<?php

use App\Config;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): ViewContract {
    return view('home');
})->name('home');

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
