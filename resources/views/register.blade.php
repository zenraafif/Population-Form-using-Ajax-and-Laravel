<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
	<style type="text/css">
	.mycenter{
		margin: 0 auto;
	}
	body{
		background: linear-gradient(to bottom left, #0033cc 0%, #66ccff 101%);
		color: white;
	}
</style>
</head>
<body>
	<section>
		<div class="container pt-5">
			
			<h2 align="center">Halaman Pendaftaran</h2>
			
			<div class="row">
				<div class="mb-2 mycenter" >
					<img src="{{ asset('images/profile.png') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form method="POST" class="form_penduduk">
						<div class="form-group">
							<label for="name">Nama</label>
							<input name="nama" type="text" class="form-control" id="name" placeholder="nama Anda">
						</div>
						<div class="form-group">
							<label for="nik">Nik</label>
							<input name="nik" type="number" class="form-control" id="nik" placeholder="Nomor induk kependudukan">
						</div>
						<div class="form-group">
							<label for="no_kk">No. KK</label>
							<input name="no_kk" type="number" class="form-control" id="no_kk" placeholder="Nomor kartu keluarga">
						</div>
						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir</label>
							<input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir">
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir</label>
							<input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="dd/mm/yy">
						</div>
						<div class="form-group">
							<label for="gender">Jenis kelamin</label>
							<select name="jenis_kelamin" class="form-control" id="gender">
								<option disabled selected value>-- Pilih Jenis Kelamin</option>
								<option value="laki-laki">laki-laki</option>
								<option value="perempuan">perempuan</option>
							</select>
						</div>


					{{-- tempat tinggal --}}
						<div class="form-group">
							<label for="provinsi">Provinsi</label>
							<select name="provinsi" id="provinsi" class="form-control input-lg dynamic" data-dependent="kota">
								<option value="" disabled selected value>-- Pilih Provinsi --</option>
								@foreach($provinsis as $provinsi)
								<option value="{{ $provinsi->id}}">{{ $provinsi->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group" >
							<label for="kota">Kota</label>
							<select name="kota" id="kota" class="form-control input-lg dynamic" data-dependent="kecamatan">
								<option value="" disabled selected value>-- Pilih Kota --</option>
							</select>
						</div>
						<div class="form-group">
							<label for="gender">Kecamatan</label>
							<select name="kecamatan" id="kecamatan" class="form-control input-lg">
								<option value="" disabled selected value>-- Pilih Kecamatan --</option>
							</select>
						</div>
						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<select name="kelurahan" id="kelurahan" class="form-control input-lg">
								<option value="" disabled selected value>-- Pilih Kelurahan --</option>
							</select>
						</div>
					{{-- tempat tinggal --}}


					{{--  --}}
						<div class="form-group">
							<label for="alamat">Alamat Lengkap</label>
							<textarea name="alamat_lengkap" class="form-control" id="alamat" rows="3" placeholder="alamat"></textarea>
						</div>
					{{--  --}}
						{{ csrf_field() }}
					</form>
						<input class="btn btn-success " type="button" name="kirim" class="kirim" id="kirim" value="kirim">
				</div>
			</div>
		</div>	
	</section>
	<span class="loading"></span>
	<div id="destination"></div>
	<div class="mb-5 pb-5"></div>


	<script>

		var homeUrl = 'http://localhost/formajax/public';
		$(document).ready(function(){

// PARENT SELECT
				// SELECT KOTA
					$('#provinsi').change(function(){
						$('#kota').val('');
						$('#kota').html('<option value="">-- Pilih Kota --</option>');
						$('#kecamatan').html('<option value="">-- Pilih kecamatan --</option>');
						$('#kelurahan').html('<option value="">-- Pilih kelurahan --</option>');
						$('#kecamatan').val('');
						$('#kelurahan').val('');

						var id_provinsi = $('#provinsi').val();

						$.ajax({
						  url: 'http://localhost/formajax/public/kota/provinsi/'+id_provinsi,
						}).done(function(data) {
							kotas = JSON.parse(data);//rubah data dari string ke json

							var toAppend = '';
							for(var i=0;i<kotas.length;i++){
								toAppend += '<option value="'+kotas[i]['id']+'">'+kotas[i]['nama']+'</option>';
							}
							// console.log(toAppend);
							$('#kota').append(toAppend);
						});
					});
				// SELECT KOTA
				
				//SELECT KECAMATAN 
					$('#kota').change(function(){
						$('#kecamatan').val('');
						$('#kelurahan').val('');
						$('#kecamatan').html('<option value="">Pilih kecamatan</option>');
						$('#kelurahan').html('<option value="">Pilih Kelurahan</option>');

						var id_kota = $('#kota').val();

						$.ajax({
						  url: 'http://localhost/formajax/public/kecamatan/kota/'+id_kota,
						}).done(function(data) {
							kecamatans = JSON.parse(data);//rubah data dari string ke json
							// console.log(kecamatans);
							var toAppend = '';
							for(var i=0;i<kecamatans.length;i++){
								toAppend += '<option value="'+kecamatans[i]['id']+'">'+kecamatans[i]['nama']+'</option>';
							}
							// console.log(toAppend);
							$('#kecamatan').append(toAppend);
						});
					});
				// SELECT KECAMATAN
				
				// SELECT KELURAHAN
					$('#kecamatan').change(function(){
						$('#kelurahan').val('');
						$('#kelurahan').html('<option value="">-- Pilih kelurahan --</option>');

						var id_kecamatan = $('#kecamatan').val();


						$.ajax({
							url: 'http://localhost/formajax/public/kelurahan/kecamatan/'+id_kecamatan,
						}).done(function(data){
							kelurahans = JSON.parse(data);
							console.log(kelurahans);

							var toAppend='';
							for (var i = 0; i < kelurahans.length; i++) {
								toAppend += '<option value="'+kelurahans[i]['id']+'">'+kelurahans[i]['nama']+'</option>';
							}
							$('#kelurahan').append(toAppend);
						})
					});
				// SELECT KELURAHAN
// PARENT SELECT

			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			
			$("#kirim").click(function() {
			    var data = $('.form_penduduk').serialize();

			    $.ajax({
			        type: "POST",
			        url: 'http://localhost/formajax/public/tambahPenduduk',
			        data : data,
			        beforeSend:function(){
                    $(".loading").html("Please wait....");
                  	},
                  	complete: function(){
                  	     $(".loading").hide();
                  	   },
                  	success:function(result){  
      	             if(result){
      	               
      	               alert("Selamat, resgistari sukses");
      	               window.location.href = "http://example.com/index.php";
      	               
      	             }else{
      	               
      	               alert("Registrasi sukses !");
      	               // window.location.href = "http://localhost/formajax/public/penduduk";
      	               $('#kota').val('');
      	               $('option:selected').val('');
      	               $('#provinsi').val('');
      	               $('#kecamatan').val('');
      	               $('#kelurahan').val('');
      	               $('#gender').val('');
      	               $('form input').val('');
      	               $('textarea').val('');

      	             }
      	             
      	           },

			    })
			});
			

		});
	</script>
</body>
</html>
{{-- <script type="text/javascript">	
	$(document).ready(function() {

	  $('#dropdownMenu').on('click', function() {

	    // Add loading kota
	    $('.testdropdown').html('Loading please wait ...');

	    // Set request
	    var request = $.get('/channels/fetch');

	    // When it's done
	    request.done(function(response) {
	      console.log(response);
	    });


	  });

	});
</script>  --}}