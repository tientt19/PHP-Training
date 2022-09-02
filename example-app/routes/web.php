<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
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
        return $post->title;
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
