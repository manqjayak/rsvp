@extends('templates.sidebar')

@section('title','List Tamu')


@section("css")
<style>
/* textarea.form-control {
  height: 1000px;
} */

</style>
@endsection

@section('content')


<h1 class="display-3">ID LIST TAMU:<span> {{$idListTamu}}</span></h1>
@if($status_event != 3)
@if($paket_event == 1)

<a  class="btn btn-primary" data-toggle="modal" id ='copyurl' data-target="#exampleModalCenter" name="{{$event->url}}">Dapatkan Link</a>

@endif

<button type="button" class="btn btn-primary" id='bExel' >
  +Excel
</button>
<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Manual</button>
<div class="container" id='listorderr'>
<button type="button" id="beditPesan" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpesanWA">pesan WA</button>

<div class="container" id='tempatExcel'>

</div>
<div class="container" >
<div class="row">
<div class="col-6" id="tempatTanggal"><h3>Tanggal:</h3> <h3 id="tanggalE">@php echo date('d-m-Y', $tanggal); @endphp</h3></div>

<div class="col-6"> <h1><button type="button" id="cancelE" class="btn btn-danger" >Batal</button></h1></div>

</div>
</div>
@endif

<div class="container" id='listorder' name="{{$event->id}}">
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
                                        @if($status_event != 3 && $paket_event != 1)
                                        <a href="#" id="{{$b->id}}" name1='{{$b->id}}' name2='{{$paket_event}}'  name3='{{$detail_event}}
                                        ' name4 = '{{$idListTamu}}'class='btn btn-dark w-25' name="{{$b->id}}">kirim WA</a>   
                                        @endif    
                                        @if($b->status_kehadiran ==0)
                                        <span>Tidak Hadir</span>
                                        @else 
                                        <span>Hadir</span>
                                        @endif
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
<!-- Modal -->
<div class="modal fade" id="editpesanWA" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pesanEdit">pesanWA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating">
            <textarea id='valueWA'class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 500px">{{$event->pesan}}</textarea >
            <label for="floatingTextarea2"></label>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="epWA" class="btn btn-primary" >Tambah</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal exce -->
<!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
          <div class="mb-3">
              <label for="formFile" class="form-label">Default file input example</label>
              <input class="form-control" name='file' required type="file" id="formFile">
            </div>
    
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="bimportexcel" class="btn btn-primary" >Import</button>
      </div>
      
    </div>
  </div>
</div>
 -->

			<!-- <div class="modal-dialog" role="document">
				<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div> -->

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
        alert("LINK SUDAH TERCOPY")
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
// import excel tamu
function fImportTamu(id, excel){
    var form_data = new FormData();
    var file_data =$('#formFile').prop('files')[0];
    form_data.append('file', file_data);
    form_data.append('id',id)

    $.ajax({
        method: "post",
             url: "{{route('fimportexcel')}}",
             cache: false,
             processData: false,
            data: form_data,
          
            contentType: false,
            success:function(data){
              // data menggunakan integer karena jika menggunakan boolean atau string menjadi error
              if(data == 1){
                location.reload();
              }else{
                alert("Format excel Salah");
              }
                          // if (data == 'true')console.log(data);location.reload();
              // else alert("Format excel Salah");
           
              // if(data == true){

              //   console.log("ini true")
              // }else{
              //   console.log("ini false")
              // }
           
            }
    })
}

// end
// end
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

    //klik tambah
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
    // end

    // klik edit pesan
    $(document).on('click','#epWA',function(){
        let id = $("#listorder").attr("name")
        let pesan = $('#valueWA').val()

        editPesan(id,pesan)
         $(this).attr('data-bs-dismiss','modal')
        console.log(id,pesan)
    })

    // tambah excel
    $(document).on('click','#bExel',function(){
        $('#tempatExcel').html(`
        <h1 class="display4">template excel:</h1>
        <table class="table table-hover mt-1 " id= 'tableprint' >
                                <thead class="thead-light">
                                    <tr>
                                    
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No WA</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">ID List Tamu</th>

                                    </tr>
                                </thead>
                                <table>

        <div class="modal-body">
      
      <div class="mb-3">
          <label for="formFile" class="form-label">Default file input example</label>
          <input class="form-control" name='file' required type="file" id="formFile">
        </div>

    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" id="closeExcel">Close</button>
    <button type="button" id="bimportexcel" class="btn btn-primary" >Import</button>
  </div>
  `)
    })
    // close excel
    $(document).on('click','#closeExcel',function(){
      $('#tempatExcel').html(``)
    })

    // end
    // klik import excel
    $(document).on('click','#bimportexcel',function(){
        let id = $("#listorder").attr("name")
        let file = $('#formFile').val()
        if(file!=""){

           fImportTamu(id, file)
        }else{
          alert("File Kosong");
        }
        // editPesan(id,pesan)
        //  $(this).attr('data-bs-dismiss','modal')
       
        // console.log(id,file)
    })

    // edit tanggal
    $(document).on('click','#tanggalE',function(){
      
      // let date = Date.parse($(this).text())/1000
      let date = $(this).text()
      let value = date.split("-")
      
      let kata = `
      <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal: </label>
        <input  type="date" id="tanggal"  name='tanggal' value="`+value[2]+`-`+value[1]+`-`+value[0]+`" class="form-control datepicker "required>
    </div>
      `   
      $(this).parent().html(kata)

    })
    // ajax simpan edit tanggal
    function editTanggal(tanggal, id){
      $.ajax({
        method: "post",
            url: "{{route('edittanggal')}}",
            dataType: 'json',
            data: {
                id:id,
                tanggal:tanggal
            },
            success:function(data){
                // location.reload();
                let value = data.split("-")
                $('#tempatTanggal').html(`
                <h3>Tanggal:</h3> <h3 id="tanggalE">
                `+value[2]+`-`+value[1]+`-`+value[0]+`</h3>
                `)
                
                // console.log(data)
               
            }
      })
      // end
    }
    // simpat edit tanggal
    $(document).on('focusout','#tanggal',function(){
      value = $(this).val()
      let cfmr = confirm("Ubah tanggal?")
      if(cfmr){

        editTanggal(value,"{{$idListTamu}}" )
      }else{
        $('#tempatTanggal').html(
        `<h3>Tanggal:</h3> <h3 id="tanggalE">@php echo date('d-m-Y', $tanggal); @endphp</h3>`)
      }
    })
// ajax cancel event
function cancelEvent(id){
      $.ajax({
        method: "post",
            url: "{{route('cancelevent')}}",
            dataType: 'json',
            data: {
                id:id,

            },
            success:function(data){
              window.location.replace("{{route('orderlist')}}");
               
            }
      })
       }
      // end
    // cancel event
    $(document).on('click','#cancelE',function(){
      console.log("oke")
      let cfmr = confirm("Cancel Event?")
      if(cfmr){
        cancelEvent("{{$idListTamu}}")

      }
    })

    // cek link untuk send whatsapp
    $(document).on('click','a',function(){
      
      let tamu = $(this).attr('name1')
      let paket = $(this).attr('name2')
      let detail = $(this).attr('name3')
      let id = $(this).attr('name4')
      console.log("id List Tamu:"+id)
      console.log("id Tamu:"+tamu)
      console.log("Paket :"+paket)
      console.log("Detail:"+detail)
    })


})


</script>


@endsection