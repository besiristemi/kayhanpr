<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\Cozumortak;
use App\Models\Hakkimizda;
use App\Models\Mesaj;
use App\Models\Sayfa;
use App\Models\Yazi;
use App\Services\ContactSpamGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $hakkimizda = Hakkimizda::find(1);

        return view('kayhanpr.template', compact('hakkimizda'));
    }

    public function hakkimizda()
    {
        $hakkimizda = Hakkimizda::findOrFail(1);

        return view('kayhanpr.hakkimizda', compact('hakkimizda'));
    }

    public function sss()
    {
        return view('kayhanpr.sss');
    }

    public function faaliyetlerimiz()
    {
        $urunler = Yazi::where('kategori', '4')->orderByDesc('id')->get();

        return view('kayhanpr.urunler.index', compact('urunler'));
    }

    public function cozumortaklari()
    {
        $ortaklar = Cozumortak::orderByDesc('id')->get();

        return view('kayhanpr.cozumortaklari', compact('ortaklar'));
    }

    public function referanslar()
    {
        return redirect()->route('cozumortaklari');
    }

    public function kurumsal()
    {
        return redirect()->route('hakkimizda');
    }

    public function fetch(Request $request)
    {
        if (! $request->get('query')) {
            return response('');
        }

        $query = $request->get('query');
        $data = DB::table('icerikler')
            ->where('baslik', 'LIKE', "%{$query}%")
            ->limit(8)
            ->get();

        $output = '<ul class="kp-search-results">';
        foreach ($data as $row) {
            $url = route('haber.goster', ['id' => $row->id, 'slug' => $row->slug]);
            $output .= '<li><a href="'.$url.'">'.e($row->baslik).'</a></li>';
        }
        $output .= '</ul>';

        return response($output);
    }

    public function iletisim()
    {
        $captcha = ContactSpamGuard::issueCaptcha();

        return view('kayhanpr.iletisim', compact('captcha'));
    }

    public function store(ContactMessageRequest $request)
    {
        if ($spam = ContactSpamGuard::validate($request)) {
            ContactSpamGuard::issueCaptcha();

            return back()
                ->withInput()
                ->withErrors(['spam' => $spam]);
        }

        $validated = $request->validated();

        Mesaj::create([
            'adsoyad' => $validated['adsoyad'],
            'email' => $validated['email'],
            'konu' => $validated['konu'] ?? null,
            'mesaj' => $validated['mesaj'],
            'ip_adresi' => $request->ip(),
        ]);

        ContactSpamGuard::issueCaptcha();

        return redirect()
            ->route('iletisim')
            ->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.');
    }

    public function yazidetay($id, $slug = null)
    {
        $icerik = Yazi::findOrFail($id);

        if ($slug && $icerik->slug && $slug !== $icerik->slug) {
            return redirect()->route('haber.goster', ['id' => $icerik->id, 'slug' => $icerik->slug], 301);
        }

        return view('kayhanpr.pages.icerik-detay', [
            'icerik' => $icerik,
            'pageTitle' => strip_tags($icerik->baslik),
            'breadcrumb' => [
                ['label' => 'Ana Sayfa', 'url' => url('/')],
                ['label' => 'Haberler', 'url' => url('/')],
                ['label' => Str::limit(strip_tags($icerik->baslik), 48)],
            ],
        ]);
    }

    public function urundetay($id, $slug = null)
    {
        $icerik = Yazi::findOrFail($id);

        if ($slug && $icerik->slug && $slug !== $icerik->slug) {
            return redirect()->route('urundetay.goster', ['id' => $icerik->id, 'slug' => $icerik->slug], 301);
        }

        return view('kayhanpr.pages.icerik-detay', [
            'icerik' => $icerik,
            'pageTitle' => strip_tags($icerik->baslik),
            'breadcrumb' => [
                ['label' => 'Ana Sayfa', 'url' => url('/')],
                ['label' => 'Ürünlerimiz', 'url' => route('faaliyetlerimiz')],
                ['label' => Str::limit(strip_tags($icerik->baslik), 48)],
            ],
        ]);
    }

    public function sayfa($id, $slug = null)
    {
        $sayfa = Sayfa::findOrFail($id);

        return view('kayhanpr.pages.sayfa-detay', [
            'sayfa' => $sayfa,
            'pageTitle' => $sayfa->baslik,
            'breadcrumb' => [
                ['label' => 'Ana Sayfa', 'url' => url('/')],
                ['label' => $sayfa->baslik],
            ],
        ]);
    }
}
