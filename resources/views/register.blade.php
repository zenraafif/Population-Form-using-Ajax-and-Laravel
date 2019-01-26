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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<style type="text/css">
	
	.mycenter{
		margin: 0 auto;
	}
	body{
		background: linear-gradient(to bottom left, #0033cc 0%, #66ccff 101%);
		color: white;
	}
	#pic{
		display: none;
	}

	.newbtn{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	
</script>
</head>
<body>

	<section>
		<div class="container pt-5">
			<h2 align="center">Halaman Pendaftaran</h2>
			
			{{-- COBA UPLOAD --}}
			<center>
				<br/><br/>
				<div style="width:250px;height: 250px;text-align: center;position: relative" id="image">
					<img style="border-radius: 50%;" width="100%" height="100%" id="preview_image" src="{{asset('images/no_avatar.jpg')}}"/>
					<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
				</div>
				<p class="mt-2">
					<a href="javascript:changeProfile()" style="text-decoration: none; color: white;">
						<button class="btn btn-secondary btn-sm"><i class="fa fa-camera upload-button"></i> Ganti Profil</button>
					</a>&nbsp;&nbsp;
					<a href="javascript:removeFile()" style="text-decoration: none;">
						<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>

					</a>
				</p>
				<input type="file" id="file" name="img" style="display: none"/>
			</center>
			{{-- COBA UPLOAD --}}

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					<form method="POST" class="form_penduduk" id="form">
						<input type="hidden" id="file_name" name="gambar" />
						<div class="form-group has-feedback{{$errors->has('nama') ? 'has-error' : ''}}">
							<label for="name">Nama</label>
							<input name="nama" type="text" class="form-control" id="name" placeholder="nama Anda">
							@if ($errors->has('nama'))
							<span class="help-block">
								<p>{{$errors->first('nama')}}</p>
							</span>
							@endif
							
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
								<option disabled selected value>-- Pilih Jenis Kelamin --</option>
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


						{{-- alamat --}}
						<div class="form-group">
							<label for="alamat">Alamat Lengkap</label>
							<textarea name="alamat_lengkap" class="form-control" id="alamat" rows="3" placeholder="alamat"></textarea>
						</div>
						{{-- alamat --}}
						{{ csrf_field() }}
					</form>
					<span id="validation-errors"></span>
					<input class="btn btn-success " type="button" name="kirim" class="kirim" id="kirim" value="kirim">
				</div>
			</div>
		</div>	
	</section>
	<i id="loadings" class="loading fa fa-spinner fa-spin fa-3x fa-fw" style="display: none"></i>
	<div id="destination"></div>
	<div class="mb-5 pb-5"></div>


	<script>

		var homeUrl = 'http://localhost/formajax/public';
		$(document).ready(function(){

// PARENT SELECT
				// SELECT KOTA
				$('#provinsi').change(function(){
					$('#kota').val('');
					$('#kota').html('<option value="" disabled selected value>-- Pilih Kota --</option>');
					$('#kecamatan').html('<option value=""disabled selected value>-- Pilih kecamatan --</option>');
					$('#kelurahan').html('<option value=""disabled selected value>-- Pilih kelurahan --</option>');
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
					$('#kecamatan').html('<option value=""disabled selected value>-- Pilih kecamatan --</option>');
					$('#kelurahan').html('<option value=""disabled selected value>-- Pilih Kelurahan --</option>');

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
					$('#kelurahan').html('<option value="" disabled selected value>-- Pilih kelurahan --</option>');

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
	$('small').text('');
	$("#loadings").css('display', 'block');
	$.ajax({
		type: "POST",
		url: 'http://localhost/formajax/public/tambahPenduduk',
		data : data,
		beforeSend:function(){
			$(".loading").css('display', 'block');
		},
		complete: function(){
			$(".loading").hide();
		},
		success:function(result){  
			if(result){
				$('#preview_image').attr('src', '{{asset('images/no_avatar.jpg')}}');
				$('#kota').val('');
				$('option:selected').val('');
				$('#provinsi').val('');
				$('#kecamatan').val('');
				$('#kelurahan').val('');
				$('#gender').val('');
				$('form input').val('');
				$('textarea').val('');
				$('#validation-errors').html('');

				var ask = window.confirm("Berhasil !!  Mau ke halaman Daftar penduduk?");
				if (ask) {
					window.location.href = "http://localhost/formajax/public/penduduk";

				}

			}else{

				alert("Registrasi Gagal !");
      	               // window.location.href = "http://localhost/formajax/public/penduduk";

      	           }

      	       },
      	       error: function (xhr) {
      	       	$('#validation-errors').html('');
      	       	$.each(xhr.responseJSON.errors, function(key,value) {
      	       		var input = 'input[name=' + key + ']';
      	       		console.log(input);
      	       		$(input).after('<small style="color:white; background-color:#dc3545; padding: 2px; border-radius: 2px">'+value+'</small>');
      	       	}); 
      	       },

      	   })
});


});

// $.each(data.responseJSON, function (key, value) {
//     var input = '#formArticle input[name=' + key + ']';
//     $(input + '+span>strong').text(value);
//     $(input).parent().parent().addClass('has-error');
// });
// 
// 
// $('#validation-errors').html('');
 	// $.each(xhr.responseJSON.errors, function(key,value) {
 	// 	$('#validation-errors').append('<small class="alert-danger"> *'+key+'</small><br>');
 	// }); 

// COBA
function changeProfile() {
	$('#file').click();
}
$('#file').change(function () {
	if ($(this).val() != '') {
		upload(this);

	}
});
function upload(img) {
	var form_data = new FormData();
	form_data.append('file', img.files[0]);
	form_data.append('_token', '{{csrf_token()}}');
	$('#loading').css('display', 'block');
	$.ajax({
		url: "{{url('ajax-image-upload')}}",
		data: form_data,
		type: 'POST',
		contentType: false,
		processData: false,
		success: function (data) {
		            	// console.log(data);
		            	if (data.fail) {
		            		$('#preview_image').attr('src', '{{asset('images/no_avatar.jpg')}}');
		            		alert(data.errors['file']);
		            	}
		            	else {
		            		$('#file_name').val(data);
		            		$('#preview_image').attr('src', '{{asset('uploads')}}/' + data);
		            	}
		            	$('#loading').css('display', 'none');
		            },
		            error: function (xhr, status, error) {
		            	alert(xhr.responseText);
		            	$('#preview_image').attr('src', '{{asset('images/no_avatar.jpg')}}');
		            }
		        });
}
function removeFile() {
	if ($('#file_name').val() != '')
		if (confirm('Hapus foto profil?')) {
			$('#loading').css('display', 'block');
			var form_data = new FormData();
			form_data.append('_method', 'DELETE');
			form_data.append('_token', '{{csrf_token()}}');
			$.ajax({
				url: "ajax-remove-image/" + $('#file_name').val(),
				data: form_data,
				type: 'POST',
				contentType: false,
				processData: false,
				success: function (data) {
					$('#preview_image').attr('src', '{{asset('images/no_avatar.jpg')}}');
					$('#file_name').val('');
					$('#loading').css('display', 'none');
				},
				error: function (xhr, status, error) {
					alert(xhr.responseText);
				}
			});
		}
	}
// COBA




$(document).ready(function () {

	$("#form").validate({
		ignore: ":hidden",
		rules: {
			nama: {
				required: true,
				minlength: 3,
				maxlength: 25
			},
			nik: {
				required: true,
				minlength: 3,
				maxlength: 25
			},
			no_kk: {
				required: true,
				minlength: 3,
				maxlength: 25
			},
			tempat_lahir: {
				required: true
			},
			tanggal_lahir: {
				required: true
			},
			jenis_kelamin: {
				required: true
			},
			alamat_lengkap: {
				required: true,
				maxlength: 25
			}
		},
		submitHandler: function (form) {
             alert('valid form submission'); // for demo
             $.ajax({
             	type: "POST",
             	url: 'http://localhost/formajax/public/tambahPenduduk',
             	data: $(form).serialize(),
             	// success: function () {
             	// 	$(form).html("<div id='message'></div>");
             	// 	$('#message').html("<h2>Your request is on the way!</h2>")
             	// 	.append("<p>someone</p>")
             	// 	.hide()
             	// 	.fadeIn(1500, function () {
             	// 		$('#message').append("<img id='checkmark' src='images/ok.png' />");
             	// 	});
             	// }
             });
             return false; 
         }

     });

});

// 
	// jQuery(function ($) {
	//     $('#form').validate({
	//         rules: {
	//             nama: {
	//                 required: true,
	//                 minlength: 2,
	//                 maxlength: 20,
	//                 lettersonly: true
	//             },
	//             nik: {
	//                 required: true,
	//                 minlength: 9,
	//                 nowhitespace: true
	//             },
	//             no_kk: {
	//                 required: true,
	//                 minlength : 9
	//             },
	//             tempat_lahir: {
	//                 required: true
	//                 // minlength: 10,
	//                 // maxlength: 13
	//                 // digits: true
	//             },
	//             alamat: {
	//                 required: true,
	//                 minlength: 10,
	//             },
	//             tanggal_lahir: {
	//                 required: true
	//                 // minlength: 6
	//                 // email: falase
	//             }
	//         },
	//         messages: {
	//             nama: {
	//                 required: "Tolong masukkan nama Anda",
	//                 minlength: "Nama harus lebih dari 2 karakter",
	//                 maxlength: "Nama harus kurang dari 20 karakter",
	//                 lettersonly: "Nama hanya mengandung huruf"
	//             },
	//             nik: {
	//                 required: "Masukkan NIK Anda",
	//                 minlength: "NIK harus 9 karakter",
	//                 nowhitespace: "tidak boleh mengandung spasi"
	//             },
	//             no_kk: {
	//                 required: "masukkan nomor kk",
	//                 minlength: "nomor KK harus 10 karakter",
	//             },
	//             tempat_lahir: {
	//                 required: "Masukkan tanggal lahir Anda"
	//             },
	//             tanggal_lahir: {
	//                 required: "Masukkan tanggal lahir Anda"
	//                 // minlength: "Address should be more than 10 characters",
	//             },
	//             alamat: {
	//                 required: "Masukkan alamat Anda",
	//                 // minlength: "Password should be more than 6 characters",
	//                 // email: "Please enter a valid email address"
	//             }
	//         },
	//     });
	// });
</script>
</body>
</html>