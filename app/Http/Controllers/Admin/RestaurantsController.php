<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurants;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurants::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        $restaurants = Restaurants::all();
        return view('admin.restaurants.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title_uz'=> ['nullable', 'string'],
            'title_ru'=> ['nullable', 'string'],
            'title_en'=> ['nullable', 'string'],
            'text_uz'=> ['nullable', 'string'],
            'text_ru'=> ['nullable', 'string'],
            'text_en'=> ['nullable', 'string'],
            'location'=> ['nullable', 'string'],
            'ltd'=> ['nullable', 'string'],
            'lng'=> ['nullable', 'string'],
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        if ($valid) {
            $restaurants = Restaurants::create($request->all());
            if ($request->image_1) {
                $this->storeImage1($restaurants);
            }
            if ($request->image_2) {
                $this->storeImage2($restaurants);
            }
            return redirect()->route('restaurants.index');
        }
    }

    public function edit($id)
    {
        $restaurant = Restaurants::find($id);
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_uz'=> ['nullable', 'string'],
            'title_ru'=> ['nullable', 'string'],
            'title_en'=> ['nullable', 'string'],
            'text_uz'=> ['nullable', 'string'],
            'text_ru'=> ['nullable', 'string'],
            'text_en'=> ['nullable', 'string'],
            'location'=> ['nullable', 'string'],
            'ltd'=> ['nullable', 'string'],
            'lng'=> ['nullable', 'string'],
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        if ($valid) {
            $restaurants = Restaurants::find($id);
            $restaurants->update($request->all());
            if ($request->image_1) {
                $this->storeImage1($restaurants);
            }
            if ($request->image_2) {
                $this->storeImage2($restaurants);
            }
            return redirect()->route('restaurants.index');
        }
    }

    public function destroy($id)
    {
        $restaurants = Restaurants::find($id);
        if ($restaurants->image_1) {
            unlink(public_path() . '/storage/' . $restaurants->image_1);
        }
        if ($restaurants->image_2) {
            unlink(public_path() . '/storage/' . $restaurants->image_2);
        }
        $restaurants->delete();
        return redirect()->route('restaurants.index');
    }

    private function storeImage1($restaurants)
    {
        if (request()->hasFile('image_1')) {
            $restaurants->update([
                'image_1' => \request()->image_1->store('restaurants', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $restaurants->image_1));
        $image->save();
    }

    private function storeImage2($restaurants)
    {
        if (request()->hasFile('image_2')) {
            $restaurants->update([
                'image_2' => \request()->image_2->store('restaurants', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $restaurants->image_2));
        $image->save();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $name = $request->upload;
            $file = $name->store('uploads/restaurants', 'public');
            Image::make(public_path('storage/' . $file))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'.$file);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
