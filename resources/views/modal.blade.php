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
                  <input type="hidden" id="file_name" name="gambar" />
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
                      <span class='glyphicon glyphicon-remove'><i class="fas fa-times"></i></span> Batal
                  </button>
              </div>
          </div>
      </div>
  </div>
  </div>
  {{-- MODAL --}}