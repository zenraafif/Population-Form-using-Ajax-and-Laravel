{{-- JUDUL --}}
<h1 class="text-center pt-5">Tabel Penduduk</h1>
<hr width="100px" class="pb-5">
<div class="table-responsive">
    <table class="table table-borderless" id="table">
        <thead>
            <tr>
                <th class="text-center">Profil</th>
                {{-- <th class="text-center">Id</th> --}}
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>


        @if ($post->count() > 0)
        @foreach($post as $item)
        <tr class="item{{$item->id}}">
            <td>
                <img src="{{ asset("uploads/{$item->gambar}") }}" width="80px" height="80px" style="overflow: hidden;" />
            </td>
            {{-- <td>{{$item->id}}</td> --}}
            <td style="vertical-align: middle;">{{$item->nama}}</td>
            <td style="vertical-align: middle;">{{$item->jenis_kelamin}}</td>
            <td style="vertical-align: middle;"><button class="edit-modal btn btn-info btn-sm" data-id="{{$item->id}}"data-name="{{$item->nama}}" data-nik="{{$item->nik}}" data-nokk="{{$item->no_kk}}" data-jeniskelamin="{{$item->jenis_kelamin}}" data-tempatlahir="{{$item->tempat_lahir}}" data-tanggallahir="{{$item->tanggal_lahir}}" data-alamat="{{$item->alamat}}" data-gambar="{{$item->gambar}}">
                <span class="glyphicon glyphicon-edit"><i class="fas fa-edit"></i></span> Ubah
            </button>
            <button class="delete-modal btn btn-danger btn-sm"
            data-id="{{$item->id}}" data-name="{{$item->nama}}">
            <span class="glyphicon glyphicon-trash"><i class="fas fa-trash-alt"></i></span> Hapus
            </button></td>
       </tr>

     @endforeach
     @else
     <tr>
         <td>Tidak ada data</td>
     </tr>
     @endif

  </table>
</div>
<div>{{ $post->links() }}</div>