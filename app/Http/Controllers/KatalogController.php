<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $kataloglar = Katalog::where('aktif', true)
            ->orderBy('sira')
            ->orderBy('id')
            ->get();

        return view('kayhanpr.katalog.index', compact('kataloglar'));
    }

    public function show(string $slug)
    {
        $katalog = Katalog::where('slug', $slug)->where('aktif', true)->firstOrFail();

        return view('kayhanpr.katalog.viewer', compact('katalog'));
    }
}
