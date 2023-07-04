<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Auth\AuthentificationController;

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


Route::prefix('admin')->name('admin.')->middleware(['isAdmin','user'])->group( function(){
      Route::get("/home", [HomeController::class,"show"])->name('home');
   Route::resource('department',DepartmentController::class)->except('show');
   Route::resource('service',ServiceController::class)->except('show');
   Route::resource('category',CategoryController::class)->except('show');
});
Route::prefix('user')->name('user.')->middleware(['isAdmin'])->group( function(){
   Route::resource('document',DocumentController::class)->except('show');
   Route::resource('mail',MailController::class)->except('show');
   Route::get('/download/{document}',[DocumentController::class,'download'])->name('downloading');
   Route::get('/downloadmail/{mail}',[MailController::class,'download'])->name('downloadingmail');
   Route::get('/mail/favorite',[MailController::class,'showFavorites'])->name('mail.favorite');
   Route::get('/mail/important',[MailController::class,'showImportants'])->name('mail.important');
   Route::get('/mail/show/{mail}',[MailController::class,'showSearch'])->name('mail.search');
   Route::get('/document/show/{document}',[DocumentController::class,'showSearch'])->name('document.search');

});

Route::get('/register',[AuthentificationController::class,'show'])->name('register');
Route::post('/register',[AuthentificationController::class,'registerUser']);
Route::get('/login',[AuthentificationController::class,'showLogin'])->name('login');
Route::post('/login',[AuthentificationController::class,'loginUser']);
Route::get('/logout',[AuthentificationController::class,'logout'])->name('logout');



