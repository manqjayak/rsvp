<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    use HasFactory;

    protected $table = "tamu";
    public $timestamps = false;

    protected $fillable =[
        "id_list_tamu",
        "nama",
        "noWA",
        "company",
        "status_wa",
        "status_kehadiran",
        "status_tamu"
    ];


}
