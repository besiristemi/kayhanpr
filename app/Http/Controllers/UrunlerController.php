<?php

namespace App\Http\Controllers;

use App\Urunler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrunlerController extends Controller
{

    public function index()
    {
        $urunler = Urunler::all();
        return view('admin.urunler.index',compact('urunler'));
    }


    public function create()
    {
        $urunler = Urunler::all();
        return view('admin.urunler.create',compact('urunler'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),array(

            'urunadi' => 'required',

        ));

        $urunler = new Urunler();
        $urunler->urunadi = request('urunadi');
        $urunler->slug = str_slug(request('urunadi'));
        $urunler->aciklama = request('aciklama');
        $urunler->fiyati = request('fiyati');
        $urunler->eskifiyat = request('eskifiyat');
        $urunler->indirim = request('indirim');
        // $urunler->resimler = request('resimler');
        $urunler->ekleyen = Auth::user()->id;

        if (request()->hasFile('resim1')) {

            $this->validate(request(), array('resim1' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim1 = request()->file('resim1');
            $dosya_adi = time() . '.' . $resim1->extension();

            if ($resim1->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim1->move($hedef_klasor, $dosya_adi);
                $urunler->resim1 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim2')) {

            $this->validate(request(), array('resim2' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim2 = request()->file('resim2');
            $dosya_adi = time() . '.' . $resim2->extension();

            if ($resim2->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim2->move($hedef_klasor, $dosya_adi);
                $urunler->resim2 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim3')) {

            $this->validate(request(), array('resim3' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim3 = request()->file('resim3');
            $dosya_adi = time() . '.' . $resim3->extension();

            if ($resim3->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim3->move($hedef_klasor, $dosya_adi);
                $urunler->resim3 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim4')) {

            $this->validate(request(), array('resim4' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim4 = request()->file('resim4');
            $dosya_adi = time() . '.' . $resim4->extension();

            if ($resim4->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim4->move($hedef_klasor, $dosya_adi);
                $urunler->resim4 = $dosya_yolu;
            }
        }



        if (request()->hasFile('resim5')) {

            $this->validate(request(), array('resim5' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim5 = request()->file('resim5');
            $dosya_adi = time() . '.' . $resim5->extension();

            if ($resim5->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim5->move($hedef_klasor, $dosya_adi);
                $urunler->resim5 = $dosya_yolu;
            }
        }





        $urunler->save();

        if($urunler) {


            return redirect()->route('urunler.index');


        }else {

            return back();


        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $urunler = Urunler::find($id);
        return view('admin.urunler.duzenle',compact('urunler'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),array(

            'urunadi' => 'required',

        ));

        $urunler = Urunler::find($id);
        $urunler->urunadi = request('urunadi');
        $urunler->slug = str_slug(request('urunadi'));
        $urunler->aciklama = request('aciklama');
        $urunler->fiyati = request('fiyati');
        $urunler->eskifiyat = request('eskifiyat');
        $urunler->indirim = request('indirim');
        // $urunler->resimler = request('resimler');
        $urunler->ekleyen = Auth::user()->id;

        if (request()->hasFile('resim1')) {

            $this->validate(request(), array('resim1' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim1 = request()->file('resim1');
            $dosya_adi = time() . '.' . $resim1->extension();

            if ($resim1->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim1->move($hedef_klasor, $dosya_adi);
                $urunler->resim1 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim2')) {

            $this->validate(request(), array('resim2' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim2 = request()->file('resim2');
            $dosya_adi = time() . '.' . $resim2->extension();

            if ($resim2->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim2->move($hedef_klasor, $dosya_adi);
                $urunler->resim2 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim3')) {

            $this->validate(request(), array('resim3' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim3 = request()->file('resim3');
            $dosya_adi = time() . '.' . $resim3->extension();

            if ($resim3->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim3->move($hedef_klasor, $dosya_adi);
                $urunler->resim3 = $dosya_yolu;
            }
        }


        if (request()->hasFile('resim4')) {

            $this->validate(request(), array('resim4' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim4 = request()->file('resim4');
            $dosya_adi = time() . '.' . $resim4->extension();

            if ($resim4->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim4->move($hedef_klasor, $dosya_adi);
                $urunler->resim4 = $dosya_yolu;
            }
        }



        if (request()->hasFile('resim5')) {

            $this->validate(request(), array('resim5' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim5 = request()->file('resim5');
            $dosya_adi = time() . '.' . $resim5->extension();

            if ($resim5->isValid()) {

                $hedef_klasor = 'yuklemeler/urunresimeri';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim5->move($hedef_klasor, $dosya_adi);
                $urunler->resim5 = $dosya_yolu;
            }
        }


        $urunler->save();

        if($urunler) {


            return redirect()->route('urunler.index');


        }else {


            return back();


        }
    }


    public function destroy($id)
    {
        $sil = Urunler::destroy($id);

        if ($sil) {


            return redirect()->route('urunler.index');
        } else {


            return back();


        }
    }
}
