<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attractions;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AttractionsController extends Controller
{
    public function index()
    {
        $attractions = Attractions::all();
        return view('admin.attractions.index', compact('attractions'));
    }

    public function create()
    {
        $attractions = Attractions::all();
        return view('admin.attractions.create', compact('attractions'));
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
            $attractions = Attractions::create($request->all());
            if ($request->image_1) {
                $this->storeImage1($attractions);
            }
            if ($request->image_2) {
                $this->storeImage2($attractions);
            }
            Alert::success('Успешно', 'Достопримечательность добавлена');
            return redirect()->route('attractions.index');
        }
    }

    public function edit($id)
    {
        $attraction = Attractions::find($id);
        return view('admin.attractions.edit', compact('attraction'));
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
            $attractions = Attractions::find($id);
            $attractions->update($request->all());
            if ($request->image_1) {
                $this->storeImage1($attractions);
            }
            if ($request->image_2) {
                $this->storeImage2($attractions);
            }
            Alert::success('Успешно', 'Достопримечательность обновлена');
            return redirect()->route('attractions.index');
        }
    }

    public function destroy($id)
    {
        $attractions = Attractions::find($id);
        if ($attractions->image_1) {
            unlink(public_path() . '/storage/' . $attractions->image_1);
        }
        if ($attractions->image_2) {
            unlink(public_path() . '/storage/' . $attractions->image_2);
        }
        $attractions->delete();
        Alert::success('Успешно', 'Достопримечательность удалена');
        return redirect()->route('attractions.index');
    }

    private function storeImage1($attractions)
    {
        if (request()->hasFile('image_1')) {
            $attractions->update([
                'image_1' => \request()->image_1->store('attractions', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $attractions->image_1));
        $image->save();
    }

    private function storeImage2($attractions)
    {
        if (request()->hasFile('image_2')) {
            $attractions->update([
                'image_2' => \request()->image_2->store('attractions', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $attractions->image_2));
        $image->save();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $name = $request->upload;
            $file = $name->store('uploads/attractions', 'public');
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
