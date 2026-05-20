<?php

namespace App\Http\Controllers;

use App\Models\Yazi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    private const KATEGORI_SLIDER = '5';

    public function index()
    {
        $sliderler = Yazi::slider()->orderBy('id')->get();

        return view('admin.slider.index', compact('sliderler'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'baslik' => 'required|string|max:255',
            'icerik' => 'nullable|string',
            'resim' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $slider = new Yazi();
        $slider->baslik = $request->baslik;
        $slider->icerik = $request->icerik;
        $slider->slug = Str::slug($request->baslik);
        $slider->kategori = self::KATEGORI_SLIDER;
        $slider->user_id = Auth::id() ?? 1;
        $slider->resim = $this->uploadImage($request->file('resim'));
        $slider->save();

        return redirect()
            ->route('sliderler.index')
            ->with('success', 'Slider başarıyla eklendi.');
    }

    public function edit($id)
    {
        $slider = Yazi::slider()->findOrFail($id);

        return view('admin.slider.duzenle', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'baslik' => 'required|string|max:255',
            'icerik' => 'nullable|string',
            'resim' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $slider = Yazi::slider()->findOrFail($id);
        $slider->baslik = $request->baslik;
        $slider->icerik = $request->icerik;
        $slider->slug = Str::slug($request->baslik);

        if ($request->hasFile('resim')) {
            $slider->resim = $this->uploadImage($request->file('resim'));
        }

        $slider->save();

        return redirect()
            ->route('sliderler.index')
            ->with('success', 'Slider güncellendi.');
    }

    public function destroy($id)
    {
        $slider = Yazi::slider()->findOrFail($id);
        $slider->delete();

        return redirect()
            ->route('sliderler.index')
            ->with('success', 'Slider silindi.');
    }

    private function uploadImage($file): string
    {
        $name = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('yuklemeler/slider'), $name);

        return 'yuklemeler/slider/' . $name;
    }
}
