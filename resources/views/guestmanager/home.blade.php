@extends('templates.sidebar')

@section('title','dashboard')

@section('content')
@if (session('flash'))

            <div class="alert {{session('flash1')}} d-flex align-items-center alert-dismissible fade show"  role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            {{session('flash')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
                          
                @endif
@endsection