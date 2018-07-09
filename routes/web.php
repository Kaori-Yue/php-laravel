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


Route::get('/demoone', 'DemoController@index');
Route::post('/demotwo', 'DemoController@demotwo');
//Route::match (['get', 'post'],'/demothree','DemoController@demothree');
//Route::any('/demofour','DemoController@demofour');
Route::any('demofive/{age?}', function ($age=1) {
    //return 'ID: '.$id;
    return ($age==3)? 'age match' : 'AGE :'.$age;
});
Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], 'demothree', 'DemoController@demothree');
    Route::any('demofour', 'DemoController@demofour');
});
Route::resource('photos', 'PhotoController');
//Route::resource('admin/user', 'Admin\UsersController');

Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@authenticate');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('user', 'Admin\UsersController');
    Route::get('demothree','DemoController@demothree');
});






