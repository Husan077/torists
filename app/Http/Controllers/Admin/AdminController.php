<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievements;
use App\Models\Attractions;
use App\Models\Banners;
use App\Models\Bazaars;
use App\Models\Restaurants;
use App\Models\Settings;
use App\Models\Tours;

class AdminController extends Controller
{
    public function index()
    {
        $banners = count(Banners::all());
        $achievements = count(Achievements::all());
        $setting = count(Settings::all());
        $tours = count(Tours::all());
        $attractions = count(Attractions::all());
        $bazaar = count(Bazaars::all());
        $restaurant = count(Restaurants::all());
        return view('admin.index', compact('banners', 'achievements', 'setting', 'tours', 'attractions', 'bazaar', 'restaurant'));
    }
}
