<?php

namespace Database\Seeders;

use App\Models\Yazi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'baslik' => 'Endüstriyel İskele Çözümleri',
                'icerik' => 'İsviçre ve Avrupa pazarında çelik iskele üretimi, kiralama ve proje desteği.',
                'resim' => 'yuklemeler/slider/kayhan-slide-1.png',
                'slug' => 'endustriyel-iskele-cozumleri',
            ],
            [
                'baslik' => 'Üretim & Lojistik Gücü',
                'icerik' => 'Modern tesislerimizde yüksek kapasiteli üretim ve hızlı sevkiyat altyapısı.',
                'resim' => 'yuklemeler/slider/kayhan-slide-2.png',
                'slug' => 'uretim-lojistik-gucu',
            ],
            [
                'baslik' => 'Güvenilir Proje Ortağınız',
                'icerik' => 'Mühendislik, güvenlik ve kalite standartlarında sahada yanınızdayız.',
                'resim' => 'yuklemeler/slider/kayhan-slide-3.png',
                'slug' => 'guvenilir-proje-ortaginiz',
            ],
        ];

        $existing = Yazi::where('kategori', '5')->orderBy('id')->get();

        foreach ($slides as $index => $slide) {
            $row = $existing->get($index);

            if ($row) {
                $row->update($slide);
                continue;
            }

            Yazi::create(array_merge($slide, [
                'kategori' => '5',
                'user_id' => 1,
            ]));
        }
    }
}
