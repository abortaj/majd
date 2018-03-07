<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api','can:media'], 'namespace'=>'Api'],function (){
    Route::post('/utilities/upload/video','UtilityController@uploadVideo')->name('utility.upload.video');
    Route::post('/utilities/upload/image','UtilityController@uploadImage')->name('utility.upload.image');
    Route::post('/utilities/upload/file','UtilityController@uploadFile')->name('utility.upload.file');
});

Route::group(['middleware'=>['auth:api', 'can:admin-panel'],'namespace'=>'Api'],function (){

    Route::get('info','HomeController@info');

    // Profile
    Route::get('/profile','UserController@profile');
    Route::post('/profile','UserController@updateProfile');
    Route::post('/update-password','UserController@updatePassword');
    Route::post('/update-email','UserController@updateEmail');

    // User
    Route::post('/user','UserController@store')->middleware('can:create-user');
    Route::put('/user/{id}','UserController@update')->middleware('can:update-user');
    Route::get('/user/{id}','UserController@get')->middleware('can:show-user');
    Route::get('/user/details/{id}','UserController@details')->middleware('can:show-user');
    Route::post('/user/active/{id}','UserController@toggleActive')->middleware('can:control-user');

    // Tag
    Route::post('/tag','TagController@store')->middleware('can:create-tag');
    Route::put('/tag/{id}','TagController@update')->middleware('can:update-tag');
    Route::delete('/tag/{id}','TagController@destroy')->middleware('can:delete-tag');
    Route::get('/tag/{id}','TagController@get')->middleware('can:update-tag');
    Route::get('/tags/list','TagController@dropdown');

    // Tag Type
    Route::post('/tag-type','TagTypeController@store')->middleware('can:create-tag-type');
    Route::put('/tag-type/{id}','TagTypeController@update')->middleware('can:update-tag-type');
    Route::delete('/tag-type/{id}','TagTypeController@destroy')->middleware('can:delete-tag-type');
    Route::get('/tag-type/{id}','TagTypeController@get')->middleware('can:update-tag-type');
    Route::get('/tag-types/list','TagTypeController@dropdown');

    // Datatables
    Route::get('/users/datatable','UserController@datatable')->middleware('can:show-users');
    Route::get('/tags/datatable','TagController@datatable')->middleware('can:show-tags');
    Route::get('/tag-types/datatable','TagTypeController@datatable')->middleware('can:show-types');
    Route::get('/posts/datatable','PostController@datatable')->middleware('can:show-posts');
    Route::get('/comments/datatable','CommentController@datatable')->middleware('can:show-comments');
    Route::get('/roles/datatable','RoleController@datatable')->middleware('admin');
    Route::get('/sections/datatable/{type?}','SectionController@datatable')->middleware('can:show-sections');


    // Sections
    Route::post('/sections/store','SectionController@store')->middleware('can:create-section');
    Route::put('/sections/update/{id}','SectionController@update')->middleware('can:update-section');
    Route::delete('/sections/{id}','SectionController@delete')->middleware('can:delete-section');
    Route::get('/sections/tree','SectionController@tree');
    Route::get('/sections/list','SectionController@dropdown');
    Route::get('/sections/{id}','SectionController@show');

    // Settings
    Route::get('/settings','SettingsController@get')->middleware('can:update-settings');
    Route::put('/settings','SettingsController@update')->middleware('can:update-settings');

    // Menus
    Route::post('/menu-items/store','MenuItemController@store')->middleware('admin');
    Route::put('/menu-items/update/{id}','MenuItemController@update')->middleware('admin');
    Route::get('/menu-items/tree/{menuId}','MenuItemController@tree')->middleware('admin');
    Route::get('/menu-items/{id}','MenuItemController@show')->middleware('admin');
    Route::delete('/menu-items/{id}','MenuItemController@delete')->middleware('admin');
    Route::get('menus','MenuController@Index')->middleware('admin');
    Route::get('potential-items/{id}','MenuItemTypeController@potentialItems')->middleware('admin');
    Route::get('menu-item-types','MenuItemTypeController@index')->middleware('admin');

    // Posts
    Route::post('/post/status/{id}','PostController@toggleStatus')->middleware('can:control-post');

    // Roles
    Route::get('/roles/dropdown','RoleController@dropdown');

    Route::post('/role','RoleController@store')->middleware('admin');
    Route::put('/role/{id}','RoleController@update')->middleware('admin');
    Route::delete('/role/{id}','RoleController@destroy')->middleware('admin');
    Route::get('/role/{id}','RoleController@get')->middleware('admin');

    Route::get('/my-permissions','PermissionController@userPermissions');

    // Comment
    Route::delete('/comment/{id}','CommentController@destroy')->middleware('can:delete-comment');

});