<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penduduk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

</head>
<body>   
      <div class="container">
           {{ csrf_field() }}
        <div class="table-responsive text-center">
                <table class="table table-borderless" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    @foreach($penduduks as $item)
                    <tr class="item{{$item->id}}">
                        <td>{{$item->id}}</td>
                        <td>{{$item->nama}}</td>
                        <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-name="{{$item->nama}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                            <button class="delete-modal btn btn-danger" data-id="{{$item->id}}"
                                data-name="{{$item->nama}}" data-token="{{ csrf_token() }}">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n">
                            </div>
                        </div>
                    </form>
                    <div class="deleteContent">
                        Are you Sure you want to delete <span class="dname"></span> ? <span
                            class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
          </div>
        </div>

          <script type="text/javascript">
            $(".delete-modal").click(function(){
                    var id = $(this).data("id");
                    console.log(id);
                    var token = $(this).data("token");
                    $.ajax(
                    {
                        url: "user/delete/"+id,
                        type: 'POST',
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                        },
                        success: function ()
                        {
                            console.log("it Work");
                        }
                    });

                    console.log("It failed");
                });


            // $(document).ready(function() {
            //   $(document).on('click', '.edit-modal', function() {
            //         $('#footer_action_button').text("Update");
            //         $('#footer_action_button').addClass('glyphicon-check');
            //         $('#footer_action_button').removeClass('glyphicon-trash');
            //         $('.actionBtn').addClass('btn-success');
            //         $('.actionBtn').removeClass('btn-danger');
            //         $('.actionBtn').addClass('edit');
            //         $('.modal-title').text('Edit');
            //         $('.deleteContent').hide();
            //         $('.form-horizontal').show();
            //         $('#fid').val($(this).data('id'));
            //         $('#n').val($(this).data('name'));
            //         $('#myModal').modal('show');
            //     });
            //     $(document).on('click', '.delete-modal', function() {
            //         $('#footer_action_button').text(" Delete");
            //         $('#footer_action_button').removeClass('glyphicon-check');
            //         $('#footer_action_button').addClass('glyphicon-trash');
            //         $('.actionBtn').removeClass('btn-success');
            //         $('.actionBtn').addClass('btn-danger');
            //         $('.actionBtn').addClass('delete');
            //         $('.modal-title').text('Delete');
            //         $('.did').text($(this).data('id'));
            //         $('.deleteContent').show();
            //         $('.form-horizontal').hide();
            //         $('.dname').html($(this).data('name'));
            //         $('#myModal').modal('show');
            //     });

            //     $('.modal-footer').on('click', '.edit', function() {

            //         $.ajax({
            //             type: 'post',
            //             url: 'http://localhost/formajax/public/edit-penduduk',
            //             data: {
            //                 '_token': $('input[name=_token]').val(),
            //                 'id': $("#fid").val(),
            //                 'name': $('#n').val()
            //             },
            //             success: function(data) {
            //                 $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            //             }
            //         });
            //     });
            //     $("#add").click(function() {

            //         $.ajax({
            //             type: 'post',
            //             url: 'http://localhost/formajax/public/penduduk/addItem',
            //             data: {
            //                 '_token': $('input[name=_token]').val(),
            //                 'name': $('input[name=name]').val()
            //             },
            //             success: function(data) {
            //                 if ((data.errors)){
            //                   $('.error').removeClass('hidden');
            //                     $('.error').text(data.errors.name);
            //                 }
            //                 else {
            //                     $('.error').addClass('hidden');
            //                     $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            //                 }
            //             },

            //         });
            //         $('#name').val('');
            //     });
            //     $('.modal-footer').on('click', '.delete', function() {
            //         $.ajax({
            //             type: 'post',
            //             url: 'http://localhost/formajax/public/hapus-penduduk',
            //             data: {
            //                 '_token': $('input[name=_token]').val(),
            //                 'id': $('.did').text()
            //             },
            //             success: function(data) {
            //                 $('.item' + $('.did').text()).remove();
            //             }
            //         });
            //     });
            // }); 
          </script>
    </body>
</html