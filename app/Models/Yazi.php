<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yazi extends Model
{
    protected $table = 'icerikler';
    protected $guarded = [];

    public function scopeSlider($query)
    {
        return $query->where('kategori', '5');
    }

    public function kullanici() {


        return $this->belongsTo('App\Models\User','user_id');

    }

    public function kategorisi() {

        return $this->belongsTo('App\Models\Kategori','kategori');


    }

}
