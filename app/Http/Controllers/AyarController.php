<?php

namespace App\Http\Controllers;

use App\Ayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AyarController extends Controller
{

    public function index()
    {
        $ayarlar = Ayar::find(1);
        return view('admin.ayarlar.site_ayar', compact('ayarlar'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'aciklama' => 'required',
        ));

        $ayar = Ayar::find(1);
        $ayar->baslik = request('baslik');
        $ayar->aciklama = request('aciklama');
        $ayar->etiket = request('etiket');
        $ayar->email = request('email');
        $ayar->adres = request('adres');
        $ayar->telefon = request('telefon');
        $ayar->telefon2 = request('telefon2');
        $ayar->telefon3 = request('telefon3');
        $ayar->fax = request('fax');
        $ayar->facebook = request('facebook');
        $ayar->twitter = request('twitter');
        $ayar->instagram = request('instagram');
        $ayar->youtube = request('youtube');

        if (request()->hasFile('logo')) {

            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));



            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('logo');
            $dosya_adi = 'logo' . '-' . time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = public_path('site_resimleri');
                if (! is_dir($hedef_klasor)) {
                    mkdir($hedef_klasor, 0755, true);
                }
                $resim->move($hedef_klasor, $dosya_adi);
                $ayar->logo = 'site_resimleri/' . $dosya_adi;
            }
        }
        $ayar->save();

        if($ayar) {


            return back();


        }else {

            return back();


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
