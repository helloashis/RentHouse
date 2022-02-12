<?php

use App\Post;
use Illuminate\Support\Facades\Route;
use App\Division;
use App\Thumbnail;

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

Route::get('/','SiteController@index')->name('frontpage');

Route::get('finddistrict/{id}','DivisionController@myformAjax');
Route::get('/posts/details/{key}', 'SiteController@singlepost')->name('single-post');
Route::get('/all-posts', 'SiteController@allPost')->name('all-post');
Route::get('/category-wise-posts/{keyword}', 'SiteController@categoryPost')->name('category-wise-post');
Route::get('/search-result', 'SearchController@search')->name('search');

Auth::routes();

/** ==== [ User Route ] ==== */
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/my-account', 'HomeController@index')->name('home');
    Route::prefix('my-account')->group(function () {
        Route::get('/new-post', 'PostController@index')->name('new-post');
        Route::get('/recent-posts', 'HomeController@posts')->name('posts');
        Route::get('/addresses', 'HomeController@address')->name('addresses');
        Route::get('/change-password', 'ChangePasswordController@index')->name('change-password');
        Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
        Route::get('/ac-details', 'HomeController@acDetails')->name('ac-details');
        Route::post('/new-post', 'PostController@store')->name('save-post');

    });

});

/** ==== [ Admin Route ] ==== */

Route::prefix('admin')->group(base_path('routes/admin.php'));

