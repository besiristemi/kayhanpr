<?php

namespace App\Http\Controllers;

use App\Icerik;
use App\Kategori;
use App\Mesaj;
use App\Sayfa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class YonetimController extends Controller
{

    public function index()
    {
        $sayfa_toplam = Sayfa::all();
        $gelenmesajlar = Mesaj::all();
        $kategori_toplam = Kategori::all();
        $yazi_toplam = Icerik::where('kategori', '!=', '5')->get();
        $yazilar = Icerik::orderByDesc('created_at')->take(4)->get();

        return view('admin.index', compact(
            'yazilar',
            'yazi_toplam',
            'kategori_toplam',
            'sayfa_toplam',
            'gelenmesajlar'
        ));
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
        //
    }


    public function destroy($id)
    {
        //
    }


    public function kullanicilar(){

        $kullanicilar = User::all();
        return view('admin.kullanicilar.index',compact('kullanicilar'));


    }


    public function kullaniciekle(){


        return view('admin.kullanicilar.create');

    }


    public function kullanicikayit(request $request){

        $this->validate(request(),array(


            'yetki'=>'required',
            'adsoyad'=>'required',
            'email'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required',
        ));

        $kullanici = new User();
        $kullanici->adsoyad = request('adsoyad');
        $kullanici->email = request('email');
        $kullanici->yetki = request('yetki');

        if(request('password')!=request('password_confirmation')){


            alert()
                ->error('Hata', 'Şifreler Eşleşmiyor')
                ->showConfirmButton()
                ->showCancelButton()
                ->autoClose();

            return back();
        }else{

            $kullanici->password= Hash::make(request('password'));


        }

        $kullanici-> save();

        if($kullanici) {


            return redirect()->route('kullanici.index');


        }else {


            return back();


        }


    }

    public function kullaniciduzenle($id){

        $kullanici = User::find($id);
        return view('admin.kullanicilar.duzenle',compact('kullanici'));



    }


    public function kullaniciguncelle($id)
    {


        $this->validate(request(), array(

            'adsoyad' => 'required',
            'email' => 'required',

        ));

        $kullanici = User::find($id);
        $kullanici->adsoyad = request('adsoyad');
        $kullanici->email = request('email');
        $kullanici->yetki = request('yetki');

        if (request('password') != request('password_confirmation')) {


            alert()
                ->error('Hata', 'Şifreler Eşleşmiyor')
                ->showConfirmButton()
                ->showCancelButton()
                ->autoClose(200000);

            return back();
        } else {

            $kullanici->password = Hash::make(request('password'));


        }

        $kullanici->save();

        if ($kullanici) {


            return redirect()->route('kullanici.index');


        } else {

            return back();


        }


    }

    public function kullanicisil($id){


        $sil = User::find($id)->delete();
        if ($sil) {



            return redirect()->route('kullanici.index');


        } else {


            return back();


        }



    }

    public function cikis()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }


}
