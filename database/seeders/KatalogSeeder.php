<?php

namespace Database\Seeders;

use App\Models\Katalog;
use Illuminate\Database\Seeder;

class KatalogSeeder extends Seeder
{
    public function run(): void
    {
        if (Katalog::count() > 0) {
            return;
        }

        $pdf = 'uploads/katalog/kayhan-katalog.pdf';

        Katalog::create([
            'baslik' => 'Kayhan Prodüksiyon İskele Kataloğu',
            'slug' => 'iskele-katalogu',
            'pdf_path' => $pdf,
            'aciklama' => 'Çelik iskele sistemleri, kiralık iskele ve aksesuarlar — teknik özellikler ve referanslar.',
            'meta_title' => 'İskele Sistemleri Kataloğu | Kayhan Prodüksiyon',
            'meta_description' => 'Kayhan Prodüksiyon PDF kataloğu: çelik iskele, kiralık sistemler ve İsviçre projeleri için çözümler.',
            'meta_keywords' => 'iskele katalog, scaffolding catalog, kayhan prodüksiyon pdf',
            'sira' => 1,
            'aktif' => true,
        ]);
    }
}
