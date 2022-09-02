<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::resource('posts', PostsController::class);
