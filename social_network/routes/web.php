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

Route::get('/profile/{id}', [
    'as' => 'profile_id',
    'uses' => 'ProfileController@index'
]);

Route::get('/about/{id}', [
    'as' => 'about',
    'uses' => 'AboutController@index'
]);

Route::get('/profile/{id}/profile_update_info', [
    'as' => 'get_profile_update_info',
    'uses' => 'ProfileController@get_profile_update_info'
]);

Route::post('/profile/{id}/update_info', [
    'as' => 'profile_update_info',
    'uses' => 'ProfileController@profile_update_info'
]);

Route::get('/profile/{id}/hobbies_update_info', [
    'as' => 'get_hobbies_update_info',
    'uses'=> 'HobbieController@get_hobbies_update_info'
]);

Route::post('/profile/{id}/hobbies_update_info', [
    'as' => 'hobbies_update_info',
    'uses'=> 'HobbieController@hobbies_update_info'
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::post('/profile/{id}/update_avatar', [
    'as' => 'update_avatar',
    'uses' => 'ProfileController@update_avatar'
]);

// happy comment