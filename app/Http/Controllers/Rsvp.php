<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;

class Rsvp extends Controller
{
    //

    public function index(Request $request, $detail, $id){
        if($detail == 1){

            return view('rsvp/index',compact(['id']));
        }
    }
    public function index1(Request $request, $detail,$paket, $id,$tamu){
        if($detail == 1){
            dd($detail,$paket,$id,$tamu);
            return view('rsvp/index',compact(['id']));
        }
    }


    public function tambahTamu(Request $request){
        if($request->ajax()){
            // id list tamu
            $id = $request->id;
            //nama oraang 1
            $nama1 = $request->nama1;
            // nama rekan
            $nama2 = $request->nama2;
            //no wa
            $wa = $request->wa;
            //pesan jika tidak hadir
            $pesan = $request->pesan;

            // mengejek jika hadir
            if($request->status == 1){
                // mengecek jika mengajak rekan
                if($nama2 == ""){
                    // insert tanpa rekan dan hadir
                    tamu::insert([
                        'id_list_tamu'=> $id,
                        'nama'=>$nama1,
                        'noWA'=>$wa,
                        'company'=>'',
                        'pesan' => "",
                        'status_wa'=>1,
                        'status_kehadiran'=>1,
                        'status_tamu'=>0
                    ]);
                    echo json_encode("sukses");
                }else{
                    // insert dengan rekan dan hadir = 1
                    tamu::insert([
                        'id_list_tamu'=> $id,
                        'nama'=>$nama1,
                        'noWA'=>$wa,
                        'company'=>'',
                        'pesan' => "",
                        'status_wa'=>1,
                        'status_kehadiran'=>1,
                        'status_tamu'=>0
                    ]);
                    tamu::insert([
                        'id_list_tamu'=> $id,
                        'nama'=>$nama2,
                        'noWA'=>$wa,
                        'company'=>'',
                        'pesan' => "",
                        'status_wa'=>1,
                        'status_kehadiran'=>1,
                        'status_tamu'=>0
                    ]);
                    echo json_encode("sukses");
                }
              
            }else{
                // insert nama, dan pesan, namun tidak hadir
                tamu::insert([
                    'id_list_tamu'=> $id,
                    'nama'=>$nama1,
                    'noWA'=>$wa,
                    'company'=>'',
                    'pesan' => $pesan,
                    'status_wa'=>1,
                    'status_kehadiran'=>0,
                    'status_tamu'=>0
                ]);
                echo json_encode("sukses");
            }
        }
    }
}
