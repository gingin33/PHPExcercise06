<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ScheduleController::class, 'getSchedules'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ScheduleController::class, 'getSchedules'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard', [ScheduleController::class, 'doInsertSchedule'])->middleware(['auth', 'verified'])->name('doCreate');

Route::get('/create', [ScheduleController::class, 'insertSchedule'])->middleware(['auth', 'verified'])->name('create');

require __DIR__.'/auth.php';
