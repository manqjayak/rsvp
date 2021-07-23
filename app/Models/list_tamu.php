<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_tamu extends Model
{
    use HasFactory;

    protected $table = "list_tamu";
    public $timestamps =false;

    protected $fillable = ["id_event"];

    public function tamu(){
        return $this->hasMany(tamu::class, "id_list_tamu","id");
    }

    public function event(){
        return $this->belongsTo(event::class, 'id_event','id');
    }
}
