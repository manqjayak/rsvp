<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_event extends Model
{
    use HasFactory;
    protected $table = 'daftar_event';


    public function detail_event(){
        return $this->hasOne(detail_event::class,'id', 'id_detail_event');
    }

    public function paket_event(){
        return $this->hasOne(paket_event::class,'id', 'id_paket_event');
    }

}
