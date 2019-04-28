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
    return view('landing');
});
// Authenticiate Routing
Route:: get('login','LoginController@getLogin');
Route:: post('login','LoginController@postLogin');
Route:: post('register','Auth\RegisterController@register');
Route::get('/profile', function(){
    return view('profile');
});

/*
 * Route created by yenbka
 */
Route::get('/friend', function (){
    return view('friend');
});
//end route friend 

/*
 * Route created by yenbka
 */
Route::get('/chat', function (){
    return view('chat');
});
//end route chat

Route::get('/photo', function(){
    return view('photo');
});

Route::get('/video', function(){
    return view('video');
});

Route::get('/home', function(){
    return view('newsfeed');
});

Route::get('/about', function(){
    return view('about');
});

// happy comment