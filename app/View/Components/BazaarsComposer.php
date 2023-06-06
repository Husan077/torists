<?php

namespace App\View\Components;

use App\Models\Bazaars;
use Illuminate\View\View;

class BazaarsComposer
{
    public function compose(View $view)
    {
        $bazaars = Bazaars::all();
        $view->with('bazaars', $bazaars);
    }
}
