<div class="container">
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Tentang</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Konten</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tentang</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
          <div class="card-title">Data Tentang</div>
          <div class="card-options ">
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
          </div>
      </div>
      <div class="card-body">
          <div class="row" style="margin-right:0!important;margin-left:0!important;">
            <div class="ml-auto mb-4">
              <button class="btn btn-success" onclick="addModal()"><i class="fa fa-plus"></i> Tambah</button>
            </div>
          </div>
          <div class="table-responsive">
          <table id="dataTbl_tentang" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>DESKRIPSI</th>
                <th>GAMBAR</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td>1</td>
                <td>Tentang Kami</td>
                <td>Kami Adalah</td>
                <td><img src="" alt="Gambar Tidak Muncul"></td>
              </tr> -->
            </tbody>
          </table>
          </div>
      </div>
      <!-- table-wrapper -->
    </div>
    <!-- section-wrapper -->
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tentang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript::void(0);" id="formAdd" type="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="" name="judul" placeholder="Judul">
        </div>
        <div class="form-group">
            <label for="judul">Deskripsi</label>
            <input type="text" class="form-control" id="" name="deskripsi" placeholder="Deskripsi">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="" name="image" aria-describedby="gambarAdd">
            <small id="gambarAdd" class="form-text text-muted">
              Disarankan gambar yang berukuran 1920x700 dan berresolusi hd
            </small>
        </div>
      </form></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Simpan</button>
      </div>
		
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Ubah Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label for="judul">Judul Banner</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Banner">
        </div>
        <div class="form-group">
            <label for="subjudul">Sub Judul Banner</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Judul Banner">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Artikel</label>
            <input type="file" class="form-control" id="gambar" name="image" aria-describedby="gambarEdit">
            <small id="gambarEdit" class="form-text text-muted">
              Disarankan gambar yang berukuran 1920x700 dan berresolusi hd
            </small>
        </div>
      </form></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnUbah">Ubah</button>
      </div>
		
    </div>
  </div>
</div>

<!-- Modal Detail-->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Detail Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="judul">Judul Artikel</label>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Artikel</label>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Artikel</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>				</div>