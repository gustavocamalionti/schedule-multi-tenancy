<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::middleware('guest')->group(function () {
            Route::get('login', [AuthenticatedSessionController::class, 'adminCreate'])->name('admin.login.create');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'adminEdit'])->name('admin.profile.edit');
        });

        /** routes of test's */
    });
}

require __DIR__ . '/auth.php';
