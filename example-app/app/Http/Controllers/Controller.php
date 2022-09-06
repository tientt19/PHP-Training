<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_post() {
        $posts = Post::find(1)->get();

        return $posts;
    }

    public function soft_delete_post() {
        $post = Post::find(2)->delete();
        return $post->get();
    }

    public function read_soft_delete_post() {
        $post = Post::withTrashed()->get();
        return $post;
    }

    public function user_pivot() {
        $user = User::find(1);

        foreach ($user->roles as $role) {
            return $role;
        }
    }
}
