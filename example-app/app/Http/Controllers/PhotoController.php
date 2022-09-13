<?php

namespace App\Http\Controllers;

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
}
