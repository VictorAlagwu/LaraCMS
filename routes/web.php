<?php
use App\Post;

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
Route::get('/about', function() {
    return view ('page/about');
});
Route::get('/contact', function() {
    return view ('page/contact');
});

// ELOQUENT


Route::get('/findwhere', function() {
    //
	$post =  Post::findOrFail(2);
    return $post;
});
Route::resource('/posts', 'PostController');
