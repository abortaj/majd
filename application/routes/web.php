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
//Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');



//Auth
Route::group(['middleware' => 'guest'], function(){
    Route::get('/verify/{email}/{verify_token}','AuthController@verify')->name('email.verify');

    Route::get('login','AuthController@loginForm')->name('login');
    Route::get('register','AuthController@registerForm')->name('register');
    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::get('registration-thanks','AuthController@thanks')->name('registration-thanks');

});
//Auth::routes();
//

Route::group(['middleware' => ['auth','active']], function()
{
    Route::get('user-setting','UserSettingController@edit')->name('user-setting');
    Route::get('profile/{id}','ProfileController@edit')->name('profile');
    Route::post('profile/update','ProfileController@updateInfo')->name('profile.update');
    Route::post('profile/update/image','ProfileController@updateImage')->name('profile.update.image');
    Route::post('profile/update/email','ProfileController@updateEmail')->name('email.update');
    Route::post('profile/update/password','ProfileController@updatePassword')->name('password.update');

    Route::post('comment','CommentController@store')->name('comment.store');

    Route::post('rate','RateController@rate')->name('rate');
    Route::get('rate/{post}','RateController@form')->name('rate.form');

    Route::get('subsections/{parentId?}','SectionController@dropdown')->name('subsections.list');

    Route::get('/admin', function () {
        initSEO(trans('seo.admin'));
        return view('admin');
    })->middleware('can:admin-panel')->name('admin');

    Route::get('my-posts','AuthorController@index')
        ->name('author')
        ->middleware('author');

    Route::get('post/create','PostController@create')
        ->name('post.create')
        ->middleware('can:create-post');

    Route::post('post','PostController@store')
        ->name('post.store')
        ->middleware('can:create-post');

    Route::get('post/{id}/edit','PostController@edit')
        ->name('post.edit');

    Route::put('post/{id}','PostController@update')
        ->name('post.update');

    Route::delete('post/{id}','PostController@destroy')
        ->name('post.delete');

    Route::get('post/{id}/comments','PostController@comments')
        ->name('post.comments');

    Route::post('comment/{id}/delete','CommentController@destroy')
        ->name('comment.delete');

    Route::get('logout','AuthController@logout')->name('logout');

});

Route::get('email', 'HomeController@email')->name('sendEmail');