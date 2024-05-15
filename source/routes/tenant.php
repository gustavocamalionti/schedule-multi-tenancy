<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'tenantCreate'])->name('tenant.login.create');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'tenantEdit'])->name('tenant.profile.edit');
    });

    /** routes of test's */
    Route::get('/teste', function () {
        return 'Thehehe ' . tenant('id');
    });
});
