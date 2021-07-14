@extends('templates.sidebar')

@section('title','List Tamu')

@section('content')

@if($paket_event == 2)

<a  class="btn btn-primary" data-toggle="modal" id ='copyurl' data-target="#exampleModalCenter" name="{{$event->url}}">Dapatkan Link</a>

@endif
<button type="button" class="btn btn-secondary">+ Excel</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Manual</button>
<div class="container" id='listorder'>
    <div class="table-responsive table-sm ">
                            <table class="table table-hover mt-1 " id= 'tableprint' name="{{$idListTamu}}">
                                <thead class="thead-light">
                                    <tr>
                                    
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No Whatsapp</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                    @foreach ($tamu as $b)
                                
                                    <tr>                                        
                                    <td scope="row"> {{$i}}</td>                            
                                    <td scope="row"> {{$b->nama}}</td>                            
                                    <td scope="row"> {{$b->noWA}}</td>                            
                                    <td scope="row"> {{$b->company}}</td>                            

                                   
                                        <td> 
                                        <a href="#" id="{{$b->id}}" class='btn btn-dark w-25' name="{{$b->id}}">kirim WA</a>   
                                                  
                                        <a href="{{route('deletetamu')}}" id ="hapusTamu" name="{{$b->id}}" class='btn btn-dark w-25 m-1'  onclick="event.preventDefault();
                                        $('#idhTamu').val('{{$b->id}}');
                                        $('#pageTamu').val('{{$idtamu}}');
                                                     document.getElementById('hapus-tamu').submit();">Hapus</a>   

                                        <form id="hapus-tamu" action="{{ route('deletetamu') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="text" id='idhTamu' name="id" value="">
                                        <input type="text" id='pageTamu' name="page" value="">
                                    </form>
          
                                        </td>
                                        
                                    </tr>

                                    <?php $i = $i+1 ?>
                                    @endforeach
                                </tbody>
                            </table>
                        
                            @if ($tamu->isEmpty())
                                    <div class="alert alert-danger text-center" role="alert" >
                                        Data Tidak Ditemukan
                                    </div>  
                                    @endif
                        
            </div>
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
                <input type="text" class="form-control" id="nowa" required >
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" required >
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="tambahtamu" class="btn btn-primary" >Tambah</button>
      </div>
      
    </div>
  </div>
</div>


@endsection

@section('modal')
<!-- Modal -->
<!-- <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

@endsection


@section('js')
@if($paket_event == 2)
<script >
$(document).ready(function(){
    // hapus, event disini untuk mendapatkan isi dari sesuatu yang di klik
    // $(document).on('click',function(event){
    //    console.log( $(event.target).attr("name"))
    // })

    $(document).on('click','hapustamu',function(){
        $('#idhTamu').val($(this).attr('name'))
    })


    $(document).on("click",'#copyurl',function(){
        console.log($(this).attr('name'))
        let url = $(this).attr('name')

        var $temp  = $("<input>")
        $("body").append($temp)
        $temp.val(url).select()
        document.execCommand("copy")
        $temp.remove()
    })

// tambah tamu
//ajax
$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
function tambahTamu(id, nama, wa, company){
    $.ajax({
        method: "post",
            url: "{{route('tambahtamu')}}",
            dataType: 'json',
            data: {
                id:id,
                nama:nama,
                wa:wa,
                company:company
            },
            success:function(data){
                location.reload();
                console.log(data)
               
            }
    })
}

//klik
$(document).on('click','#tambahtamu',function(){
    let nama = $('#nama').val()
    let wa = $('#nowa').val()
    let company = $('#company').val()
    let id = $('#tableprint').attr('name')
    if(nama == ""){
        $('#nama').addClass('is-invalid')
        $(document).on('click','#nama',function(){
            $(this).removeClass("is-invalid")
        })
    }
    if(wa == ""){
        $('#nowa').addClass('is-invalid')
        $(document).on('click','#nowa',function(){
            $(this).removeClass("is-invalid")
        })
    }
    if(company == ""){
        $('#company').addClass('is-invalid')
        $(document).on('click','#company',function(){
            $(this).removeClass("is-invalid")
        })
    }

    if(nama != "" && wa != "" && company != "" ){

        $('#staticBackdrop').modal('toggle')
        tambahTamu(id, nama, wa, company)
    }
    // $(this).attr('data-bs-dismiss','modal')

// data-dismiss="modal"
    console.log(nama, wa, company, id)
})


})


</script>
@endif

@endsection