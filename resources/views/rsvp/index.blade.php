<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container" id="main">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>

        <button id="next1" class="btn btn-warning">registasi</button>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
    $(document).ready(function(){
        $(document).on('click','#next1',function(){
            let text = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>

        <button id="next2" class="btn btn-warning">MENGERTI DAN LANJUT</button>
            `
            $('#main').html(text)
          
        })

        $(document).on('click','#next2',function(){
            let text = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
        
    <div class="mb-3">
    <label for="iNama" class="form-label">Nama</label>
    <input type="text" class="form-control" required id="iNama" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="iNoWA" class="form-label">No Whatsapp</label>
    <input type="text" class="form-control" required id="iNoWA">
  </div>

        <button id="next3" class="btn btn-warning">NEXT</button>
            `
            $('#main').html(text)
        

        })
        var nama= ''
        var wa  =''
        $(document).on('click','#next3',function(){
            nama = $('#iNama').val()
             wa = $('#iNoWA').val()
            let text = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
    <p>APAKAH `+nama +` BISA HADIR?</p>
        
    <form id="form1">
  <input type="radio" name="radioName" value="hadir1" /> YA HADIR <br />
  <input type="radio" name="radioName" value="tidak1" /> TIDAK BISA <br />

</form>

        <button id="next4" class="btn btn-warning">NEXT</button>
            `

           
            if( nama === '' || wa === ''){
                alert("isi form")
            }else{

                $('#main').html(text)
               
            }
        })
        var status1= ''
        var status2 = ''

        $(document).on('change','#form1 input', function() {
        status1 = $('input[name=radioName]:checked', '#form1').val(); 
            });

        $(document).on('click','#next4',function(){
          
            let hadir = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
                <p>MENGAJAK REKAN?</p>
                    
            <form id="form2">
                <input type="radio" name="radioName" value="tidak2" /> TIDAK <br />
                <input type="radio" name="radioName" value="hadir2" /> IYA, DATANG BERPASANGAN<br />

            </form>
            <div class='container' id='namaRekan'> </div>

            <button id="next5" class="btn btn-warning">NEXT</button>
            `

            let tidakHadir = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="pesan" style="height: 100px"></textarea>
                <label for="pesan">Comments</label>
            </div>

            <button id="nextS1" class="btn btn-warning">NEXT</button>
            `
            if(status1 != ""){
                
                if(status1 == 'hadir1'){
                    $('#main').html(hadir)
                }else{
                    $('#main').html(tidakHadir)
                }
            }else{
                alert("pilih salah satu")
            }
        })
        var pesan = ''
        $(document).on('click','#nextS1',function(){
            pesan = $('#pesan').val()
            let text = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>

            
            <button id="" class="btn btn-warning">CHAT HOTLINE</button>

            `
            inputTamu("{{$id}}",nama,nRekan5,wa, pesan, 0, text)
            // $('#main').html(text)
        })

        var status2 = ''

        $(document).on('change','#form2 input', function() {
        status2 = $('input[name=radioName]:checked', '#form2').val(); 

        

            if(status2 == 'hadir2'){
                    $('#namaRekan').html(`
                    <input type="text" class="form-control" required id="iNRekan">
                    `)
                }else{
                    $('#namaRekan').html(``)
                }
         
        });
        var nRekan5= ' '
        $(document).on('click','#next5',function(){
            nRekan5 = $('#iNRekan').val()
            let text = `
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, molestiae.</p>

            
            <button id="" class="btn btn-warning">CHAT HOTLINE</button>

            `
            //finish

            if(status2 != ""){
            console.log(status2)
            // $('#main').html(text)
            inputTamu("{{$id}}",nama,nRekan5,wa, pesan, 1,text)
            }else{
                
            alert("pilih salah satu")
         }
        })
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        // ajax input tamu
        function inputTamu(id, nama1, nama2,wa, pesan, status, text){
            $.ajax({
                method :"post",
                dataType: "json",
                url :"{{route('tambahtamursvp')}}",
                data:{
                    id:id,
                    nama1: nama1,
                    nama2 :nama2,
                    wa: wa, 
                    pesan: pesan,
                    status: status,
                },
                success:function(data){
                    $('#main').html(text)
                    console.log(data)
                }
                
            })
        }


    })
    
    </script>
  </body>
</html>