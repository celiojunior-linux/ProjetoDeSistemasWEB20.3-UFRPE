<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource("/tasks", TaskController::class)->middleware("auth");
Route::post("/tasks/{id}/complete",[TaskController::class, "complete" ])->name("complete")->middleware("auth");

Route::get("/search", [TaskController::class, "search" ])->name("search")->middleware("auth");

Route::delete("/deleteall/{user_id}", [TaskController::class, "deleteAll" ])->name("deleteall")->middleware("auth");
