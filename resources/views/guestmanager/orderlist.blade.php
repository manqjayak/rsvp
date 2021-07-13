@extends('templates.sidebar')

@section('title','Order List')

@section('content')
<div class="container" id='listorder'>
    <div class="table-responsive table-sm ">
                            <table class="table table-hover mt-1 " id= 'tableprint'>
                                <thead class="thead-light">
                                    <tr>
                                    
                                        <th scope="col">#</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Tanggal Request</th>
                                        <th scope="col">Tanggal Event</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                    @foreach ($data as $b)
                                
                                    <tr>                                        
                                    <td scope="row"> {{$i}}</td>                            
                                    <td scope="row"> {{$b->lokasi}}</td>                            
                                    <td scope="row"> {{$b->tanggal_request}}</td>                            
                                    <td scope="row"> {{$b->tanggal_event}}</td>                            
                                
                                    <td> 
                                        <a href="#" id="{{$b->id}}" class='btn btn-dark' data-bs-toggle="modal" data-bs-target="#exampleModal">{{$b->status_event->status}}</a>                           
                                    </tr>

                                    <?php $i = $i+1 ?>
                                    @endforeach
                                </tbody>
                            </table>
                        
                            @if ($data->isEmpty())
                                    <div class="alert alert-danger text-center" role="alert" >
                                        Data Tidak Ditemukan
                                    </div>  
                                    @endif
                        
            </div>
</div>
@endsection