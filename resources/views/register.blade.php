<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - onChange event using ajax dropdown list</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>


<div class="container">
  <h1>Laravel 5 - Dynamic Dependant Select Box using JQuery Ajax Example</h1>


  {!! Form::open() !!}


    <div class="form-group">
      <label>Select Country:</label>
      {!! Form::select('id_country',[''=>'--- Select Country ---']+$countries,null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
      <label>Select State:</label>
      {!! Form::select('id_state',[''=>'--- Select State ---'],null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
      <button class="btn btn-success" type="submit">Submit</button>
    </div>


  {!! Form::close() !!}


</div>


<script type="text/javascript">
  $("select[name='id_country']").change(function(){
      var id_country = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-ajax') ?>",
          method: 'POST',
          data: {id_country:id_country, _token:token},
          success: function(data) {
            $("select[name='id_state'").html('');
            $("select[name='id_state'").html(data.options);
          }
      });
  });
</script>


</body>
</html>


{{-- <!DOCTYPE html>
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
			<div class="row mycenter">
				<h2>Halaman Pendaftaran</h2>
			</div>
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
					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Example select</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>1</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlSelect2">Example multiple select</label>
					    <select multiple class="form-control" id="exampleFormControlSelect2">
					      <option>1</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Example textarea</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					</form>
				</div>
			</div>
		</div>	
	</section>
	<div id="destination"></div>
<script type="text/javascript">	
	$(document).ready(function() {

	  $('#dropdownMenu').on('click', function() {

	    // Add loading state
	    $('.testdropdown').html('Loading please wait ...');

	    // Set request
	    var request = $.get('/channels/fetch');

	    // When it's done
	    request.done(function(response) {
	      console.log(response);
	    });


	  });

	});
</script> 
</body>
</html> --}}