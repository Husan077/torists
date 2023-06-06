<?php

namespace App\View\Components;
use App\Models\Restaurants;
use Illuminate\View\View;

class RestaurantsComposer
{
    public function compose(View $view)
    {
        $restaurants = Restaurants::all();
        $view->with('restaurants', $restaurants);
    }
}
