<?php

namespace App\Http\Controllers;

use App\Sorular;
use Illuminate\Http\Request;

class SorularController extends Controller
{

    public function index()
    {
        $sorular = Sorular::all();
        return view('admin.sss.index',compact('sorular'));
    }


    public function create()
    {
        $sorular = Sorular::all();
        return view('admin.sss.create',compact('sorular'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),array(

            'soru' => 'required',

        ));

        $yorumlar = new Sorular();
        $yorumlar->soru = request('soru');
        $yorumlar->cevap = request('cevap');
        $yorumlar->save();

        if($yorumlar) {
            alert()
                ->success('Başarılı', 'Soru Başarıyla eklendi')
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
        $sorular = Sorular::find($id);
        return view('admin.sss.duzenle',compact('sorular'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),array(

            'soru' => 'required',

        ));

        $yorumlar = Sorular::find($id);
        $yorumlar->soru = request('soru');
        $yorumlar->cevap = request('cevap');
        $yorumlar->save();

        if($yorumlar) {
            alert()
                ->success('Başarılı', 'Soru Başarıyla Güncellendi')
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
        $sorular = Sorular::destroy($id);

        if ($sorular) {
            alert()
                ->success('Başarılı', 'Soru Silindi')
                ->autoClose();

            return back();
        } else {

            alert()
                ->error('Hata', 'İşlem Başarısız')
                ->autoClose();
            return back();


        }
    }
}
