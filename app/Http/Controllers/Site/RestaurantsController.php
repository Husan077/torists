<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Restaurants;

class RestaurantsController extends Controller
{
    public function index() {
        $restaurants = Restaurants::all();
        return view('site.restaurants', compact('restaurants'));
    }

    public function show(Restaurants $restaurant) {
        $restaurants = Restaurants::latest()->limit(12)->get();
        return view('site.restaurants_details', compact('restaurant', 'restaurants'));
    }
}
