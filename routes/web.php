<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthentificationController;
use App\Http\Controllers\User\DocumentController;

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

Route::get('/', function () {
    return view('user.index');
})->name('home');


Route::prefix('admin')->name('admin.')->middleware(['isAdmin'])->group( function(){
   Route::resource('department',DepartmentController::class)->except('show');
   Route::resource('service',ServiceController::class)->except('show');
   Route::resource('category',CategoryController::class)->except('show');
});
Route::prefix('user')->name('user.')->middleware(['isAdmin'])->group( function(){
   Route::resource('document',DocumentController::class)->except('show');

});



Route::get('/register',[AuthentificationController::class,'show'])->name('register');
Route::post('/register',[AuthentificationController::class,'registerUser']);
Route::get('/login',[AuthentificationController::class,'showLogin'])->name('login');
Route::post('/login',[AuthentificationController::class,'loginUser']);
Route::get('/logout',[AuthentificationController::class,'logout'])->name('logout');



