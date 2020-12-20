<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/profiles/createProfile/{id}', function ($id){
    
    return View('profile.createProfile',['id' => $id]);
});




Route::get('/', function () {

    return view('home.admin');
});

Route::get('/create_user', function () {

    return view('user.create_user');
});

Route::get('/create_tag', function () {

    return view('tag.create_tag');
});

Route::get('/createArticles', function () {

    return view('article.createArticles');
});

Route::get('/showArticle', function () {

    return view('article.showArticle');
});

Route::resource('users', UserController::class)->middleware(['auth','role:admin, editor']);



Route::resource('profiles', ProfileController::class)->middleware(['auth','role:admin']);


Route::resource('articles', ArticleController::class)->middleware(['auth','role:admin,viewer']);

Route::resource('tags', TagController::class)->middleware(['auth','role:viewer,admin']);

Route::get('/getData/{id}', 'SearchController@getData')->name('getData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ->middleware(['auth','role:editor'])