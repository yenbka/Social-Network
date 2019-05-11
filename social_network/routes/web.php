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
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('landing');
})->name('login');
// Authenticiate Routing
Route:: get('login','LoginController@getLogin');
Route:: post('login','LoginController@postLogin');
Route:: post('register','Auth\RegisterController@register');
Route::get('/profile', function(){
    return view('profile');
});

Route::get('/friend/{id}', [
    'as' => 'friend',
    'uses' => 'FriendController@index'
]);

Route::post('/getOldMessage',[
    'as'=>'get-old-message',
    'uses' => 'ChatController@getOldMessage'
]);
Route::post('/sendMessage',[
    'as'=>'get-old-message',
    'uses' => 'ChatController@sendMessage'
]);
Route::get('/photo/{id}', [
    'as' => 'photo',
    'uses' => 'PhotoController@index'
]);

Route::get('/video', function(){
    return view('video');
});

Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/about', function(){
    return view('about');
});

Route::get('/profile/{id}', [
    'as' => 'profile',
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

Route::get('/profile/{id}/friend_requests', [
    'as' => 'friend_requests',
    'uses'=> 'FriendController@get_request'
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::post('/profile/{id}/update_avatar', [
    'as' => 'update_avatar',
    'uses' => 'ProfileController@update_avatar'
]);

Route::post('/profile/{id}/update_header', [
    'as' => 'update_header',
    'uses' => 'ProfileController@update_header'
]);

Route::post('/search', [
    'as' => 'search',
    'uses' => 'HomeController@search'
]);

Route::post('/friend/send_request', [
    'uses' => 'FriendController@send_request'
]);

Route::post('/friend/process_request', [
    'uses' => 'FriendController@process_request'
]);

Route::post('/friend/unfriend', [
    'uses' => 'FriendController@unfriend'
]);

// happy comment

/*
 * Route created by ngavuong
 */
Route::get('/newsfeed', ['as'=>'newsfeed','uses'=>'PostController@getPost']);

Route::post('/newsfeed',['as'=>'add-post','uses'=>'PostController@addPost']);

Route::get('/delete-post/{pid}', ['as'=>'delete-post','uses'=>'PostController@deletePost']);

Route::get('/edit-post/{pid}',['as'=>'get-edit-post','uses'=>'PostController@getEditPost']);

Route::post('/edit-post/{pid}',['as'=>'edit-post','uses'=>'PostController@editPost']);

Route::post('/like/{pid}',['as'=>'like', 'uses'=>'LikeController@likePost']);

Route::post('/comment/{pid}',['as'=>'comment', 'uses'=>'CommentController@addComment']);

//end

