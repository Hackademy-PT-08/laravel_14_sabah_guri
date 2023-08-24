<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;


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

Route::get('/',[HomeController::class,'index'])
->name('home.index');

Route::get('/permesso-negato',[HomeController::class,'error'])
->name('home.error');

//! rotte per gli articoli

Route::get('/articoli',[ArticleController::class,'index'])
->name('articles.index');

Route::get('/articoli/aggiungi',[ArticleController::class,'create'])
->name('articles.create')
->middleware(['auth','verified']);

Route::post('/articoli/aggiungi',[ArticleController::class,'store'])
->name('articles.store')
->middleware(['auth','verified']);

Route::get('/articoli/modifica/{id}',[ArticleController::class,'edit'])
->name('articles.edit')
->middleware(['auth','verified']);

Route::put('/articoli/modifica/{id}',[ArticleController::class,'update'])
->name('articles.update')
->middleware(['auth','verified']);

Route::get('/articoli/dettaglio/{id}',[ArticleController::class,'show'])
->name('articles.show');

Route::delete('/articoli/elimina/{id}',[ArticleController::class,'destroy'])
->name('articles.destroy')
->middleware(['auth','verified']);

//!rotte user
Route::get('/profilo',[UserController::class,'profile'])
->name('user.profile')
->middleware(['auth', 'verified']);

//! rotte per i tag

Route::get('/tag',[TagController::class,'index'])
->name('tags.index');

Route::get('/tag/crea',[TagController::class,'create'])
->name('tags.create')
->middleware(['auth','verified']);

Route::post('/tag/aggiungi',[TagController::class,'store'])
->name('tags.store');

Route::get('tag/modifica/{id}',[TagController::class,'edit'])
->name('tags.edit');

Route::put('tag/modifica/{id}',[TagController::class,'update'])
->name('tags.update');

Route::get('/tag/{id}',[TagController::class,'show'])
->name('tags.show');


Route::delete('tag/elimina/{id}',[TagController::class,'destroy'])
->name('tags.destroy');


