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
    Route::get('single_post/{id}', 'FrontsiteController@showSinglePost')->name('single_post');
    Route::get('category/{slug}', 'FrontsiteController@categoryWisePost')->name('category');

});

Route::namespace('Backsite\Auth')->group(function () {
    //User Registration Route...
    Route::post('register', 'AuthController@processRegister');
    Route::get('register', 'AuthController@showRegisterForm')->name('register');

    //User Login Route...
    Route::post('login', 'AuthController@processLogin');
    Route::get('login', 'AuthController@showLoginForm')->name('login');

    //User Logout Route...
    Route::get('logout', 'AuthController@logout')->name('logout');

});



//Backsite - view page...
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
        Route::get('dashboard', 'Backsite\BacksiteController@index')->name('dashboard');

    Route::prefix('category')->name('categories.')->namespace('Backsite\Category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/show/{id}', 'CategoryController@show')->name('view');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::put('/update/{id}', 'CategoryController@update')->name('update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('delete');

//        Route::resource('categories', 'Backsite\Category\CategoryController');

    });




    Route::name('posts.')->prefix('post')->namespace('Backsite\Post')->group(function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/store', 'PostController@store')->name('store');
        Route::get('/show/{id}', 'PostController@show')->name('view');
        Route::get('/edit/{id}', 'PostController@edit')->name('edit');
        Route::put('/update/{id}', 'PostController@update')->name('update');
        Route::delete('/delete/{id}', 'PostController@destroy')->name('delete');

//        Route::resource('posts', 'Backsite\Post\PostController');

    });



    Route::name('sliders.')->prefix('slider')->namespace('Backsite\Slider')->group(function () {
        Route::get('/', 'SliderController@index')->name('index');
        Route::get('/create', 'SliderController@create')->name('create');
        Route::post('/store', 'SliderController@store')->name('store');
        Route::get('/show/{id}', 'SliderController@show')->name('view');
        Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
        Route::put('/update/{id}', 'SliderController@update')->name('update');
        Route::delete('/delete/{id}', 'SliderController@destroy')->name('delete');
    });


});






