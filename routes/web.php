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

Route::get('/members/create', [MemberController::class, 'create']);
Route::post('/members', [MemberController::class, 'store']);
Route::get('/schools/{school}', [SchoolController::class, 'show']);
