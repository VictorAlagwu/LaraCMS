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


Route::get('/findall', function() {
    //
	$post =  Post::all();
    return $post;
});
Route::get('/create', function() {
    //
    Post::create(['title'=>'Data with ID 5', 'content' => 'Lorem ipsum dolor sit amet,t dolore magna aliqua. Ut enim ad minim veniam,qlamco laboris nisi ut aliquip ex ea commodo']);
});

Route::get('/update', function() {

   $new_data = Post::where('id',6)->where('is_admin', 0)->update(['title' => 'Data is being updated', 'content' => 'New Data being tested']);
   
});

Route::get('/delete', function() {
    //
    Post::where('id',6)->delete(6);
});

Route::get('/softdelete', function() {
    Post::find(4)->delete();

});

Route::get('/restoredeleted', function() {
    //
    $post = Post::onlyTrashed()->get();

    return $post;
});
Route::get('/restore', function() {
    //
    $post = Post::withTrashed()->where('id',5)->restore();
    return $post;
});

Route::get('/forcedelete', function() {
    //
    $post =Post::withTrashed()->where('id', 4)->forcedelete();
});
Route::resource('/posts', 'PostController');
