<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bazaars;

class BazaarsController extends Controller
{
    public function index() {
        $bazaars = Bazaars::all();
        return view('site.bazaars', compact('bazaars'));
    }

//    public function show(Bazaars $slug) {
//        return view('site.bazaars_details', compact('slug'));
//    }

    public function show(Bazaars $bazaar) {
        $bazaars = Bazaars::latest()->limit(12)->get();
        return view('site.bazaars_details', compact('bazaar', 'bazaars'));
    }
}
