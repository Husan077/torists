<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attractions;

class AttractionsController extends Controller
{
    public function index() {
        $attractions = Attractions::all();
        return view('site.attractions', compact('attractions'));
    }

//    public function show(Attractions $slug) {
//        return view('site.attractions_details', compact('slug'));
//    }

    public function show(Attractions $attraction) {
        $attractions = Attractions::latest()->limit(12)->get();
        return view('site.attractions_details', compact('attraction', 'attractions'));
    }
}
