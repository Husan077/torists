<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievements;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementsController extends Controller
{
    public function index() {
        $achievements = Achievements::all();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create() {
        $achievements = Achievements::all();
        return view('admin.achievements.create', compact('achievements'));

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
            $achievement = Achievements::create($request->all());
            if ($request->image) {
                $this->storeImage($achievement);
            }
            Alert::success('Успешно', 'Достижения добавлена');
            return redirect()->route('achievements.index');
        }
    }

    public function edit($id)
    {
        $achievements = Achievements::find($id);
        return view('admin.achievements.edit', compact('achievements'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($valid) {
            $achievements = Achievements::find($id);
            $achievements->update($request->all());
            if ($request->image) {
                $this->storeImage($achievements);
            }

        }
        Alert::success('Успешно', 'Достижения обновлена!');
        return redirect()->route('achievements.index');
    }

    public function destroy($id)
    {
        $achievements = Achievements::find($id);
        if ($achievements->image){
            unlink(public_path() . '/storage/' . $achievements->image );
        }

        $achievements->delete();
        Alert::success('Успешно', 'Достижения удалена!');
        return redirect()->route('achievements.index');
    }

    private function storeImage($achievements)
    {
        if (request()->has('image')) {
            $achievements->update([
                'image' => \request()->image->store('achievements', 'public'),
            ]);
        }
//        $image = Image::make(public_path('storage/' . $achievements->image));
        $image = Image::make(public_path('storage/' . $achievements->image))->resize(30,30);
        $image->save();
    }
}
