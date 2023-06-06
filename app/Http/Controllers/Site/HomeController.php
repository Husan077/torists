<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Achievements;
use App\Models\Attractions;
use App\Models\Banners;
use App\Models\Bazaars;
use App\Models\Restaurants;
use App\Models\Settings;
use App\Models\Tours;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    public function index() {
        $banners = Banners::all();
        $achievements= Achievements::all();
        $settings = Settings::all();
        $hotels = Tours::all();
        $attractions = Attractions::all();
        $bazaars = Bazaars::all();
        $restaurants = Restaurants::all();
        return view('site.index', compact('bazaars', 'banners', 'achievements', 'settings', 'hotels', 'attractions', 'restaurants'));
    }

    public function sendToTg(Request $request) {
        $this->validate($request, ['phone' => 'required|min:8']);

        Telegram::sendMessage([
            'chat_id' => env('-1001740596367', '-1001740596367'),
            'parse_mode' => 'HTML',
            'text' => "<b>Новая обращения!</b>\n"
                . "\n"
                . "<b>Имя клиента</b>: $request->name\n"
                . "<b>Телефон номер</b>: $request->phone\n"
                . "<b>Сообщение</b>: $request->message\n"
        ]);
        Alert::success('Обращение принято', 'Скоро я свяжусь с вами');
        return redirect()->back();
    }
}
