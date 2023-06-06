<?php

namespace App\View\Components;
use Illuminate\View\View;
use App\Models\Tours;

class HotelsCompsoer
{
    public function compose(View $view)
    {
        $hotels = Tours::all();
        $view->with('hotels', $hotels);
    }
}
