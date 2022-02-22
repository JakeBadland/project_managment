<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\taskController;

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

/**
 * Test route
 */
/*
Route::get('/{any}', function ($any) {
    var_dump($any);
})->where('any', '.*');
*/

/**
 * Main route
 */
Route::get('/', [MainController::class, 'index']);

/**
 * Language route
 */
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

/**
 * Auth routes
 */
Route::match(array('GET','POST'),'login', [AuthController::class, 'login'])->name('login');
Route::match(array('GET','POST'),'registration', [AuthController::class, 'registration'])->name('registration');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/**
 * Project routes
 */
Route::group(['prefix' => 'project'], function() {
    Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    Route::match(array('GET','POST'),'create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('read/{id}', [ProjectController::class, 'read'])->name('project.read');
    Route::match(array('GET','POST'), 'update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
});

/**
 * Task routes
 */
Route::group(['prefix' => 'task'], function() {
    Route::get('/{projectId}', [TaskController::class, 'index'])->name('task.index');
    Route::get('create/{projectId}', [TaskController::class, 'create'])->name('task.create');
    Route::post('save', [TaskController::class, 'save'])->name('task.save');
    Route::get('read/{id}', [TaskController::class, 'read'])->name('task.read');
    Route::match(array('GET','POST'), 'update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});
