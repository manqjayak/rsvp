@extends('admin.templates')

@section('title','dashboard')

@section('notification')
 <!-- logic notification -->
 @if(!$rEvent->isEmpty())
                <li class="nav-item">
                <button type="button" id='krequest' class="btn btn-primary position-relative" >
                <a href="{{route('requestevent')}}">Request Event</a>
             
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                 
                </button>
                @else
                <button type="button" class="btn btn-primary position-relative"   disabled>
                <a href="{{route('requestevent')}}">Request Event</a>
                 
                </button>
              
                @endif
                </li>
                <!-- end -->

@endsection

@section('js')

    <script>
        $(document).on('click',"#krequest",function(){
            window.location.replace("{{route('requestevent')}}")
        })
    </script>
@endsection