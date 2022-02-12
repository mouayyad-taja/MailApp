<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/folder/{path}', [HomeController::class, 'index'])->name('folder');
Route::get('/compse', [HomeController::class, 'composeForm'])->name('compose');
Route::post('/compose', [HomeController::class, 'compose'])->name('composePost');
