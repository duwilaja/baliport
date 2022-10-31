<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Konten</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Event</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Event</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Event</div>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-right:0!important;margin-left:0!important;">
                    <div class="ml-auto mb-4">
                        <button class="btn btn-success" onclick="add_modal()"><i class="fa fa-plus"></i> Tambah Event</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Event</th>
                                <th>Deskripsi Event</th>
                                <th>Lokasi</th>
                                <th>Koordinat</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>File Event</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript::void(0);" id="formAdd" type="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="judul">Judul Event</label>
                  <input type="text" class="form-control" id="" name="judul" placeholder="Judul Event">
              </div>
            </div>
          </div>        
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                  <label for="tanggalStart">Tanggal Mulai</label>
                  <input type="date" class="form-control" name="tgl_start" placeholder="" onchange="sts_e(this.value,'#sts_a')">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="tanggalEnd">Tanggal Selesai</label>
                  <input type="date" class="form-control" id="" onchange="cek_tgl(this.value)" name="tgl_end" placeholder="">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="jamStart">Jam Mulai</label>
                  <input type="time" class="form-control" id="" name="jam_start" placeholder="">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="jamEnd">Jam Selesai</label>
                  <input type="time" class="form-control" id="" name="jam_end" placeholder="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <style>
                  select[readonly] {
                    background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
                    pointer-events: none;
                    touch-action: none;
                  }
                </style>
                  <label for="status">Status Event</label>
                  <select name="status" id="sts_a" class="form-control" readonly="readonly" tabindex="-1" aria-disabled="true">
                    <option value="">status</option>
                    <option value="1">Akan Datang</option>
                    <option value="2">Sedang Berlangsung</option>
                    <option value="3">Yang Lalu</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                  <label for="Lokasi">Lokasi</label>
                  <input type="text" class="form-control" id="" name="lokasi" placeholder="Lokasi">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="Lat">Latitude</label>
                  <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="Lng">Longitude</label>
                  <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude">
              </div>
            </div>
            <div class="col-1 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker"></i></button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="deskripsi">Deskripsi Event</label>
                  <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" placeholder="Deskripsi Event"></textarea>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom:20px;">
              <div class="col-md-12">
              <div class="input-field">
                  <h5 style="margin-bottom:20px;" class="active">Photos</h5>
                  <div class="input-images" style="padding-top: .5rem;"></div>
              </div>
              </div>
          </div>
        <!-- <div class="form-group">
            <label for="gambar">Gambar Artikel</label>
            <input type="file" class="form-control" id="" name="gambar">
        </div> -->
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
        <h5 class="modal-title" id="editLabel">Ubah Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="formEdit">
        <input type="hidden" name="id" id="id"/>
        <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="judul">Judul Event</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Event">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                  <label for="tanggalStart">Tanggal Mulai</label>
                  <input type="date" class="form-control" id="tgl_start" name="tgl_start" placeholder="" onchange="sts_e(this.value,'#status')">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="tanggalEnd">Tanggal Selesai</label>
                  <input type="date" class="form-control" id="tgl_end" name="tgl_end" onchange="cek_tgl(this.value)" placeholder="">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="jamStart">Jam Mulai</label>
                  <input type="time" class="form-control" id="jam_start" name="jam_start" placeholder="">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="jamEnd">Jam Selesai</label>
                  <input type="time" class="form-control" id="jam_end" name="jam_end" placeholder="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="status">Status Event</label>
                  <select name="status" id="status" class="form-control" readonly="readonly" tabindex="-1" aria-disabled="true">
                    <option value="">status</option>
                    <option value="1">Akan Datang</option>
                    <option value="2">Sedang Berlangsung</option>
                    <option value="3">Yang Lalu</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                  <label for="Lokasi">Lokasi</label>
                  <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                  <label for="Lat">Latitude</label>
                  <input type="text" class="form-control" id="lat_e" name="lat" placeholder="Latitude">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                  <label for="Lng">Longitude</label>
                  <input type="text" class="form-control" id="lng_e" name="lng" placeholder="Longitude">
              </div>
            </div>
            <div class="col-1 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat_e','#lng_e');"><i class="fa fa-map-marker"></i></button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="deskripsi">Deskripsi Event</label>
                  <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Deskripsi Event"></textarea>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom:20px;">
              <div class="col-md-12">
              <div class="input-field">
                  <h5 style="margin-bottom:20px;" class="active">Photos</h5>
                  <div class="input-images-e" style="padding-top: .5rem;"></div>
              </div>
              </div>
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