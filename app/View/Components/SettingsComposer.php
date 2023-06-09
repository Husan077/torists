<?php


namespace App\View\Components;

use App\Models\Settings;
use Illuminate\View\View;

class SettingsComposer
{
    public function compose(View $view)
    {
        $settings = Settings::first();
        $view->with('settings', $settings);
    }
}
