<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

use function GuzzleHttp\Promise\all;

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

Route::get('/site', function () {
    return view('site');
});

Route::get('/example', function () {
    return 'Power of Route Laravel';
});

Route::get('users/{id}', function ($id) {
    return 'This page route to user who has id '.$id;
});

Route::get('admin/post/home/example', array('as'=>'admin.home', function () {
   $url = route('admin.home');

   return "This is url ". $url;
}));

// Route::get('/post/{id}', [PostsController::class, 'index']);

Route::get('/contact', [PostsController::class, 'contact']);

Route::get('/post/contact/{id}/{name}/{passwords}', [PostsController::class, 'show_contact']);

Route::resource('posts', PostsController::class);

Route::get('/insert', function () {
    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel','Laravel is the best thing that happened in PHP']);
});

Route::get('/read', function () {

    // $result = DB::select('select * from posts where id = ?', [1]);

    $posts = Post::all();

    foreach ($posts as $post) {
        return $posts;
    }

    // return $result;
    // foreach($result as $post) {
    //     return $post->title;
    // }

});

Route::get('/update', function () {

    $update = DB::update('update posts set title = "update title" where id=?',[1]);

    return $update;

});

Route::get('/delete', function () {
    $delete = DB::delete('delete from posts where id=?',[2]);
    return $delete;
});


Route::get('/find', function () {

    $posts = Post::find(4);

    return $posts;

});

Route::get('/findwhere', function () {

    $posts = Post::where('id',4)->orderBy('id','desc')->take(1)->get();

    return $posts;
});

Route::get('/findmore', function () {
    $posts = Post::where('id','<',50)->firstOrFail();
    return $posts;
});

Route::get('/tien', function () {
    return 'This is my site';
});

Route::get('/basic_insert', function (){
   $post = Post::find(1);
   $post->title = 'insert new post';
   $post->content = 'insert new content';
   $post->is_admin = 1;
   $post->save();

   return $post;
});

Route::get('/create', function (){
    Post::create(['title'=>'testing create new title', 'content'=>'testing create new content', 'is_admin'=>'1']);
});

Route::get('/update', function (){
   Post::where('id',5)->where('is_admin',0)->update(['title'=>'New update title','content'=>'new update content','is_admin'=>'1']);
});

Route::get('/delete', function () {
//    Post::destroy(8);
    Post::destroy([10,11]);
//    Post::where('is_admin',0)->delete();
});

Route::get('/soft_delete', function () {
    Post::find(75)->delete();
});

Route::get('/readsoftdelete', function (){
   $post = Post::withTrashed()->get();
//    $post = Post::onlyTrashed()->where('is_admin',1)->get();
   return $post;
});

Route::get('/restore', function () {
  $post = Post::withTrashed()->restore();
  return $post;
});

Route::get('/forcedelete', function () {
   $post = Post::onlyTrashed()->forceDelete();
   return $post;
});

Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post;
});

Route::get('/post/{id}/user', function ($id) {
   return Post::find($id)->user;
});

Route::get('/posts', function () {
    $user = User::find(1);

    foreach ($user->posts as $post) {
        echo $post;
    }
});

Route::get('/get_posts', [Controller::class,'get_post']);
Route::get('posts_soft_delete', [Controller::class, 'soft_delete_post']);
Route::get('read_soft_delete_post', [Controller::class, 'read_soft_delete_post']);
Route::get('user/{id}/role', [PostsController::class, 'get_role_name']);
//Route::get('user/{id}/pivot/role', [RoleController::class, 'get_user_pivot']);
Route::get('user/{id}/pivot/role', 'RoleController@get_user_pivot');
Route::get('user/pivot', [Controller::class, 'user_pivot']);
Route::get('get_country', [CountryController::class, 'get_country']);
Route::get('user_country', [CountryController::class, 'user_country']);

//Route::get('get/photos', [\App\Http\Controllers\PhotoController::class, 'get_photo']);

Route::get('get/photos', function () {
    $post = Post::find(1);

    foreach ($post->photos as $photo) {
        return $photo;
    }

//    return $user;
});


Route::get('photo/{id}/post', [\App\Http\Controllers\PhotoController::class, 'get_photo_post']);

Route::get('tag/get', [\App\Http\Controllers\TagController::class, 'get_tag']);
