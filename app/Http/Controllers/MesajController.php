<?php

namespace App\Http\Controllers;

use App\Mesaj;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MesajController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesajlar = Mesaj::all();
        return view('admin.mesajlar.index',compact('mesajlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesaj = Mesaj::findOrFail($id);

        return view('admin.mesajlar.show', compact('mesaj'));
    }

    public function edit($id)
    {
        return redirect()->route('mesajlar.show', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mesaj::destroy($id);

        alert()
            ->success('Başarılı', 'Mesaj Silindi')

            ->autoClose(2000);

        return back();
    }
}
