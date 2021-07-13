@extends('templates.sidebar')

@section('title','dashboard')

@section('content')
@if (session('flash'))
                <div class="alert {{session('flash1')}}" role="alert">
                    {{session('flash')}}
                  </div>                    
                @endif
<form method="POST" action="{{ route('orderevent') }}">
@csrf
  <div class="mb-3">
     <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" name="lokasi" id='lokasi'  class="form-control" id="staticEmail2" value="{{old('lokasi')}}" required>
  </div>
  <div class="mb-3">
     <label for="event" class="form-label">Nama Acara</label>
        <select id='event' name='event' class="form-select" aria-label="Default select example" required>
            <option value="" selected>Open this select menu</option>
            @foreach ($detail as $d)
            <option class="text-capitalize" value="{{$d->id}}">{{$d->nama_event}}</option>
            @endforeach
        </select>   
    </div>

  <div class="mb-3">
     <label for="paket" class="form-label">Paket</label>
        <select id='paket' name='paket' class="form-select" aria-label="Default select example" required>
            <option value=""selected>Open this select menu</option>
            @foreach ($paket as $p)
            <option class="text-capitalize" value="{{$d->id}}">{{$p->nama_event}}</option>
            @endforeach
        </select>   
    </div>

  <div class="mb-3">
     <label for="jumlahTamu" class="form-label">Jumlah Tamu</label>
        <select id='jumlahTamu' name='jumlahTamu' class="form-select" aria-label="Default select example" required>
            <option value="" selected>Open this select menu</option>
      
            <option class="text-capitalize" value="50">50</option>
            <option class="text-capitalize" value="100">100</option>
            <option class="text-capitalize" value="150">150</option>
            <option class="text-capitalize" value="200">200</option>
            <option class="text-capitalize" value="201">>200</option>

        </select>   
    </div>
    <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal Acara</label>
        <input placeholder="dd/mm/yyyy"  type="date" id="tanggal"  name='tanggal' class="form-control datepicker "required>
    </div>


    <div class="mb-3 row">
    <label for="harga" id="cek" class="col-sm-2 col-form-label">Cek Harga</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" name="harga" id="harga" value="-">
    </div>
  </div>

    <button type="submit" class="btn btn-primary mb-3">Order</button>
 
</form>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
 $(document).ready(function(){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
    function harga(pe, de){
        $.ajax({
            method: "get",
            url: "{{route('charga')}}",
            dataType: 'json',
            data: {
                pe: pe,
                de: de
            },
            success:function(data){
                $('#harga').val(data)
                console.log(data)
               
            }
        })
    }

    $(document).on('click','#cek',function(){
        var pe = $('#event').val()
        var de = $('#paket').val()
        harga(pe,de)
      
    })
})

</script>

@endsection