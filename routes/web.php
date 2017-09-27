<?php
use App\Post;
use App\User;
use App\Country;

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
    Post::create(['title'=>'New Content for Post', 'content' => 'Lorem ipsum dolor sit amet,t dolore magna aliqua. Ut enim ad minim veniam,qlamco laboris nisi ut aliquip ex ea commodo','user_id'=>'1']);
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

// One to One relationship
Route::get('user/{id}/post', function($id) {

   return User::find($id)->post;
});

Route::get('post/{id}/user', function($id) {
    //
    return Post::find($id)->user->name;
});

//One to Many Relationship

Route::get('user/{id}', function($id) {
    //
    $posts = User::find($id);

    foreach ($posts->posts as $post) {
        echo $post ."</br>";
    }
});

Route::get('user/{id}/role', function($id) {
    //
    $users = User::find($id)->roles;
    foreach($users as $role){
        return $role;
    }
    
});

Route::get('user/pivot/{id}', function($id) {
    //
    $user = User::find($id);

    foreach ($user ->roles as $role) {
        echo  $role->pivot;
    }
});

Route::get('user/country/{id}', function($id) {
    //
    $country =Country::find($id);
    foreach ($country->posts as $post) {
        echo $post.'</br>';

    }
});