<?php

namespace App\Http\Controllers;

use App\Cozumortak;
use Illuminate\Http\Request;

class CozumortakController extends Controller
{

    public function index()
    {
        $cozumortak = Cozumortak::all();
        return view('admin.cozumortak.index',compact('cozumortak'));

    }

       public function create()
    {
        $cozumortak = Cozumortak::all();
        return view('admin.cozumortak.create',compact('cozumortak'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),array(

            'baslik' => 'required',

        ));

        $cozumortak = new Cozumortak();
        $cozumortak->baslik = request('baslik');
        $cozumortak->resim = request('resim');
        $cozumortak->user_id = 1;



        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));



            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'yuklemeler/cozumortak';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $cozumortak->resim = $dosya_yolu;
            }
        }
        $cozumortak->save();

        if($cozumortak) {
            /*    alert()
                    ->success('Başarılı', 'Slider Başarıyla eklendi')
                    ->showConfirmButton()
                    ->showCancelButton()
                    ->autoClose();*/

            return back();


        }else {

            /* alert()
                 ->error('Hata', 'İşlem Başarısız')
                 ->showConfirmButton()
                 ->showCancelButton()
                 ->autoClose();*/
            return back();


        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cozumortak = Cozumortak::find($id);
        return view('admin.cozumortak.duzenle',compact('cozumortak'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),array(

            'baslik' => 'required',

        ));

        $cozumortak = Cozumortak::find($id);
        $cozumortak->baslik = request('baslik');
        $cozumortak->resim = request('resim');
        $cozumortak->user_id = 1;



        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));



            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'yuklemeler/cozumortak';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $cozumortak->resim = $dosya_yolu;
            }
        }
        $cozumortak->save();

        if($cozumortak) {
            /*    alert()
                    ->success('Başarılı', 'Slider Başarıyla eklendi')
                    ->showConfirmButton()
                    ->showCancelButton()
                    ->autoClose();*/

            return back();


        }else {

            /* alert()
                 ->error('Hata', 'İşlem Başarısız')
                 ->showConfirmButton()
                 ->showCancelButton()
                 ->autoClose();*/
            return back();


        }
    }


    public function destroy($id)
    {
        $cozumortak = Cozumortak::destroy($id);

        if ($cozumortak) {


            return redirect()->route('cozumortak.index');
        } else {


            return back();


        }
    }
}
