<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

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



Route::get('/', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}/update',[TaskController::class, 'update'])->name('tasks.update');
Route::put('/tasks/{task}/toggle-complete',[TaskController::class, 'tonggleCompleted'])->name('tasks.toggle.complete');
Route::get('/tasks/{task}', [TaskController::class, 'singleTask'])->name('tasks.single');

