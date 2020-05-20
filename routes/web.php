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



Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@postLogin')->name('admin.post.login');

    Route::prefix('/')->middleware('admin')->group(function () {
        Route::get('/', 'HomeController@home')->name('admin.home');

        Route::resource('category', 'CategoryController');

        Route::resource('post', 'PostController');
        Route::put('post/status/{id}', 'PostController@updateStatus')->name('post.update.status');


        Route::resource('slider','SliderController');
        Route::put('slider/status/{id}', 'SliderController@updateStatus')->name('slider.update.status');

        Route::resource('social','SocialController');

        Route::resource('media','MediaController');
        Route::post('media/add','MediaController@addFolder')->name('media.add');
        Route::post('media/upload/file','MediaController@uploadFile')->name('media.upload');

        Route::post('setting/store','SettingController@store')->name('setting.store');
        Route::get('setting/general','SettingController@getGeneral')->name('setting.get.general');
        Route::get('setting/permalink','SettingController@getPermalink')->name('setting.get.permalink');
        Route::get('setting/custom-fields','SettingController@getCustomFields')->name('setting.get.fields');
        Route::post('setting/custom-fields','SettingController@postCustomFields')->name('setting.post.fields');
        Route::get('setting/identify','SettingController@getSiteIdentify')->name('setting.get.identify');

        Route::get('custom','SettingController@custom')->name('custom.get');

        Route::get('requestlogs','RequestLogController@index')->name('requestlogs.index');
        Route::delete('requestlogs/{id}','RequestLogController@destroy')->name('requestlogs.destroy');
        Route::delete('requestlogs/delete/all','RequestLogController@destroyAll')->name('requestlogs.destroyAll');

        Route::resource('product','ProductController');
        Route::put('product/status/{id}', 'ProductController@updateStatus')->name('product.update.status');

        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    });
});

Route::prefix('/')->namespace('Website')->group(function () {
    Route::get('/', 'WebsiteController@home')->name('home');
    Route::get('/shop', 'WebsiteController@shop')->name('shop');
});
