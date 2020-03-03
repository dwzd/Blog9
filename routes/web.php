<?php

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

Route::middleware(['auth', 'role'])->prefix('admin')->group(function (){
   Route::get('dashboard', function (){
      return '<h2 style="text-align: center; color: #b64926">Admin page is here!</h2>';
   });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::get('users/{user}', function (\App\User $user){
   dd($user);
});

