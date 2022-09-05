<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function get_user_pivot($id) {
        $user = User::find($id);

        foreach ($user->roles as $role) {
            echo $role->pivot;
        }
    }
}
