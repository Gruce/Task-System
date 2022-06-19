<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Task\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('change-language/{locale}', [MainController::class, 'changeLanguage'])->name('change_locale');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {


    Route::prefix('home')->group(function () {
        Route::get('/', Home::class)->name('home');
    });

    Route::prefix('task')->group(function () {
        Route::get('/', Task::class)->name('task');
    });
});
