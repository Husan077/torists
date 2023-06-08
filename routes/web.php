<?php

use App\Http\Controllers\Admin\AchievementsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttractionsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BazaarsController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\HotelsController as SiteHotelsController;
use App\Http\Controllers\Site\AttractionsController as SiteAttractionsController;
use App\Http\Controllers\Site\BazaarsController as SiteBazaarsController;
use App\Http\Controllers\Site\RestaurantsController as SiteRestaurantsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/hotels', [SiteHotelsController::class, 'index'])->name('hotels');
    Route::get('/hotels/{hotel}', [SiteHotelsController::class, 'show'])->name('hotels_details');
    Route::get('/attractions', [SiteAttractionsController::class, 'index'])->name('attractions');
    Route::get('/attractions/{attraction}', [SiteAttractionsController::class, 'show'])->name('attractions_details');
    Route::get('/bazaars', [SiteBazaarsController::class, 'index'])->name('bazaars');
    Route::get('/bazaars/{bazaar}', [SiteBazaarsController::class, 'show'])->name('bazaars_details');
    Route::get('/restaurants', [SiteRestaurantsController::class, 'index'])->name('restaurants');
    Route::get('/restaurants/{restaurant}', [SiteRestaurantsController::class, 'show'])->name('restaurants_details');

    require __DIR__.'/auth.php';
});

Route::post('/contact/sendToTg', [HomeController::class, 'sendToTg'])->name('contact.send');

Route::get('/logout', function () {
    return view('site.index');
})->name('logout');


//Admin

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resources([
        'admin/banners' => BannersController::class,
        'admin/achievements' => AchievementsController::class,
        'admin/settings' => SettingsController::class,
        'admin/tours' => ToursController::class,
        'admin/attractions' => AttractionsController::class,
        'admin/bazaars' => BazaarsController::class,
        'admin/restaurants' => RestaurantsController::class,
    ]);
    Route::post('/admin/hotels/upload', [ToursController::class, 'upload'])->name('admin.hotels.upload');
    Route::post('/admin/attractions/upload', [AttractionsController::class, 'upload'])->name('admin.attractions.upload');
    Route::post('/admin/bazaars/upload', [BazaarsController::class, 'upload'])->name('admin.bazaars.upload');
    Route::post('/admin/restaurants/upload', [RestaurantsController::class, 'upload'])->name('admin.restaurants.upload');
});

// Admin Laravel

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
