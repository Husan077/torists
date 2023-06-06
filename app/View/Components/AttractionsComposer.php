<?php

namespace App\View\Components;
use Illuminate\View\View;
use App\Models\Attractions;

class AttractionsComposer
{
    public function compose(View $view)
    {
        $attractions = Attractions::all();
        $view->with('attractions', $attractions);
    }
}
