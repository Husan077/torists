<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    public function index()
    {
        if ($setting = Settings::all()->first()) {
            return view('admin.settings.index', compact('setting'));
        } else {
            return view('admin.settings.index');
        }
    }

    public function update(Request $request, $id)
    {
        if ($site = Settings::all()->first()) {
            $site->update($request->all());
        } else {
            Settings::create($request->all());
        }
        Alert::success('Успешно!', 'Настройки обновлены!');
        return redirect()->route('settings.index');
    }
}
