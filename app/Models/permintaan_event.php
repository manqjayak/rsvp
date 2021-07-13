<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_event extends Model
{
    use HasFactory;
    protected $table="permintaan_event";
    protected $fillable =[
        "id_event",
        "id_user_request",
        "id_user_response",
        "tanggal_response",
        "tanggal_event",
        "jumlah_tamu",
        "lokasi",
        "id_status"
    ];
    public $timestamps =false;


    public function status_event(){
        return $this->hasOne(status_event::class, 'id', 'id_status');
    }

}
