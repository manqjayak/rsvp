<?php

namespace App\Http\Controllers;

use App\Models\daftar_event;
use App\Models\detail_event;
use App\Models\paket_event;
use App\Models\permintaan_event;
use App\Models\status_event;
use App\Models\event;
use App\Models\tamu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class GuestManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('gm')){
                
                return $next($request);
            } else if(Gate::allows("admin")){
                return response()->redirectTo('/admin');
            }
            else {
                return redirect('/');
            }
        });
    }

    public function index(Request $request){
      return view('guestmanager/home');
    }


    public function order(Request $request){
        // dd($request->user()->username);
        // dd(Auth::user()->username);
        $status = status_event::all();
        $paket = paket_event::all();
        $detail = detail_event::all();
       return view('guestmanager/order', compact(['detail','paket']));
    }

    public function cHarga(Request $request){
        if($request->ajax()){
            $data= daftar_event::where('id_paket_event',$request->pe)->where('id_detail_event',$request->de)->first();

            if($data){
                echo json_encode($data->harga);
            }else{
                $data = "Isilah Data Diatas Dengan Lengkap";
                echo json_encode($data);
            }
        }
       
    }

    public function orderEvent(Request $request){
        // dd(daftar_event::find(4)->detail_event);
        // dd($request);
        $request->validate([
            'lokasi' => 'required',
            'event' => 'required',
            'paket' => 'required',
            'jumlahTamu' => 'required',
            'tanggal' => 'required',
        ]);
        $id = daftar_event::where('id_paket_event',$request->paket)->where('id_detail_event',$request->event)->first()->id;
     
        $data = [
            "id_event" => $id,
            'id_user_request' => Auth::user()->id,
            'id_user_response' => 0,
            'tanggal_event' => $request->tanggal,
            'jumlah_tamu' => $request->jumlahTamu,
            'lokasi' => $request->lokasi,
            'id_status' => 1
        ];

        $status = permintaan_event::create($data);

        if($status){
            return redirect('/home')->with(['flash'=>'Pesanan berhasil dikirim', 'flash1'=> 'alert-success']);
        }else{
            return redirect('/order')->with(['flash'=>'Pesanan gagal dikirim', 'flash1'=> 'alert-danger']);
        }
    }

    public function orderList(Request $request){
        if($request->id){
            $event = event::where("id_permintaan_event",$request->id)->first();
            if($event){

                $idListTamu = $event->list_tamu->id;
                $tamu = $event->list_tamu->tamu;
                $paket_event= $event->permintaan_event->detail_event->id_paket_event;
                $idtamu = $request->id;
              
                return view('guestmanager/listtamu',compact(['event','tamu','paket_event','idListTamu','idtamu']));
            }
            $data = permintaan_event::where('id_user_request',Auth::user()->id)->get();
        // dd($data->status_event->status);


        return view('guestmanager/orderlist',compact("data"));
        }else{
        $data = permintaan_event::where('id_user_request',Auth::user()->id)->get();
        // dd($data->status_event->status);


        return view('guestmanager/orderlist',compact("data"));}
    }
  

    public function tambahTamu(Request $request){
        if($request->ajax()){
            $data = [
                "id_list_tamu"=>$request->id,
                "nama" => $request->nama,
                'noWA' =>$request->wa,
                'company'=>$request->company,
                'status_wa'=>0,
                'status_kehadiran' =>0,
                'status_tamu'=> 0
            ];
            $add = tamu::create($data);

            if($add){
                $kata = 'sukses';
                echo json_encode($kata);
            }else{
                $kata = 'gagal';
                echo json_encode($kata);
            }
             
            
        }
    }

    public function deleteTamu(Request $request){
        $data = tamu::where('id',$request->id)->delete();
        if($data){
            return redirect()->to('/orderlist?id='.$request->page);
        }
        dd("gagal");
    }


    //edit pesan WA
    public function editPesan(Request $request){

        if($request->ajax()){
            $pesan = $request->pesan;
            $id = $request->id;
            $data=event::where('id',$id)->update(['pesan'=>$pesan]);

            if($data){

                echo json_encode("berhasil");
            }
        }
    }
}
