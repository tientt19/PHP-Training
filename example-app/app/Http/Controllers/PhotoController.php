<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\User;

class PhotoController extends Controller
{
    public function get_photo() {
        $user = User::find(1);
        foreach ($user->photos() as $photo){
            return $photo;
        }
    }

    public function get_photo_post($id) {
        $photo = Photo::findOrFail($id);

        return $photo;
    }
}
