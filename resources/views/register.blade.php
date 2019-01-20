<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
	<style type="text/css">
	.mycenter{
		margin: 0 auto;
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
					<form>
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="email" class="form-control" id="name" placeholder="nama anda">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Alamat E-mail</label>
							<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama@contoh.com">
						</div>
						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir</label>
							<input type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir">
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" id="tanggal_lahir" placeholder="dd/mm/yy">
						</div>
						<div class="form-group">
							<label for="gender">Jenis kelamin</label>
							<select class="form-control" id="gender">
								<option value="laki-laki">laki-laki</option>
								<option value="perempuan">perempuan</option>
							</select>
						</div>
					{{--  --}}
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" id="alamat" rows="3" placeholder="alamat"></textarea>
						</div>
					{{--  --}}


					{{-- tempat tinggal --}}
						<div class="form-group">
							<label for="provinsi">Provinsi</label>
							<select name="provinsi" id="provinsi" class="form-control input-lg dynamic" data-dependent="kota">
								<option value="">Pilih Provinsi</option>
								@foreach($provinsis as $provinsi)
								<option value="{{ $provinsi->id}}">{{ $provinsi->nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group" >
							<label for="kota">Kota</label>
							<select name="kota" id="kota" class="form-control input-lg dynamic" data-dependent="kecamatan">
								<option value="">Pilih Kota</option>
							</select>
						</div>
						<div class="form-group mb-5">
							<label for="gender">Kecamatan</label>
							<select name="kecamatan" id="kecamatan" class="form-control input-lg">
								<option value="">Pilih Kecamatan</option>
							</select>
						</div>
					{{-- tempat tinggal --}}


						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>	
	</section>
	<div id="destination"></div>
	<script>

		var homeUrl = 'http://localhost/formajax/public';
		$(document).ready(function(){

			$('#provinsi').change(function(){
				$('#kota').val('');
				$('#kota').html('<option value="">Pilih Kota</option>');
				$('#kecamatan').html('<option value="">Pilih kecamatan</option>');
				$('#kelurahan').html('<option value="">Pilih kelurahan</option>');
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
					console.log(toAppend);
					$('#kota').append(toAppend);
				});
			});

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
					console.log(kecamatans);
					var toAppend = '';
					for(var i=0;i<kecamatans.length;i++){
						toAppend += '<option value="'+kecamatans[i]['id']+'">'+kecamatans[i]['nama']+'</option>';
					}
					console.log(toAppend);
					$('#kecamatan').append(toAppend);
				});
			});

			$('#kecamatan').change(function(){
				$('#kelurahan').val('');
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