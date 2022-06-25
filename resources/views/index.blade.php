<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Aplikasi Perekaman Surat Keluar</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2>Aplikasi Perekaman Surat Keluar</h2>
            <div id="read" class="mt-3">
            </div>
            <button class="btn btn-primary" onclick="create()">Tambah Data </button>
        </div>
    </div>
</div>
  <!-- Modal add/update -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Tittle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div id="page" class="p-2">

                </div>

        </div>
      </div>
    </div>
  </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
read();
});
  //membaca data kendaraan
  function read(){
    $.get("{{url('read')}}",{}, function(data,status){
        $("#read").html(data);
    })
  }
// menampilkan halaman modal add
function create(){
        $.get("{{url('create')}}",{}, function(data,status){
            $("#exampleModalLabel").html('Tambah Surat')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
// menampilkan halaman modal update
function show(id){
        $.get("{{url('show')}}/"+id,{}, function(data,status){
            $("#exampleModalLabel").html('Update Surat')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
// proses add data
function store(){
        var nomor = $("#nomor").val();
        var judul = $("#judul").val();
        var tanggal = $("#tanggal").val();
        $.ajax({
            type:"get",
            url:"{{ url('store') }}",
            data:{nomor,judul,tanggal},
            success:function(data){
                $(".btn-close").click();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil',
                    text: 'Ditambahkan'});
                read();
            }
        });
    }
// proses Update data
function update(id){
        var nomor = $("#nomor").val();
        var judul = $("#judul").val();
        var tanggal = $("#tanggal").val();
        $.ajax({
            type:"get",
            url:"{{ url('update') }}/"+id,
            data:{nomor,judul,tanggal},
            success:function(data){
                $(".btn-close").click();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil',
                    text: 'Diupdate'});
                read();
            }
        });
    }
// proses destroy/hapus data
function destroy(id){
    Swal.fire({
  title: 'Apakah Kamu Yakin ? ',
  text: "Menghapus Data ini ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya'
}).then((result) => {
  if (result.isConfirmed) {
   $.ajax({
            type:"get",
            url:"{{ url('destroy') }}/"+id,
            success:function(data){
                read();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil',
                    text: 'Dihapus'});
            }
        });
  }
})
    }
</script>
</body>
</html>