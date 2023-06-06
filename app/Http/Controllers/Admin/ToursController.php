<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tours;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ToursController extends Controller
{
    public function index()
    {
        $hotels = Tours::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $hotels = Tours::all();
        return view('admin.hotels.create', compact('hotels'));
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
            'price'=> ['nullable', 'string'],
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        if ($valid) {
            $hotels = Tours::create($request->all());
            if ($request->image_1) {
                $this->storeImage1($hotels);
            }
            if ($request->image_2) {
                $this->storeImage2($hotels);
            }
            return redirect()->route('tours.index');
        }
    }

    public function edit($id)
    {
        $hotels = Tours::find($id);
        return view('admin.hotels.edit', compact('hotels'));
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
            'price'=> ['nullable', 'string'],
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        if ($valid) {
            $hotels = Tours::find($id);
            $hotels->update($request->all());
            if ($request->image_1) {
                $this->storeImage1($hotels);
            }
            if ($request->image_2) {
                $this->storeImage2($hotels);
            }
            return redirect()->route('tours.index');
        }
    }

    public function destroy($id)
    {
        $hotels = Tours::find($id);
        if ($hotels->image_1) {
            unlink(public_path() . '/storage/' . $hotels->image_1);
        }
        if ($hotels->image_2) {
            unlink(public_path() . '/storage/' . $hotels->image_2);
        }
        $hotels->delete();
        return redirect()->route('tours.index');
    }

    private function storeImage1($hotels)
    {
        if (request()->hasFile('image_1')) {
            $hotels->update([
                'image_1' => \request()->image_1->store('hotels', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $hotels->image_1));
        $image->save();
    }

    private function storeImage2($hotels)
    {
        if (request()->hasFile('image_2')) {
            $hotels->update([
                'image_2' => \request()->image_2->store('tours', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $hotels->image_2));
        $image->save();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $name = $request->upload;
            $file = $name->store('uploads/hotels', 'public');
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
