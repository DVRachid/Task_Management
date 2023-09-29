<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::redirect('/', '/tasks');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

  // Routes that require authentication
 
// The '/' route (homepage) remains accessible to everyone.
Route::get('/tasks', [TasksController::class, 'index'])->name("tasks.index");

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
  Route::get('/tasks/create', [TasksController::class, 'create'])->name("tasks.create");
Route::post('/tasks', [TasksController::class, 'store'])->name("tasks.store");
Route::delete('/tasks/{tasks}', [TasksController::class, 'destroy'])->name("tasks.delete");
Route::get('/tasks/{tasks}', [TasksController::class, 'edit'])->name("tasks.edit");
Route::put('/tasks/{tasks}', [TasksController::class, 'update'])->name("tasks.update");
});



Route::get('/tasks/filter/{status}', [TasksController::class, 'filterByStatus'])->name('tasks.filter');
Route::get('/tasks/sort/date', [TasksController::class, 'sort'])->name("tasks.sort");
