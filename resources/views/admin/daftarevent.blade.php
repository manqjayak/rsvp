
@extends('admin.templates')

@section('title','lsi event')

@section('notification')
 <!-- logic notification -->
 @if(!$event->isEmpty())
                <li class="nav-item">
                <button type="button" id='krequest' class="btn btn-primary position-relative" >
                    Request Event
             
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
                                    <th scope="col">tanggal</th>
                                    <th scope="col">status</th>
                                    <th scope="col">LINK RSVP</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ievent as $b)
                            
                            <tr>                                                <td scope="row"> {{$b->permintaan_event->user->nama}}  </td> 
                               <td scope="row"> {{$b->permintaan_event->tanggal_event}}  </td> 
                               <td scope="row"> {{$b->status_event->status}}  </td> 
                                                        
                                           
                                <td> 
                                  
                                <button type="button" name="{{$b->id}}" id="lRSVP" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editpesanWA">lihat</button>  
                                </td>                       
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
        
        </div>
<!-- Modal -->
<div class="modal fade" id="editpesanWA" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">LINK RSVP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <div class="input-group mb-2 mr-sm-2">
                
                <input type="text" class="form-control" id="isiLinkRSVP" placeholder="">
                <div class="input-group-prepend">
                <div class="input-group-text" id='editURL'>edit</div>
                </div>
            </div>
      
      
    </div>
  </div>
</div>

@endsection

@section('js')

    <script>
        $(document).ready(function(){
          
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
 // lihat link rsvp
            function linkRSVP(id){
                $.ajax({
                    method : "post",
                    url: "{{route('gRSVP')}}",
                    dataType: "json",
                    data:{id:id},
                    success: function(data){
                        $('#isiLinkRSVP').val(data.url)
                        $('#editURL').attr("name",data.id)
                        // console.log(data)
                    }
                })
            }
 // edit link rsvp
            function editRSVP(id,url){
                $.ajax({
                    method : "post",
                    url: "{{route('eRSVP')}}",
                    dataType: "json",
                    data:{id:id,
                    url:url},
                    success: function(data){
                        location.reload();
                        console.log(data)
                    }
                })
            }


            // lihat link
            $(document).on('click','#lRSVP',function(){
                let id = $(this).attr('name')
                // console.log(id)
                linkRSVP(id)
            })

            // edit link
            $(document).on('click','#editURL',function(){
                let id = $(this).attr('name')
                let url = $('#isiLinkRSVP').val()
                // console.log(id)
                editRSVP(id,url)
            })
        
        })
    </script>
@endsection

