<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayfa extends Model
{
    protected $table = 'sayfalar';
    protected $guarded = [];



    public function ustsayfa() {

        return $this->belongsto('App\Models\Sayfa','id');


    }

    public function altsayfa() {

        return $this->hasMany('App\Models\Sayfa','ust_id');


    }
}
