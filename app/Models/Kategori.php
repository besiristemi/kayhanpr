<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    /* protected $fillable = ['baslik','aciklamasi','slug','ust_id']; */


    public function yazilar() {

        return $this->hasMany('App\Models\Yazi','kategori');

    }



    public function anakategori() {

        return $this->belongsto('App\Models\Kategori','id');


    }

    public function altkategori() {

        return $this->hasMany('App\Models\Kategori','ust_id');


    }
}
