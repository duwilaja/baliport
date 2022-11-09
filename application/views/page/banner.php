<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Galery</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Konten</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galery</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Foto</div>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-right:0!important;margin-left:0!important;">
                    <div class="ml-auto mb-4">
                        <button class="btn btn-success" onclick="add_modal()"><i class="fa fa-plus"></i> Tambah Foto</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table-wrapper -->
        </div>
        <!-- section-wrapper -->
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Video</div>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-right:0!important;margin-left:0!important;">
                    <div class="ml-auto mb-4">
                        <button class="btn btn-success" onclick="add_modal2()"><i class="fa fa-plus"></i> Tambah Video</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabel2" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Tag</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript::void(0);" id="formAdd" type="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="" name="title" placeholder="Judul Banner">
        </div>
        <div class="form-group">
            <label for="kategori">Sub Judul</label>
            <input type="text" class="form-control" id="" name="subtitle" placeholder="Sub Judul Banner">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="" name="image" aria-describedby="gambarAdd">
            <small id="gambarAdd" class="form-text text-muted">
              Disarankan gambar yang berukuran 1920x700 dan berresolusi hd
            </small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Simpan</button>
      </div>
		</form>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formAdd2" type="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="" name="nama" placeholder="Nama">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="" name="judul" placeholder="Judul">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="tag">Tag</label>
                  <input type="text" class="form-control" id="" name="tag" placeholder="Tag">
              </div>
            </div>
          </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"></textarea>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="link">Link Video</label>
                <input type="text" class="form-control" id="" name="link" placeholder="Link Video">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="gambar">Gambar Thumbnail</label>
                <input type="file" class="form-control" id="" name="thumbnail" aria-describedby="thumbnailAdd">
                <small id="thumbnailAdd" class="form-text text-muted">
                  Disarankan gambar yang berukuran 360x293 dan berresolusi hd
                </small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnSave2">Simpan</button>
      </div>
		</form>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Ubah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit">
        <input type="hidden" name="id" id="id"/>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Banner">
        </div>
        <div class="form-group">
            <label for="subjudul">Sub Judul</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Judul Banner">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="image" aria-describedby="gambarEdit">
            <small id="gambarEdit" class="form-text text-muted">
              Disarankan gambar yang berukuran 1920x700 dan berresolusi hd
            </small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnUbah">Ubah</button>
      </div>
		</form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit2" type="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-4">
              <input type="hidden" name="idv" id="idv"/>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="tag">Tag</label>
                  <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag">
              </div>
            </div>
          </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="link">Link Video</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Link Video">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="gambar">Gambar Thumbnail</label>
                <input type="file" class="form-control" id="" name="thumbnail" aria-describedby="thumbnailAdd">
                <small id="thumbnailAdd" class="form-text text-muted">
                  Disarankan gambar yang berukuran 360x293 dan berresolusi hd
                </small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnUbah2">Ubah</button>
      </div>
		</form>
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
          <span aria-hidden="true">&times;</span>
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
</div>