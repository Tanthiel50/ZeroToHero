<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::resource('/hero', App\Http\Controllers\HeroController::class);
Route::resource('/skill', App\Http\Controllers\SkillController::class);
Route::resource('/univers', App\Http\Controllers\UniversController::class)->except('edit');


