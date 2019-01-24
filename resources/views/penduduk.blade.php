<!DOCTYPE html>
<html>
<head>
    <title>Penduduk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script 
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <link 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style type="text/css">

        body{
             background: linear-gradient(to top right, #0033cc 0%, #66ccff 101%);
             background-size: cover;
             background-repeat: no-repeat;
             padding-bottom: 1000px;
        }
        table{
            color: white;
            font-size: 18px;
        }
        button{
            color: white;
        }
        h1{
            color: white;
        }
    </style>
</head>
<body>

{{-- JUDUL --}}
<h1 class="text-center pt-5">Tabel Penduduk</h1>
<hr width="100px" class="pb-5">


{{-- TABEL PENDUDUK --}}
    <div class="container">
         {{ csrf_field() }}
         <div class="table-responsive text-center">
                    <table class="table table-borderless" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">Gambar</th>
                                {{-- <th class="text-center">Id</th> --}}
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($penduduks as $item)
                        <tr class="item{{$item->id}}">
                            <td><img src="{{ asset("uploads/{$item->gambar}") }}" width="100px" height="100px" /></td>
                            {{-- <td>{{$item->id}}</td> --}}
                            <td style="vertical-align: middle;">{{$item->nama}}</td>
                            <td style="vertical-align: middle;">{{$item->jenis_kelamin}}</td>
                            <td style="vertical-align: middle;"><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                    data-name="{{$item->nama}}" data-nik="{{$item->nik}}" data-nokk="{{$item->no_kk}}" data-jeniskelamin="{{$item->jenis_kelamin}}" data-tempatlahir="{{$item->tempat_lahir}}" data-tanggallahir="{{$item->tanggal_lahir}}" data-alamat="{{$item->alamat}}" data-gambar="uploads/{{$item->gambar}}">
                                    <span class="glyphicon glyphicon-edit"></span> Ubah
                                </button>
                                <button class="delete-modal btn btn-danger"
                                    data-id="{{$item->id}}" data-name="{{$item->nama}}">
                                    <span class="glyphicon glyphicon-trash"></span> Hapus
                                </button></td>
                        </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </table>
                </div>
    </div>
{{-- TABEL PENDUDUK --}}

{{-- MODAL --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <span><button type="button" class="close" data-dismiss="modal">&times;</button></span>
                </div>
                <div class="modal-body">
                  <div id="modal-gambar">  
                    <center>
                        <div style="width:100px;height: 100px;text-align: center;position: relative" id="image">
                            <img style="border-radius: 50%;" width="100%" height="100%" id="preview_image"/>
                            <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                        </div>
                        <p class="mt-2">
                            <a href="javascript:changeProfile()" style="text-decoration: none; font-size: 12px;">
                                <i class="fa fa-camera upload-button"></i> Ganti Profil
                            </a>&nbsp;&nbsp;
                            <a href="javascript:removeFile()" style="text-decoration: none; color: red; font-size: 12px;">
                                <i class="fa fa-trash"></i> Hapus
                                
                            </a>
                        </p>
                        <input type="file" id="file" name="img" style="display: none"/>
                        
                    </center>
                  </div>  
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="name">Nama</label>
                            <div class="col-sm-10">
                                <input id="n" name="nama" type="text" class="form-control" id="name" placeholder="nama Anda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="nik">Nik</label>
                            <div class="col-sm-10">
                                <input name="nik" type="number" class="form-control" id="nik" placeholder="Nomor induk kependudukan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="no_kk">No. KK</label>
                            <div class="col-sm-10">
                                <input name="no_kk" type="number" class="form-control" id="no_kk" placeholder="Nomor kartu keluarga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="tempat_lahir">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="dd/mm/yy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5" for="gender">Jenis kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" class="form-control" id="gender">
                                <option disabled selected value>-- Pilih Jenis Kelamin</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5" for="alamat">Alamat Lengkap</label>
                            <div class="col-sm-10">
                                <textarea name="alamat_lengkap" class="form-control" id="alamat" rows="3" placeholder="alamat"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="deleteContent">
                        Apakah Anda yakin menghapus <b><span class="dname"></span></b> ? <span
                            class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Batal
                        </button>
                    </div>
                </div>
            </div>
          </div>
        </div>
{{-- MODAL --}}

{{-- SCRIPT --}}
        <script type="text/javascript">
            $(document).ready(function() {
              $(document).on('click', '.edit-modal', function() {
                    $('#modal-gambar').css('display', 'block');
                    $('#footer_action_button').text("Perbarui");
                    $('#footer_action_button').addClass('glyphicon-check');
                    $('#footer_action_button').removeClass('glyphicon-trash');
                    $('.actionBtn').addClass('btn-success');
                    $('.actionBtn').removeClass('btn-danger');
                    $('.actionBtn').addClass('edit');
                    $('.modal-title').text('Ubah');
                    $('.deleteContent').hide();
                    $('.form-horizontal').show();
                    $('#fid').val($(this).data('id'));
                    $('#n').val($(this).data('name'));
                    $('#nik').val($(this).data('nik'));
                    $('#no_kk').val($(this).data('nokk'));
                    $('#tempat_lahir').val($(this).data('tempatlahir'));
                    $('#tanggal_lahir').val($(this).data('tanggallahir'));
                    $('#gender').val($(this).data('jeniskelamin'));
                    $('#alamat').val($(this).data('alamat'));
                     var namagambar = ($(this).data('gambar'));
                    $('#preview_image').attr('src', namagambar);
                    $('#myModal').modal('show');
                });
                $(document).on('click', '.delete-modal', function() {
                    $('#modal-gambar').css('display', 'none');
                    $('#footer_action_button').text(" Hapus");
                    $('#footer_action_button').removeClass('glyphicon-check');
                    $('#footer_action_button').addClass('glyphicon-trash');
                    $('.actionBtn').removeClass('btn-success');
                    $('.actionBtn').addClass('btn-danger');
                    $('.actionBtn').addClass('delete');
                    $('.modal-title').text('Hapus');
                    $('.did').text($(this).data('id'));
                    $('.deleteContent').show();
                    $('.form-horizontal').hide();
                    $('.dname').html($(this).data('name'));
                    $('#myModal').modal('show');
                });

                $('.modal-footer').on('click', '.delete', function() {
                    var id = $('.did').text();
                    console.log(id);
                    var token = $(this).data("token");
                            $.ajaxSetup({
                              headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                            });
                            $.ajax(
                            {
                                url: "http://localhost/formajax/public/user/delete/"+id,
                                type: 'delete',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': $('.did').text()
                                },
                                success: function(data) {
                                    $('.item' + $('.did').text()).remove();
                                }
                            });

                });
                $('.modal-footer').on('click', '.edit', function() {
                    var id = $('#fid').val();
                    $.ajax({
                        type: 'post',
                        url: 'http://localhost/formajax/public/user/edit/'+id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'gambar':$('#preview_image').val(),
                            'id': $("#fid").val(),
                            'nama': $('#n').val(),
                            'nik': $('#nik').val(),
                            'no_kk': $('#no_kk').val(),
                            'tempat_lahir': $('#tempat_lahir').val(),
                            'tanggal_lahir': $('#tanggal_lahir').val(),
                            'jenis_kelamin': $('#gender').val(),
                            'alamat': $('#alamat').val(),

                        },
                        success: function(data) {
                                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td><img width='100px' src=uploads/"+ data.gambar + "></td>  <td> " + data.nama + "</td><td>" + data.jenis_kelamin + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.nama + "' data-nik='" + data.nik + "' data-nokk='" + data.no_kk + "' data-tempatlahir='" + data.tempat_lahir + "' data-tanggallahir='" + data.tanggal_lahir + "'data-jeniskelamin='" + data.jenis_kelamin + "' data-alamat='" + data.alamat + "'><span class='glyphicon glyphicon-edit'></span> Ubah</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama + "' ><span class='glyphicon glyphicon-trash'></span> Hapus</button></td></tr>");
                                    }
                    });
                });
            });
{{-- SCRIPT --}}

        </script>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>        

</body>
</html>