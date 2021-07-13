<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GuestManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('gm')){
                
                return $next($request);
            } else {
                return redirect('/');
            }
        });
    }

    public function index(Request $request){
      dd("asdasdasd");
    }

  
}
