<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Sayfa;
use App\Models\Yazi;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => url('/hakkimizda'), 'priority' => '0.9'],
            ['loc' => url('/iletisim'), 'priority' => '0.9'],
            ['loc' => url('/sss'), 'priority' => '0.8'],
            ['loc' => route('katalog.index'), 'priority' => '0.9'],
            ['loc' => url('/galeri'), 'priority' => '0.7'],
        ];

        foreach (Sayfa::all() as $sayfa) {
            $urls[] = ['loc' => url('/sayfa/'.$sayfa->id.'/'.$sayfa->slug), 'priority' => '0.7'];
        }

        foreach (Yazi::all() as $yazi) {
            $urls[] = ['loc' => url('/haber/'.$yazi->id.'/'.$yazi->slug), 'priority' => '0.6'];
        }

        foreach (Katalog::where('aktif', true)->get() as $k) {
            $urls[] = ['loc' => route('katalog.show', $k->slug), 'priority' => '0.8'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $u) {
            $xml .= '<url><loc>'.e($u['loc']).'</loc><priority>'.$u['priority'].'</priority></url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
