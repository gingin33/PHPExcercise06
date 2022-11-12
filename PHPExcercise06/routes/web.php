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

Route::post('/create/done', [ScheduleController::class, 'doInsertSchedule'])->middleware(['auth', 'verified'])->name('doCreate');

Route::get('/create', [ScheduleController::class, 'insertSchedule'])->middleware(['auth', 'verified'])->name('create');

Route::get('/edit/{id}', [ScheduleController::class, 'editSchedule'])->middleware(['auth', 'verified'])->name('edit');

Route::post('/edit/done', [ScheduleController::class, 'doEditSchedule'])->middleware(['auth', 'verified'])->name('doEdit');

Route::get('/delete/{id}', [ScheduleController::class, 'deleteSchedule'])->middleware(['auth', 'verified'])->name('delete');

Route::get('/delete/done/{id}', [ScheduleController::class, 'doDeleteSchedule'])->middleware(['auth', 'verified'])->name('doDelete');

require __DIR__.'/auth.php';
