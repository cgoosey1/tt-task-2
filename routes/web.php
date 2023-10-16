<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MemberController;
use \App\Http\Controllers\SchoolController;

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

Route::prefix('members')->group(function () {
    Route::get('/create', [MemberController::class, 'create'])
        ->name('members.create');
    Route::post('/', [MemberController::class, 'store'])
        ->name('members.store');
    Route::get('/csv', [MemberController::class, 'exportCSV'])
        ->name('members.csv');
});
Route::prefix('schools')->group(function () {
    Route::get('/report', [SchoolController::class, 'report'])
        ->name('schools.report');
    Route::get('/{school}', [SchoolController::class, 'show'])
        ->name('schools.show');
});
