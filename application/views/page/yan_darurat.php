<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Data Layanan Darurat</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Konten</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Layanan Darurat</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Layanan Darurat</div>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-right:0!important;margin-left:0!important;">
                    <div class="ml-auto mb-4">
                        <button class="btn btn-success" onclick="add_modal()"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Nomor Layanan</th>
                                <th>Alamat Layanan</th>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan Darurat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript::void(0);" id="formAdd" type="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="namaLayanan">Nama Layanan</label>
            <input type="text" class="form-control" id="" name="nama_layanan" placeholder="Nama Layanan">
        </div>
        <div class="form-group">
            <label for="nomorLayanan">Nomor Layanan</label>
            <input type="text" class="form-control" id="" name="nomor_layanan" placeholder="Nomor Layanan">
        </div>
        <div class="form-group">
            <label for="alamatLayanan">Alamat Layanan</label>
            <textarea name="alamat_layanan" class="form-control" id="" rows="5"></textarea>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit">
        <input type="hidden" name="id" id="id"/>
        <div class="form-group">
            <label for="namaLayanan">Nama Layanan</label>
            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan">
        </div>
        <div class="form-group">
            <label for="nomorLayanan">Nomor Layanan</label>
            <input type="text" class="form-control" id="nomor_layanan" name="nomor_layanan" placeholder="Nomor Layanan">
        </div>
        <div class="form-group">
            <label for="alamatLayanan">Alamat Layanan</label>
            <textarea name="alamat_layanan" class="form-control" id="alamat_layanan" rows="5"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="btnUbah">Ubah</button>
        </div>
		</form>
    </div>
  </div>
</div>