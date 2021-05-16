<?php
use App\Models\Schedule;
use App\Events\ScheduleEvent;
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

Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
Route::post('/store', [ScheduleController::class, 'store'])->name('store');
Route::post('/update/{id}', [ScheduleController::class, 'update'])->name('update');
Route::post('/delete/{id}', [ScheduleController::class, 'destroy'])->name('delete');

Route::get('/event', function () {
    event(new ScheduleEvent(Schedule::take(1)->first()));
    // dd('Event Run Successfully.');
});