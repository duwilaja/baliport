$(document).ready(function(){
  
});

var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

function jenis(e) {
    $('#form-service').html('')
    switch (e) {
        case 'Permohonan Pengawalan':
            form_pengawalan();
            send();
            break;

        case 'Permohonan Uji Kompetensi SIM':
            form_sim();
            send();
            break;
    
        default:
            $('#form-service').html('')
            break;
    }
}

function form_pengawalan() {
    $('#form-service').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="wal">
        <input type="hidden" name="fieldnames" value="masyarakat_id,tgl,nama,telp,email,jenis,kegiatan">
        <input type="hidden" name="filenames" value="ktp,sim,sertifikat,kesehatan,lunas">
        <input type="hidden" name="tablename" value="tmc_pservice_wal">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="nama">Nama</h5>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="notelp">No. Telepon</h5>
            <input type="number"name="telp" class="form-control" id="no_telp" placeholder="No. Telepon" value="" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <h5 style="margin-bottom:20px;" for="email">Email Aktif</h5>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="col-md-4 mb-3">
            <h5 style="margin-bottom:20px;" for="state">Untuk Kegiatan</h5>
            <select name="kegiatan" class="form-control" id="state" required>
              <option>Pilih Kegiatan</option>
              <option value="Pribadi">Pribadi</option>
              <option value="Bisnis">Bisnis</option>
              <option value="Sosial">Sosial</option>
              <option value="Ormas">Ormas</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <h5 style="margin-bottom:20px;" for="jenisKegiatan">Jenis Kegiatan</h5>
            <input type="text" name="jenis" class="form-control" id="jenis_kegiatan">
          </div>
        </div>
        <hr class="mb-4">
        <h4 class="mb-3" style="margin-bottom:20px;">Dokumen Diperlukan </h4>
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <div class="form-group">
              <input type="file" name="ktp" class="form-control-file" id="customFile">
              <label class="custom-file-label" for="customFile">Foto KTP</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="custom-file">
              <input type="file" name="sim" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">SIM Lama</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="custom-file">
              <input type="file" name="sertifikat" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Sertifikat Sekolah Mengemudi</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="custom-file">
              <input type="file" name="kesehatan" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Foto Cek Kesehatan</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="custom-file">
              <input type="file" name="lunas" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Foto Bukti Lunas Administrasi</label>
            </div>
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    bsCustomFileInput.init()
    $('#tgl').val(date)
}

function form_sim() {
  $('#form-service').append(
      `
      <hr>
      <input type="hidden" name="kategori" value="sim">
      <input type="hidden" name="fieldnames" value="masyarakat_id,tgl,nama,telp,email,jenis,status">
      <input type="hidden" name="filenames" value="ktp,sim,sertifikat,kesehatan,lunas">
      <input type="hidden" name="tablename" value="tmc_pservice_sim">
      <input type="hidden" name="masyarakat_id" value="4">
      <input type="hidden" name="tgl" value="" id="tgl">
      <div class="row" style="margin-bottom:20px;">
        <div class="col-md-6 mb-3">
          <h5 style="margin-bottom:20px;" for="nama">Nama</h5>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="" required>
        </div>
        <div class="col-md-6 mb-3">
          <h5 style="margin-bottom:20px;" for="notelp">No. Telepon</h5>
          <input type="number"name="telp" class="form-control" id="no_telp" placeholder="No. Telepon" value="" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5 style="margin-bottom:20px;" for="email">Email Aktif</h5>
          <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="col-md-4 mb-3">
          <h5 style="margin-bottom:20px;" for="jenis">Kategori Permohonan</h5>
          <select name="jenis" class="form-control" id="jenis" required>
            <option>Pilih Kategori</option>
            <option value="Reguler">Reguler</option>
            <option value="Kelompok">Kelompok</option>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <h5 style="margin-bottom:20px;" for="status">Status Permohonan</h5>
          <select name="status" class="form-control" id="status" required>
            <option>Pilih Status</option>
            <option value="Baru">Baru</option>
            <option value="Peningkatan">Peningkatan</option>
            <option value="DPS">DPS</option>
          </select>
        </div>
      </div>
      <hr class="mb-4">
      <h4 class="mb-3" style="margin-bottom:20px;">Dokumen Diperlukan </h4>
      <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <div class="custom-file">
              <input type="file" name="ktp" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Foto KTP</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="custom-file">
              <input type="file" name="sim" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">SIM Lama</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="custom-file">
              <input type="file" name="sertifikat" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Sertifikat Sekolah Mengemudi</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="custom-file">
              <input type="file" name="kesehatan" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Foto Cek Kesehatan</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="custom-file">
              <input type="file" name="lunas" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Foto Bukti Lunas Administrasi</label>
            </div>
          </div>
        </div>

      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
      `
  )
  bsCustomFileInput.init()
  $('#tgl').val(date)
}

function send() {
  $("#form_service").submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "https://backoffice.elingsolo.com/sm-ci/PublicService/save_permohonan",
        headers: {
          "X-token": "45fd595dcb1cdb51293fee28335c43487f4eaa2e940db4f589bec08cfae723a2",
          // "Cookie": "ci_session=m7lob3clpojmb1c41didd1ovusrn43gc"
        },
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        data: new FormData(this),
        dataType: "json",
        success: function (r) {
          if (r.code == 200) {
            $("#form_service")[0].reset();
            Swal.fire("Berhasil !", r.msgs, "success");
          } else {
            Swal.fire("Gagal !", r.msgs, "error");
          }
        },
      });
    });
}