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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/getRequest', function(){
    if(Request::ajax()){
        return 'getRequest has loaded completely.';
    }
});

/*
Route::post('/register', function(){
    if(Request::ajax()){
        return var_dump(Response::json(Request::all()));
    }

});
*/