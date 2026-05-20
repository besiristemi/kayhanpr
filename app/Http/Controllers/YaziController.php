<?php

namespace App\Http\Controllers;

use App\Icerik;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YaziController extends Controller
{

    public function index()
    {
        $yazilar = Icerik::where('kategori', '!=', '5')->orderByDesc('id')->get();
        return view('admin.yazilar.index', compact('yazilar'));
    }

    public function toplam(){

        $toplams = Icerik::count();
        return view('admin.index',compact('toplams'));

    }



    public function create()
    {
        $kategoriler = Kategori::where('id', '!=', 5)->orderBy('id')->get();
        return view('admin.yazilar.create', compact('kategoriler'));
    }


    public function store(Request $request)
    {

        $this->validate(request(), array(

            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',

        ));


        $yazi = new Icerik();
        $yazi->baslik = request('baslik');
        $yazi->slug = Str::slug(request('baslik'));
        $yazi->icerik = request('icerik');
        $yazi->user_id = Auth::user()->id;
        $yazi->resimler = request('resimler');
        $kats = $request->input('kategori');
		$yazi->kategori = implode(',', $kats);


        if (request()->hasFile('resim')) {
            $tip = $_FILES['resim']['type'];
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name = time() . $_FILES['resim']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $yazi->resim = $uploaddir;
        }
        $yazi->save();

        if($yazi) {


            return redirect()->route('yazilar.index')->with('success', 'İçerik kaydedildi.');
        }

        return back()->with('error', 'İçerik kaydedilemedi.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $kategoriler = Kategori::where('id', '!=', 5)->orderBy('id')->get();
        $yazi = Icerik::find($id);
        return view('admin.yazilar.duzenle',compact('yazi','kategoriler'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),array(

            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',


        ));

        $yazi = Icerik::find($id);
        $kullanici = $yazi->user_id;
        $yazi->baslik = request('baslik');
        $yazi->slug = Str::slug(request('baslik'));
        $yazi->icerik = request('icerik');
        $yazi->user_id = $kullanici;
        /*$yazi->resimler = request('resimler');*/
		$kats = $request->input('kategori');
		$yazi->kategori = implode(',', $kats);


        if (request()->hasFile('resim')) {
            $tip = $_FILES['resim']['type'];
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name = time() . $_FILES['resim']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $yazi->resim = $uploaddir;
        }
        $yazi->save();

        if($yazi) {


            return redirect()->route('yazilar.index')->with('success', 'İçerik güncellendi.');
        }

        return back()->with('error', 'Güncelleme başarısız.');
    }


    public function destroy($id)
    {

        $sil = Icerik::destroy($id);

        if ($sil) {


            return redirect()->route('yazilar.index');
        } else {


            return back();


        }
    }
}
