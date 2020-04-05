<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');

})->name('welcome');

Route::get('/home', 'SiteController@home')->name('home');

Route::get('this/is/about/page', [
    "uses" => "SiteController@about",
    "as" => 'about',

]);
*/


//Frontsite - Lara Blog site view...
Route::name('blog.')->namespace('Frontsite')->group(function(){
    Route::get('/', 'FrontsiteController@index')->name('index');
    Route::get('single_post', 'FrontsiteController@showSinglePost')->name('single_post');

});

//User Registration Route...
Route::post('register', 'AuthController@processRegister');
Route::get('register', 'AuthController@showRegisterForm')->name('register');

//User Login Route...
Route::post('login', 'AuthController@processLogin');
Route::get('login', 'AuthController@showLoginForm')->name('login');

//User Logout Route...
Route::get('logout', 'AuthController@logout')->name('logout');


//Backsite - view page...
Route::group(['middleware' => 'auth'], function(){
        Route::get('/dashboard', 'Backsite\BacksiteController@index')->name('dashboard');

    Route::prefix('category')->name('categories.')->namespace('Backsite\Category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/show/{id}', 'CategoryController@show')->name('view');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('delete');


    });

    Route::prefix('post')->name('posts.')->namespace('Backsite\Post')->group(function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/store', 'PostController@store')->name('store');
        Route::get('/show/{id}', 'PostController@show')->name('view');
        Route::get('/edit/{id}', 'PostController@edit')->name('edit');
        Route::post('/update/{id}', 'PostController@update')->name('update');
        Route::delete('/delete/{id}', 'PostController@destroy')->name('delete');


    });


});





/*
//User Registration-Login Route...

    Route::post('register', 'AuthController@processRegister');
    Route::get('register', 'AuthController@showRegisterForm')->name('blog.register');

    Route::post('login', 'AuthController@processLogin');
    Route::get('login', 'AuthController@showLoginForm')->name('blog.login');

    Route::get('logout', 'AuthController@logout')->name('blog.logout');


//Backsite - view page...
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'Backsite\BacksiteController@index')->name('home');


        Route::get('/', 'Backsite\Category\CategoryController@index')->name('index');



});

*/


