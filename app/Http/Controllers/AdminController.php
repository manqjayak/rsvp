<?php

namespace App\Http\Controllers;

use App\Models\permintaan_event;
use App\Models\User;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')){
                
                return $next($request);
            } else if(Gate::allows("gm")){
                return response()->redirectTo('/home');
            }
            else {
                return redirect('/');
            }
        });
    }

    public function index(Request $request){
        // dd("ini admin");
        $rEvent = permintaan_event::where('id_status',1)->get();
      
        return view('admin/dashboard', compact(['rEvent']));
    }

    public function requestEvent(Request $request){
        $event = permintaan_event::where('id_status',1)->get();
        $user = permintaan_event::find(1)->user;
        // dd($user);
        return view('admin/request', compact(['event']));
    }

    public function tolakRequest(Request $request){
        if($request->ajax()){
            $data = permintaan_event::where('id',$request->id)->update(['id_status'=>3]); 
            echo json_encode("oke");
        }
    }
    public function terimaRequest(Request $request){
        if($request->ajax()){
            $data = permintaan_event::where('id',$request->id)->update(['id_status'=>2]); 
            echo json_encode("oke");
        }
    }

 

    public function mGuestManager(Request $request){
        $data = User::where('id_role',2)->get();
        $rEvent = permintaan_event::where('id_status',1)->get();
        return view('admin/guestm',compact(['data','rEvent']));
      
    }
    public function mDaftarEvent(Request $request){
        $event = permintaan_event::where('id_status',1)->get();
        $ievent = event::get();
        $user = permintaan_event::find(1)->user;
        // dd($user);
        return view('admin/daftarevent', compact(['event','ievent']));
    }

    public function dGuestManager(Request $request){
        $data = User::where('id',$request->id)->delete();
        if($data){
            return redirect()->to('/admin/mguestmanager');
        }
        dd('gagal');
    }

    public function detailGM(Request $request){
        if($request->ajax()){
            $data= User::where('id',$request->id)->first();
            echo json_encode($data);
        }
    }
    public function editGM(Request $request){
        if($request->ajax()){
            $data= User::where('id',$request->id)->update(['nama'=>$request->nama,'no_telp'=>$request->nowa]);
            echo json_encode($data);
        }
    }
    public function getRSVP(Request $request){
        if($request->ajax()){
            $data= event::where('id',$request->id)->first();
            echo json_encode($data);
        }
    }
    public function editRSVP(Request $request){
        if($request->ajax()){
            $data= event::where('id',$request->id)->update(["url"=>$request->url]);
            echo json_encode($data);
        }
    }

 
}
