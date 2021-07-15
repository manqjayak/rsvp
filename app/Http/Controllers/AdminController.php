<?php

namespace App\Http\Controllers;

use App\Models\permintaan_event;
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
}
