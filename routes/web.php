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

// Route::get('/', function () {
//     return view('welcome');
// });


// front end

Route::get('/',function(){
    return view('front.home');
});

Route::get('/contact',function(){
    return view('front.contact');
});

Route::get('/single-blog',function(){
    return view('front.single');
});

Route::get('/category',function(){
    return view('front.category');
});

Route::get('/about',function(){
    return view('front.about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
