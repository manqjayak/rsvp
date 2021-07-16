<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = "event";
    public $timestamps = false;

    protected $fillable = ["id_permintaan_event", "id_status_event", "total_harga"];

    public function list_tamu(){
        return $this->hasOne(list_tamu::class,"id_event", "id");
    }

    public function permintaan_event(){
        return $this->belongsTo(permintaan_event::class, 'id_permintaan_event','id');
    }

    public function status_event(){
        return $this->hasOne(status_event::class,'id','id_status_event');
    }
}
