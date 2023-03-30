<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'homeWithoutConnection'])->name('accueil');
Route::get('/home', [HomeController::class, 'homeWithConnection'])->middleware(['auth'])->name('home');

Route::resource('artworks', ArtworkController::class);
Route::resource('visitors', VisitorController::class);

Route::post('/upload/artwork/{id}', [UploadController::class, 'uploadArtwork'])->name('upload.artwork');
Route::post('/upload/visitor/{id}', [UploadController::class, 'uploadVisitor'])->name('upload.visitor');

Route::get('/logout', [HomeController::class, 'homeWithConnection'])->name('logout'); // TODO A changer
