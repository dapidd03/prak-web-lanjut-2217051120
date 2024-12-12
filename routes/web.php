<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/profile/{nama}/{kelas}/{npm}', [ProfileController::class, 'profile']);
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');  // List users
    Route::get('/create', [UserController::class, 'create'])->name('user.create');  // Create user form
    Route::post('/store', [UserController::class, 'store'])->name('user.store');  // Store new user
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');  // Show user details
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');  // Edit user form
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');  // Update user data
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');  // Delete user
});
