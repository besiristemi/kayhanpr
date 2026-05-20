<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{

    public function index()
    {
        $kategoriler = Kategori::all();
        return view('admin.kategoriler.index',compact('kategoriler'));
    }


    public function create()
    {
        $kategoriler = Kategori::Where('ust_id','=',null)->get();
        return view('admin.kategoriler.create',compact('kategoriler'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'aciklama' => 'required',
        ));


        $kategori =new Kategori();
        $kategori->baslik = request('baslik');
        $kategori->aciklama = request('aciklama');
        $kategori->slug = \Illuminate\Support\Str::slug(request('baslik'));
        $kategori->user_id = Auth::user()->id;
        $kategori->save();

        /*alert()
            ->success('Başarılı', 'Kategori Eklendi')
            ->autoClose(2000);*/

        return redirect()->route('kategoriler.index')->with('success', 'Kategori eklendi.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $tumkategoriler = Kategori::all();
        return view('admin.kategoriler.duzenle',compact('kategori','tumkategoriler'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'aciklama' => 'required',
        ));

        $kategori = Kategori::find($id);
        $kategori->baslik = request('baslik');
        $kategori->aciklama = request('aciklama');
        $kategori->slug = \Illuminate\Support\Str::slug(request('baslik'));
        $kategori->ust_id = request('ust_id');
        $kategori->save();



        return redirect()->route('kategoriler.index');
    }


    public function destroy($id)
    {
        Kategori::destroy($id);



        return redirect()->route('kategoriler.index');
    }
}
