<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function get_tag() {
        $posts = Post::find(2);

        foreach ($posts->tags as $tag) {
            return $tag->name;
        }
    }
}
