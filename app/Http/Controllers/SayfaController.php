<?php

namespace App\Http\Controllers;

use App\Hakkimizda;
use App\Sayfa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SayfaController extends Controller
{

    public function index()
    {
        $sayfalar = Sayfa::all();
        return view('admin.sayfalar.index',compact('sayfalar'));
    }


    public function create()
    {
        $sayfalar = Sayfa::Where('ust_id','=',null)->get();
        return view('admin.sayfalar.create',compact('sayfalar'));
    }


    public function hakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.hakkimizda.create',compact('hakkimizda'));
    }




    public function hakkimizdagir(Request $request, $id)
    {
        $this->validate(request(),array(
            'aciklama'=>'required',
        ));

        $sayfa = Hakkimizda::find(1);
        $sayfa->aciklama = request('aciklama');
        $sayfa->misyon = request('misyon');
        $sayfa->vizyon = request('vizyon');
        $sayfa->kalite = request('kalite');
        $sayfa->sosyal = request('sosyal');


        if (request()->hasFile('resim1')) {
            $tip = $_FILES['resim1']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim1']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim1']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim1 = $uploaddir;
        }

        if (request()->hasFile('resim2')) {
            $tip = $_FILES['resim2']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim2']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim2']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim2 = $uploaddir;
        }

        if (request()->hasFile('resim3')) {
            $tip = $_FILES['resim3']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim3']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim3']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim3 = $uploaddir;
        }


        if (request()->hasFile('resim4')) {
            $tip = $_FILES['resim4']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim4']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim4']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim4 = $uploaddir;
        }

        if (request()->hasFile('resim5')) {
            $tip = $_FILES['resim5']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim5']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim5']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim5 = $uploaddir;
        }

        if (request()->hasFile('resim6')) {
            $tip = $_FILES['resim6']['type']; // yüklenecek dosyanın tipini alıyoruz
            (isset($tip)) ? 'Tip = ' . $tip : '';

            if ($_FILES) {
                if ($tip == "image/x-png" || $tip == "image/png" || $tip == "image/pjpeg" || $tip == "image/gif" || $tip == "image/jpeg" || $tip == "image/jpg") {
                    $dosya_name =time() . $_FILES['resim6']['name'];
                    $uploaddir = "yuklemeler/haberler/" . $dosya_name;

                    if (move_uploaded_file($_FILES['resim6']['tmp_name'], $uploaddir)) {

                    } else {

                    }
                }
            }
            $sayfa->resim6 = $uploaddir;
        }


        $sayfa->save();


        if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Eklendi')

                ->autoClose(2000);
            return back();



        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')

                ->autoClose(2000);
            return back();


        }
    }


    public function store(Request $request)
    {
        $this->validate(request(),array(
            'baslik'=>'required',
            'icerik'=>'required',

        ));

        $sayfa =new Sayfa();
        $sayfa->baslik = request('baslik');
        $sayfa->icerik = request('icerik');
        $sayfa->ust_id = request('ust_id');
        $sayfa->slug = str_slug(request('baslik'));
        $sayfa->user_id = Auth::user()->id;
        $sayfa->save();


        if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Eklendi')

                ->autoClose(2000);
            return back();



        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')

                ->autoClose(2000);
            return back();


        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sayfa = Sayfa::find($id);
        $tumsayfalar = Sayfa::all();
        return view('admin.sayfalar.duzenle',compact('sayfa','tumsayfalar'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),array(
            'baslik'=>'required',
            'icerik'=>'required',

        ));

        $sayfa = Sayfa::find($id);
        $sayfa->baslik = request('baslik');
        $sayfa->icerik = request('icerik');
        $sayfa->ust_id = request('ust_id');
        $sayfa->slug = str_slug(request('baslik'));
        $sayfa->user_id = Auth::user()->id;
        $sayfa->save();

        if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Güncellendi')

                ->autoClose(2000);

            return back();



        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')

                ->autoClose(2000);
            return back();


        }
    }


    public function destroy($id)
    {
        $sil = Sayfa::destroy($id);

        if ($sil) {

            alert()
                ->success('Başarılı', 'Sayfa Silindi')

                ->autoClose(2000);

            return back();



        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')

                ->autoClose(2000);
            return back();


        }
    }
}
