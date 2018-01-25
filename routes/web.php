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

Route::get('/', 'PostsController@index');
Route::resource('posts','PostsController');

Route::get('blog/{slug}',['as' => 'post.single', 'uses' => 'PostsController@getSingle'])->where('slug', '[A-Za-z0-9-_]+');


Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');

Auth::routes();

// Auth Login Routes
Route::get('auth/login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);

Route::post('auth/login','Auth\LoginController@login');

Route::get('auth/logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);


// Auth Registration Routes
Route::get('auth/register', ['uses' => 'Auth\RegisterController@showRegistrationForm', 'as' => 'register']);

Route::post('auth/register', 'Auth\RegisterController@register');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/blog','Admin\PostsController');
    // Route::get('/blog', 'Admin\PostsController@index')->name('admin.blog');
    // Route::get('/blog/edit', 'Admin\PostsController@index')->name('admin.blog');

 });

// Route::get('/search', function (Request $request) {
//     return App\Post::search($request->search)->get();
// });
// Route::get('/search/{query}', 'PostsController@searchPost');

Route::get('search', ['uses' => 'PostsController@searchPost', 'as' => 'search']);
Route::get('/home', 'HomeController@index')->name('home');
