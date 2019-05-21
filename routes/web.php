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

Auth::routes();

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');
Route::get('login/github', 'API\PassportController@redirectToProvider')->name('github_login');
Route::get('login/github/callback', 'API\PassportController@handleProviderCallback');
Route::get('logout', function(){
	Auth::logout();
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('getDetails', 'HomeController@getDetails')->name('details');

Route::get('/send/email', 'HomeController@mail');

Route::get('site/shutdown', function(){
    return Artisan::call('down');
});
Route::get('site/live', function(){
     
}); 
