<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class BannersController extends Controller
{
    public function index() {
        $banners = Banners::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create() {
        $banners = Banners::all();
        return view('admin.banners.create', compact('banners'));

    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'title_en' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'text_en' => ['nullable', 'string'],
            'icon' => ['nullable', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($valid) {
            $achievement = Banners::create($request->all());
            if ($request->image) {
                $this->storeImage($achievement);
            }
            Alert::success('Успешно', 'Баннер добавлена');
            return redirect()->route('banners.index');
        }
    }

    public function edit($id)
    {
        $banners = Banners::find($id);
        return view('admin.banners.edit', compact('banners'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'title_en' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'text_en' => ['nullable', 'string'],
            'icon' => ['nullable', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        if ($valid) {
            $banners = Banners::find($id);
            $banners->update($request->all());
            if ($request->image) {
                $this->storeImage($banners);
            }

        }
        Alert::success('Успешно', 'Баннер обновлена!');
        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        $banners = Banners::find($id);
        if ($banners->image){
            unlink(public_path() . '/storage/' . $banners->image );
        }

        $banners->delete();
        Alert::success('Успешно', 'Баннер удалена!');
        return redirect()->route('banners.index');
    }

    private function storeImage($banners)
    {
        if (request()->has('image')) {
            $banners->update([
                'image' => \request()->image->store('banners', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $banners->image));
        $image->save();
    }


    /* These codes are not working but should work on it*/
/*    public function index()
    {
        $banners = Banners::first();
        return view('admin.banners.banners', compact('banners'));
    }

    public function update(Request $request)
    {
        if ($banners = Banners::all()->first()) {
            $this->storeImage($banners);
            $banners->update($request->all());
        } else {
            $banners = Banners::create($request->all());
            $this->storeImage($banners);
        }
        Alert::success('Успешно!', 'Баннер обновлена!');
        return redirect()->route('banners.index', compact('banners'));
    }

//    private function storeImage($banners)
//    {
//        if (request()->hasFile('image')) {
//            $imagePath = request()->file('image')->store('banners', 'public');
//            $banners->update(['image' => $imagePath]);
//            $image = Image::make(public_path('storage/' . $banners->image));
//            $image->save();
//        }
//    }

    private function storeImage($banners)
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/banners', $imageName);
            $banners->update(['image' => $imageName]);
            $image->move(public_path('storage/banners'), $imageName);
        }
    }*/

}
