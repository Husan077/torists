<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Tours;

class HotelsController extends Controller
{
    public function index() {
        $hotels = Tours::all();
        return view('site.hotels', compact('hotels'));
    }

    public function show(Tours $hotel) {
        $hotels = Tours::latest()->limit(12)->get();
        return view('site.hotel_details', compact('hotel', 'hotels'));
    }
}
