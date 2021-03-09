<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/make-login',[AuthController::class, 'makeLogin'])->name('make.login');



Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/publications', [PublicationController::class, 'index'])->name('publications.list');
Route::get('/publications/{id}', [PublicationController::class, 'show'])->name('publication.show');
Route::get('/new-publication', [PublicationController::class, 'showFormPublication'])
    ->name('form.publication');
Route::get('/delete-publication', [PublicationController::class, 'delete'])->name('delete.publication');

Route::post('/create-publication', [PublicationController::class, 'create'])->name('new.publication');
Route::post('/new-comment', [CommentController::class, 'create'])->name('new.comment');
Route::get('/delete-comment', [CommentController::class, 'delete'])->name('delete.comment');

Route::get('/mail', function(){

    $publication = App\Models\Publication::find(1);
    $user = App\Models\User::find($publication->user_id);

    Mail::send( new App\Mail\NotificationComment($user, $publication));

});

