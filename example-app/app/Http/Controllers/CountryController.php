<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function get_country() {
        return Country::all();
    }

    public function user_country() {
        $country = Country::find(1);

        foreach ($country->posts as $post) {
            return $post;
        }
    }
}
