
@extends('admin.templates')

@section('title','request')

@section('notification')
 <!-- logic notification -->
 @if(!$event->isEmpty())
                <li class="nav-item">
                <button type="button" id='krequest' class="btn btn-primary position-relative" >
                     <a href="{{route('requestevent')}}">Request Event</a>
             
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                 
                </button>
                @else
                <button type="button" class="btn btn-primary position-relative"   disabled>
                    Request Event
                 
                </button>
              
                @endif
                </li>
                <!-- end -->

@endsection

@section('content')
<div class="container">
        <div class="table-responsive table-sm ">
                        <table class="table table-hover mt-1 " id= 'tableprint'>
                            <thead class="thead-light">
                                <tr>
                                
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($event as $b)
                            
                                <tr>                                                    
                                <td scope="row">{{$b->user->nama}} memesan event yaitu {{$b->daftar_event->detail_event->nama_event}} dengan paket {{$b->daftar_event->paket_event->nama_event}} yang dilakukan pada @php echo date('l, d F Y', strtotime($b->tanggal_event)) @endphp di {{$b->lokasi}}</td>                            
                                           
                                <td> 
                                    <a href="#" name="{{$b->id}}" id="tolakE" class='btn btn-danger' >tolak</a>    
                                    <a href="#" id="terimaE" name="{{$b->id}}"  class='btn btn-success'>terima</a>    
                                </td>                       
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
        </div>

@endsection

@section('js')

    <script>
        $(document).ready(function(){
           // tolak
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
            function tolakR(id){
                $.ajax({
                    method : "post",
                    url: "{{route('tolakrequest')}}",
                    dataType: "json",
                    data:{id:id},
                    success: function(data){
                        location.reload();
                        console.log(data)
                    }
                })
            }
            // terima
            function terimaR(id){
                $.ajax({
                    method : "post",
                    url: "{{route('terimarequest')}}",
                    dataType: "json",
                    data:{id:id},
                    success: function(data){
                        location.reload();
                        console.log(data)
                    },
                    error:function(request, status, error){
                        console.log(request.responseText)
                    }
                })
            }

            $(document).on('click','#tolakE',function(){
                let id = $(this).attr('name')
                // console.log(id)
                tolakR(id)
            })

            // terima
            $(document).on('click','#terimaE',function(){
                let id = $(this).attr('name')
                // console.log(id)
                terimaR(id)
            })
        
        })
    </script>
@endsection

