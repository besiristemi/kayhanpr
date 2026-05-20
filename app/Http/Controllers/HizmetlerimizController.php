<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Icerik;
use App\Hizmetlerimiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HizmetlerimizController extends Controller
{

    public function index()
    {
        $galeriler = Hizmetlerimiz::all();
        return view('yonetim.galeri.index',compact('galeriler'));
    }


    public function create()
    {
        $galeriler = Hizmetlerimiz::all();
        return view('yonetim.galeri.create',compact('galeriler'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),array(

            'icerik' => 'required',
            'baslik' => 'required'

        ));

        $galeri = new Icerik();
        $galeri->baslik = request('baslik');
        $galeri->kategori = request('kategori');
        $galeri->slug = str_slug(request('baslik'));
        $galeri->icerik = request('icerik');
        $galeri->resimler = request('resimler');
        $galeri->user_id = Auth::user()->id;

        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:9048'));



            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'yuklemeler/fotogaleri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $galeri->resim = $dosya_yolu;
            }
        }
        $galeri->save();

        if($galeri) {
            alert()
                ->success('Başarılı', 'İçerik Başarıyla eklendi')
                ->autoClose();

            return back();


        }else {

            alert()
                ->error('Hata', 'İşlem Başarısız')
                ->autoClose();
            return back();


        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $galeriler = Hizmetlerimiz::find($id);
        return view('yonetim.galeri.duzenle',compact('galeriler'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),array(

            'aciklama' => 'required',

        ));

        $galeri = Galeri::find($id);
        $galeri->urunadi = request('urunadi');
        $galeri->slug = str_slug(request('urunadi'));
        $galeri->aciklama = request('aciklama');
        $galeri->fiyat = request('fiyat');
        $galeri->resimler = request('resimler');
        $galeri->resim = request('resim');


        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));



            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'yuklemeler/fotogaleri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $galeri->resim = $dosya_yolu;
            }
        }
        $galeri->save();

        if($galeri) {
            alert()
                ->success('Başarılı', 'Slider Başarıyla Güncellendi')
                ->autoClose();

            return back();


        }else {

            alert()
                ->error('Hata', 'İşlem Başarısız')
                ->autoClose();
            return back();


        }
    }


    public function destroy($id)
    {
        $galeri = Hizmetlerimiz::destroy($id);

        if ($galeri) {
            alert()
                ->success('Başarılı', 'Slider Silindi')
                ->autoClose();

            return redirect()->route('galeriler.index');
        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')
                ->autoClose();
            return back();


        }
    }
}
