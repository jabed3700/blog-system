<?php

use App\Http\Controllers\DashboardController;
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
})->name('website');

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



// Admin panel 

// Route::get('/dashboard','DashboardController@index')->name('dashboard');
// Route::resource('category','CategoryController');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('/dashboard','DashboardController@index')->name('dashboard');


    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    // Route::resource('post', 'PostController');
    // Route::resource('user', 'UserController');
    // Route::get('/profile', 'UserController@profile')->name('user.profile');
    // Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
    
    // setting
    // Route::get('setting', 'SettingController@edit')->name('setting.index');
    // Route::post('setting', 'SettingController@update')->name('setting.update');

    // Contact message
    // Route::get('/contact', 'ContactController@index')->name('contact.index');
    // Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    // Route::delete('/contact/delete/{id}', 'ContactController@destroy')->name('contact.destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
