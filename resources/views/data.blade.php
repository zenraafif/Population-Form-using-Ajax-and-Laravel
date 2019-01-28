@foreach($data as $row)
<tr class="item{{$row->id}} text-center">
            <td style="vertical-align: middle;">
                <img src="{{ asset("uploads/{$row->gambar}") }}" width="80px" height="80px" style="overflow: hidden;" />
            </td>
            {{-- <td>{{$row->id}}</td> --}}
            <td style="vertical-align: middle;">{{$row->nama}}</td>
            <td style="vertical-align: middle;">{{$row->jenis_kelamin}}</td>
            <td style="vertical-align: middle;"><button class="edit-modal btn btn-info btn-sm" data-id="{{$row->id}}"data-name="{{$row->nama}}" data-nik="{{$row->nik}}" data-nokk="{{$row->no_kk}}" data-jeniskelamin="{{$row->jenis_kelamin}}" data-tempatlahir="{{$row->tempat_lahir}}" data-tanggallahir="{{$row->tanggal_lahir}}" data-alamat="{{$row->alamat}}" data-gambar="{{$row->gambar}}">
                <span class="glyphicon glyphicon-edit"><i class="fas fa-edit"></i></span> Ubah
            </button>
            <button class="delete-modal btn btn-danger btn-sm"
            data-id="{{$row->id}}" data-name="{{$row->nama}}">
            <span class="glyphicon glyphicon-trash"><i class="fas fa-trash-alt"></i></span> Hapus
            </button></td>
       </tr>
@endforeach
<tr>
<td colspan="3" align="center" style="position: absolute; top: 900px">
  {!! $data->links() !!}
</td>
</tr>