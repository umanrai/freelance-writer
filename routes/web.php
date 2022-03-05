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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.home');

Auth::routes();

Route::group([ 'middleware' => [ 'auth', ] ], function () {

//Route::get('/user', 'Admin\UserController@index')->name('user.index'); // list
//Route::get('/user/create', 'Admin\UserController@create')->name('user.create'); // form
//Route::post('/user/store', 'Admin\UserController@store')->name('user.store'); // store data
//Route::get('/user/{user}/edit', 'Admin\UserController@edit')->name('user.edit'); // edit data
//Route::post('/user/{user}/update', 'Admin\UserController@update')->name('user.update'); // Update data

    Route::resources([
        'user' => 'Admin\UserController',
        'category' => 'Admin\CategoryController',
        'tag' => 'Admin\TagController',
        'article' => 'Admin\ArticleController',
        'portfolio' => 'Admin\PortfolioController',
        'faq' => 'Admin\FaqController',
        'testimonial' => 'Admin\TestimonialController',
        'service' => 'Admin\ServiceController',
        'feature' => 'Admin\FeatureController',
    ]);

    Route::get('setting', 'Admin\SettingController@edit')->name('setting.edit');
    Route::post('setting', 'Admin\SettingController@update')->name('setting.update');

});

//tuts?admin=uman
Route::get('tuts', function () {
//    Facade
//   $cache = new \App\Misc\Cache(); Everytime kunae class instantiate garnu napros

   return CacheFacade::setting();
})->middleware('test-m'); // Middleware
