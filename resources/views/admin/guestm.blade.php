@extends('admin.templates')

@section('title','dashboard')

@section('notification')
 <!-- logic notification -->
 @if(!$rEvent->isEmpty())
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
                                    <th scope="col">no WA</th>
                                    <th scope="col">opsi</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $b)
                            
                                <tr>                                                    
                                <td scope="row">{{$b->nama}}</td>                            
                                <td scope="row">{{$b->no_telp}}</td>                            
                                           
                                <td> 
                                <button type="button" name="{{$b->id}}" id="gEdit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">edit</button>   
                                <a href="{{route('dguestmanager')}}" id ="hapusTamu" name="{{$b->id}}" class='btn btn-danger w-25 m-1'  onclick="event.preventDefault();
                                        $('#idGM').val('{{$b->id}}');
                                        var r = confirm('Hapus Data?');
                                        if(r==true){document.getElementById('hapus-gm').submit();}"
                                            >Hapus</a>                               
                                        <form id="hapus-gm" action="{{ route('dguestmanager') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="text" id='idGM' name="id" value="">
                                    </form>  
                                </td>                       
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
        </div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
             <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" required >
            </div>
            <div class="mb-3">
                <label for="nowa" class="form-label">No.Whatsapp</label>
                <input type="text" class="form-control" id="nowa" required  >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="eGM" class="btn btn-primary" >edit</button>
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
      // ajax edit pesan WA
      function editPesan(id,pesan){
    $.ajax({
        method: "post",
            url: "{{route('editpesan')}}",
            dataType: 'json',
            data: {
                id:id,
                pesan:pesan
            },
            success:function(data){
                location.reload();
                console.log(data)
               
            }
    })
}
// end
      // ajax mendapatkan detail data guest manager
      function detailGM(id){
    $.ajax({
        method: "post",
            url: "{{route('dGM')}}",
            dataType: 'json',
            data: {
                id:id,        
            },
            success:function(data){
                // location.reload();
                let nama = $('#nama').val(data.nama)
                let nowa = $('#nowa').val(data.no_telp)
               
            }
    })
}
// end
      // ajax edit detail data guest manager
      function editGM(id, nama, nowa){
    $.ajax({
        method: "post",
            url: "{{route('editGM')}}",
            dataType: 'json',
            data: {
                id:id,     
                nama:nama,
                nowa:nowa   
            },
            success:function(data){
                location.reload();
               console.log(data)
               
            }
    })
}
// end


  // klik simpan edit guest manager
  $(document).on('click','#gEdit',function(){
        let id = $("#gEdit").attr("name")

        // editPesan(id,pesan)
        //  $(this).attr('data-bs-dismiss','modal')
        // console.log(id,nama, nowa, company)
        detailGM(id)
    })
    // end
  // klik simpan edit guest manager
  $(document).on('click','#eGM',function(){
        let id = $("#gEdit").attr("name")
        let nama = $('#nama').val()
        let nowa = $('#nowa').val()

        editGM(id, nama, nowa)
    })
    // end

    })

    </script>
@endsection