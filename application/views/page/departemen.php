<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Data Departemen</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Konten</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Departemen</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Departemen</div>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-right:0!important;margin-left:0!important;">
                    <div class="ml-auto mb-4">
                        <button class="btn btn-success" onclick="add_modal()"><i class="fa fa-plus"></i> Tambah Departemen</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Departemen</th>
                                <th>Deskripsi</th>
                                <th>Kategori Artikel</th>
                                <th>Dibuat Pada</th>
                                <th>Logo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>1</td>
                                <td>Kader Demokrat Solo Raya Turun ke Jalan Teriakkan Tolak-Ganyang Moeldoko</td>
                                <td>PEOPLE</td>
                                <td>10 Maret 2021</td>
                                <td>
                                    <a href="javascript::void(0)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript::void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript::void(0);" id="formAdd" type="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_dept">Nama Departemen</label>
            <input type="text" class="form-control" id="" name="nama_dept" placeholder="Nama Departemen">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="kategoriAr">Kategori Untuk Artikel</label>
          <select name="kategori_ar_id[]" id="kategori_ar" class="form-control" style="width:100%" multiple="multiple">
          </select>
        </div>
        <div class="form-group">
            <label for="gambar">Logo Departemen</label>
            <input type="file" class="form-control" id="" name="gambar" aria-describedby="gambarAdd">
            <small id="gambarAdd" class="form-text text-muted">
              Disarankan gambar yang berukuran 256x256 dan berresolusi hd
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

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Ubah Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit">
        <input type="hidden" name="id" id="id"/>
        <div class="form-group">
            <label for="nama_dept">Nama Departemen</label>
            <input type="text" class="form-control" id="nama_dept" name="nama_dept" placeholder="Nama Departemen">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="kategoriAr">Kategori Untuk Artikel</label>
          <select name="kategori_ar_id[]" id="kategori_ar_e" class="form-control" style="width:100%" multiple="multiple">
          </select>
        </div>
        <div class="form-group">
            <label for="gambar">Logo Departemen</label>
            <input type="file" class="form-control" id="" name="gambar" aria-describedby="gambarEdit">
            <small id="gambarEdit" class="form-text text-muted">
              Disarankan gambar yang berukuran 256x256 dan berresolusi hd
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

<!-- Modal Detail-->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Detail Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="judul">Judul Departemen</label>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Departemen</label>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Departemen</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>