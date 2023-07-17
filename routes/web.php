<?php

use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TCPDFController;
use App\Http\Controllers\User\MailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Auth\AuthentificationController;
use App\Http\Controllers\wordToPdfController;

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
   Route::resource('user',UserController::class)->except(['show','edit','update']);
});
Route::prefix('user')->name('user.')->middleware(['isAdmin'])->group( function(){
   Route::resource('document',DocumentController::class)->except('show');
   Route::resource('mail',MailController::class)->except('show');
   Route::resource('user',ProfilController::class)->except(['show','create','store','index']);
   Route::get('/download/{document}',[DocumentController::class,'download'])->name('downloading');
   Route::get('/downloadmail/{mail}',[MailController::class,'download'])->name('downloadingmail');
   Route::get('/mail/category/{category}',[MailController::class,'showCategory'])->name('mail.category');
   Route::get('/mail/show/{mail}',[MailController::class,'showSearch'])->name('mail.search');
   Route::get('/mail/format/{format?}',[MailController::class,'showByFormat'])->name('mail.showFormat');
   Route::get('/mail/service/{service}',[MailController::class,'showByService'])->name('mail.showService');
   Route::get('/document/type/{type?}',[DocumentController::class,'showByType'])->name('showType');
   Route::get('/document/format/{format?}',[DocumentController::class,'showByFormat'])->name('showFormat');
   Route::get('/document/service/{service}',[DocumentController::class,'showByService'])->name('showService');
   Route::get('/document/show/{document}',[DocumentController::class,'showSearch'])->name('document.search');
   Route::get('/document/tcpdf/{user}/{document}',[TCPDFController::class,'downloadPdf']);
   Route::get('/mail/tcpdf/{user}/{mail}',[TCPDFController::class,'downloadMail']);
   Route::get('/profil/{user}',[DocumentController::class,'showProfile'])->name('profil');
   Route::post('document/convert',[wordToPdfController::class,'convert'])->name('document.convert');
   Route::post('mail/convert',[wordToPdfController::class,'convertMail'])->name('mail.convert');
});



Route::get('/register',[AuthentificationController::class,'show'])->name('register');
Route::post('/register',[AuthentificationController::class,'registerUser']);
Route::get('/login',[AuthentificationController::class,'showLogin'])->name('login');
Route::post('/login',[AuthentificationController::class,'loginUser']);
Route::get('/logout',[AuthentificationController::class,'logout'])->name('logout');



