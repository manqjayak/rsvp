<?php

namespace App\Imports;

use App\Models\tamu;
use Maatwebsite\Excel\Concerns\ToModel;

class TamuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tamu([
            'nama' => $row[1],
            'id_list_tamu' =>$row[4],
            'noWA' => $row[2],
            'company'=> $row[3],
            //
        ]);
    }
}
