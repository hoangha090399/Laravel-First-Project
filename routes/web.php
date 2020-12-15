<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
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

Route::resource('users', UserController::class);
Route::get('/users', function (){

    $users = DB::table('users')->get();
    return view('user.userlist',  ['users' => $users]);
});



Route::resource('profiles', ProfileController::class);
Route::get('/profiles', function (){

    $profiles = DB::table('profiles')->get();
    return view('user.index',  ['profiles' => $profiles]);
});

Route::resource('articles', ArticleController::class);

Route::resource('tags', TagController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
