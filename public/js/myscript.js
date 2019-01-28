$(document).ready(function(){

 function clear_icon()
 {
  $('#id_icon').html('');
  $('#post_title_icon').html('');
}

function fetch_data(page, sort_type, sort_by, query)
{
  $.ajax({
   url:"http://localhost/formajax/public/penduduk/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   success:function(data)
   {
    $('tbody').html('');
    $('tbody').html(data);
  }
})
}

$(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  fetch_data(page, sort_type, column_name, query);
});

$(document).on('click', '.sorting', function(){
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
 }
 if(order_type == 'desc')
 {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
 }
 $('#hidden_column_name').val(column_name);
 $('#hidden_sort_type').val(reverse_order);
 var page = $('#hidden_page').val();
 var query = $('#serach').val();
 fetch_data(page, reverse_order, column_name, query);
});

$(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();

  var query = $('#serach').val();

  $('li').removeClass('active');
  $(this).parent().addClass('active');
  fetch_data(page, sort_type, column_name, query);
});

});





// myscript
// 
// 
$(document).ready(function() {
  $(document).on('click', '.edit-modal', function() {
    $('#modal-gambar').css('display', 'block');
    $('#footer_action_button').text("Perbarui");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('#footer_action_button').html('<i class="fas fa-check"></i>Perbarui');
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
    var namagambar = 'uploads/'+($(this).data('gambar'));
    $('#preview_image').attr('src', namagambar);
    $('#file_name').val($(this).data('gambar'));
    $('#myModal').modal('show');
  });
  $(document).on('click', '.delete-modal', function() {
    $('#modal-gambar').css('display', 'none');
    $('#footer_action_button').text(" Hapus");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('#footer_action_button').html('<i class="fas fa-trash-alt"></i>Hapus');
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
        'gambar':$('#file_name').val(),
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
        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td style='vertical-align: middle;'><img  width='80px' height='80px' style='vertical-align: middle;' src=uploads/"+ data.gambar + "></td>  <td  style='vertical-align: middle;'> " + data.nama + "</td><td style='vertical-align: middle;'>" + data.jenis_kelamin + "</td><td style='vertical-align: middle;'><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.nama + "' data-nik='" + data.nik + "' data-nokk='" + data.no_kk + "' data-tempatlahir='" + data.tempat_lahir + "' data-tanggallahir='" + data.tanggal_lahir + "'data-jeniskelamin='" + data.jenis_kelamin + "' data-alamat='" + data.alamat + "' data-gambar='" + data.gambar + "'><span class='glyphicon glyphicon-edit'><i class='fas fa-edit'></i></span> Ubah</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.nama + "' ><span class='glyphicon glyphicon-trash'><i class='fas fa-trash-alt'></i></span> Hapus</button></td></tr>");
      }
    });
  });
});
{{-- SCRIPT --}}

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