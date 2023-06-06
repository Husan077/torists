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
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $banners = count(Banners::all());
        $achievements= count(Achievements::all());
        $settings = count(Settings::all());
        $tours = count(Tours::all());
        $attractions = count(Attractions::all());
        $bazaars = count(Bazaars::all());
        $restaurants = count(Restaurants::all());
        return view('admin.index', compact('banners', 'achievements', 'settings', 'tours', 'attractions', 'bazaars', 'restaurants'));
    }
}
