<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bazaars;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BazaarsController extends Controller
{
    public function index()
    {
        $bazaars = Bazaars::all();
        return view('admin.bazaars.index', compact('bazaars'));
    }

    public function create()
    {
        $bazaars = Bazaars::all();
        return view('admin.bazaars.create', compact('bazaars'));
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
            $bazaars = Bazaars::create($request->all());
            if ($request->image_1) {
                $this->storeImage1($bazaars);
            }
            if ($request->image_2) {
                $this->storeImage2($bazaars);
            }
            return redirect()->route('bazaars.index');
        }
    }

    public function edit($id)
    {
        $bazaars = Bazaars::find($id);
        return view('admin.bazaars.edit', compact('bazaars'));
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
            $bazaars = Bazaars::find($id);
            $bazaars->update($request->all());
            if ($request->image_1) {
                $this->storeImage1($bazaars);
            }
            if ($request->image_2) {
                $this->storeImage2($bazaars);
            }
            return redirect()->route('bazaars.index');
        }
    }

    public function destroy($id)
    {
        $bazaars = Bazaars::find($id);
        if ($bazaars->image_1) {
            unlink(public_path() . '/storage/' . $bazaars->image_1);
        }
        if ($bazaars->image_2) {
            unlink(public_path() . '/storage/' . $bazaars->image_2);
        }
        $bazaars->delete();
        return redirect()->route('bazaars.index');
    }

    private function storeImage1($bazaars)
    {
        if (request()->hasFile('image_1')) {
            $bazaars->update([
                'image_1' => \request()->image_1->store('bazaars', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $bazaars->image_1));
        $image->save();
    }

    private function storeImage2($bazaars)
    {
        if (request()->hasFile('image_2')) {
            $bazaars->update([
                'image_2' => \request()->image_2->store('bazaars', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $bazaars->image_2));
        $image->save();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $name = $request->upload;
            $file = $name->store('uploads/bazaars', 'public');
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
