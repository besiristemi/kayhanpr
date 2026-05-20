<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = 'kataloglar';

    protected $fillable = [
        'baslik',
        'slug',
        'pdf_path',
        'kapak_resim',
        'aciklama',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sira',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
