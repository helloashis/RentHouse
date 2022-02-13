<?php

    use Illuminate\Support\Facades\Route;



    Route::get('/login','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\LoginController@login')->name('admin.login.submit');

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::group(['middleware'=>'auth:admin'], function () {

        Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
        Route::get('admin-logout','AdminController@adminLogout')->name('admin.logout');
        Route::get('/users/manage-users','AdminController@manageUsers')->name('user.manage');
        Route::get('/posts/manage-posts','AdminController@managePosts')->name('posts.manage');

        Route::get('/manage','AdminController@manageAdmin')->name('admin.manage');
        Route::post('/create-admin','AdminController@addAdmin')->name('add.admin');
        Route::get('/delete-admin/{id}','AdminController@deleteAdmin')->name('delete');
        Route::get('/super-admin/{id}','AdminController@superAdmin')->name('make-super');


        Route::get('/rent-type','RentTypeController@index')->name('admin.renttype');
        Route::post('/create-rent-type','RentTypeController@create')->name('add.rent-type');
        Route::get('/delete-type/{id}','RentTypeController@delete')->name('delete.type');



        Route::get('/social-link','SocialController@index')->name('admin.social');
        Route::post('/social-link/update','SocialController@update')->name('social.update');


        Route::get('/about','AboutController@index')->name('admin.about');
        Route::post('/about/update','AboutController@update')->name('about.update');


        Route::get('/terms-&-conditions','TermsController@index')->name('admin.terms');
        Route::post('/terms-&-conditions/update','TermsController@update')->name('terms.update');

        Route::get('/specialty','SpecialtyController@index')->name('admin.specialty');
        Route::post('/specialty/update','SpecialtyController@update')->name('specialty.update');


        Route::get('/policy','PolicyController@index')->name('admin.policy');
        Route::post('/policy/update','PolicyController@update')->name('policy.update');




        

        Route::get('/confirmed/{id}','AdminController@confirmedPost')->name('confirmed');
        Route::get('/rejected/{id}','AdminController@rejectedPost')->name('rejected');
        Route::get('/enabled/{id}','AdminController@enabledPost')->name('enabled');




        Route::get('/location/divisions/manage','DivisionController@index')->name('divisions.manage');
        Route::get('/location/divisions/disabled/{id}','DivisionController@disabled')->name('disabled.division');
        Route::get('/location/divisions/enabled/{id}','DivisionController@enabled')->name('enabled.division');


        Route::post('/location/divisions/add-district','DivisionController@addDist')->name('add.district');

        Route::get('/location/upzilla/manage','UpzillaController@index')->name('upzilla.manage');

        Route::post('/location/upzilla/add','UpzillaController@addZilla')->name('add.zilla');
        Route::get('/finddistrict/{id}','DivisionController@myformAjax');




        


    
    });
});

