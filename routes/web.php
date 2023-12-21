<?php

use App\Http\Controllers\GroupController;
use App\Livewire\Tasks\TasksIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Header;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/tasks', TasksIndex::class)->name('tasks.index');
    Route::get('/group/{groupId}', [GroupController::class, 'showGroupPage'])->name('group.page');

});

require __DIR__.'/auth.php';
