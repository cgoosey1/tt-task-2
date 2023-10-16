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

Route::get('/members/create', [MemberController::class, 'create'])
    ->name('members.create');
Route::post('/members', [MemberController::class, 'store'])
    ->name('members.store');
Route::get('/schools/{school}', [SchoolController::class, 'show'])
    ->name('schools.show');
