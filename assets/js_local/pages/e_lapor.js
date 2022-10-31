$(document).ready(function(){
});

var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var kebutuhan = [];

function jenis(e) {
    $('#form-lapor').html('')
    switch (e) {
        case 'Kecelakaan':
            form_kecelakaan();
            send()
            break;

        case 'Kemacetan':
            form_kemacetan();
            send();
            break;
        
        case 'Pelanggaran':
            form_pelanggaran();
            send();
            break;
        
        case 'Gangguan Lalu Lintas':
            form_gangguan_lalin();
            send();
            break;

        case 'Infrastruktur Jalan':
            form_infrastruktur();
            send();
            break;
        
        case 'Tindak Pidana di Jalan':
            form_tindak_pidana();
            send();
            break;
    
        default:
            $('#form-lapor').html('')
            break;
    }
}

function form_kecelakaan() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="laka">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,jenis,jmlkorban,korbanmd,kebutuhan,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_laka">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 for="lokasiKejadian" style="margin-bottom:20px;">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3" style="margin-bottom:20px;">
            <h5 for="jam" style="margin-bottom:20px;">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6" style="margin-bottom:20px;">
                <div class="form-group">
                    <h5 class="latitude" style="margin-bottom:20px;">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5" style="margin-bottom:20px;">
                <div class="form-group">
                    <h5 class="longitude" style="margin-bottom:20px;">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <h6 for="jenisKecelakaan" style="margin-bottom:20px;">Jenis Kecelakaan</h6>
            <select class="form-control" name="jenis" id="jenis" required>
              <option>Pilih Jenis</option>
              <option value="Kecelakaan Tunggal">Kecelakaan Tunggal</option>
              <option value="R2vsR2">R2vsR2</option>
              <option value="R2vsR4">R2vsR4</option>
              <option value="R4vsR4">R4vsR4</option>
              <option value="Tabrak Orang">Tabrak Orang</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <h6 for="jmlkorban" style="margin-bottom:20px;">Korban Meninggal Dunia</h6>
            <select class="form-control" name="jmlkorban" id="jmlkorban" required>
              <option value="Ada">Ada</option>
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <h6 for="perkiraanjmlkorban" style="margin-bottom:20px;">Perkiraan Jumlah Korban</h6>
            <select class="form-control" name="korbanmd" id="korbanmd" required>
              <option value="1-2 Orang">1-2 Orang</option>
              <option value="2-3 Orang">2-3 Orang</option>
              <option value=">5 Orang">>5 Orang</option>
            </select>
          </div>
        </div>
        <hr class="mb-4">
        <h4 class="mb-3">Kebutuhan </h4>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" value="Polantas" class="custom-control-input kbthn" id="same-polantas">
          <label class="custom-control-label" for="same-polantas">Polantas</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" value="Ambulan" class="custom-control-input kbthn" id="save-ambulan">
          <label class="custom-control-label" for="save-ambulan">Ambulan</label>
        </div>
        <input type="hidden" name="kebutuhan" id="kebutuhan" value="">
        <hr class="mb-4">

        <div class="row">
          <div class="col-md-12">
            <div class="input-field">
                <label>Photos</label>
                <div class="input-images" style="padding-top: 1rem;"></div>
            </div>
          </div>
        </div>

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
          imagesInputName:'uploadedfile',
          extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
          mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
        });
        $('#tgl').val(date)
}

function form_kemacetan() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="macet">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,petugas,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_macet">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 for="lokasiKejadian" style="margin-bottom:20px;">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 for="jam" style="margin-bottom:20px;">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <h5 class="latitude" style="margin-bottom:20px;">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <h5 class="longitude" style="margin-bottom:20px;">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Keberadaan Petugas</h5>
                <select class="form-control" name="petugas" id="">
                    <option value="Sudah Ada">Sudah Ada</option>
                    <option value="Belum Terlihat">Belum Terlihat</option>
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="input-field">
                <h5 style="margin-bottom:20px;" class="active">Photos</h5>
                <div class="input-images" style="padding-top: .5rem;"></div>
            </div>
          </div>
         </div>

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
      $('#tgl').val(date)
}

function form_pelanggaran() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="langgar">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,jenis,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_langgar">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 for="lokasiKejadian" style="margin-bottom:20px;">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="jam">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="latitude">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="longitude">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>

        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-12">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Jenis Pelanggaran</h5>
                <select name="jenis" class="form-control" id="">
                    <option value="Terobos Lampu TL">Terobos Lampu TL</option>
                    <option value="Parkir Diluar Jalur">Parkir Diluar Jalur</option>
                    <option value="Balap Liar">Balap Liar</option>
                    <option value="Melebihi Kecepatan">Melebihi Kecepatan</option>
                    <option value="Melawan Arah">Melawan Arah</option>
                </select>
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

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
      $('#tgl').val(date)
}

function form_gangguan_lalin() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="gangguan">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,dampak,jenis,lainnya,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_gangguan">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="lokasiKejadian">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="jam">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row style="margin-bottom:20px;"">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>

        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Bisa Berdampak</h5>
                <select name="dampak" class="form-control" id="">
                    <option value="Kecelakaan">Kecelakaan</option>
                    <option value="Kemacetan">Kemacetan</option>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Sumber Gangguan</h5>
                <select name="jenis" class="form-control" id="">
                    <option value="Banjir">Banjir</option>
                    <option value="Tanah Longsor">Tanah Longsor</option>
                    <option value="Pohon Tumbang">Pohon Tumbang</option>
                    <option value="Unjuk Rasa">Unjuk Rasa</option>
                    <option value="Konser">Konser</option>
                    <option value="Pameran">Pameran</option>
                    <option value="Festival">Festival</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Kegiatan Keagamaan">Kegiatan Keagamaan</option>
                </select>
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

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
      $('#tgl').val(date)
}

function form_infrastruktur() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="infra">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,jenis,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_infra">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="lokasiKejadian">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="jam">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>

        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-12">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Jenis Kerusakan</h5>
                <select name="jenis" class="form-control" id="">
                    <option value="Lampu TL Tidak Berfungsi">Lampu TL Tidak Berfungsi</option>
                    <option value="Penerangan Jalan Mati">Penerangan Jalan Mati</option>
                    <option value="Penunjuk Arah Tidak Jelas">Penunjuk Arah Tidak Jelas</option>
                    <option value="Jalan Berlubang">Jalan Berlubang</option>
                    <option value="Jalan Bergelombang">Jalan Bergelombang</option>
                    <option value="Jalan Licin">Jalan Licin</option>
                </select>
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

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
      $('#tgl').val(date)
}

function form_tindak_pidana() {
    $('#form-lapor').append(
        `
        <hr>
        <input type="hidden" name="kategori" value="pidana">
        <input type="hidden" name="fieldnames" value="uploadedfile,masyarakat_id,tgl,jam,jalan,lat,lng,jenis,pelapor,telp">
        <input type="hidden" name="tablename" value="tmc_pservice_pidana">
        <input type="hidden" name="masyarakat_id" value="4">
        <input type="hidden" name="tgl" value="" id="tgl">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="lokasiKejadian">Lokasi Kejadian</h5>
            <input type="text" name="jalan" class="form-control" id="jalan" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-3">
            <h5 style="margin-bottom:20px;" for="jam">Jam</h5>
            <input type="time" name="jam" class="form-control" id="jam" placeholder="" value="" required>
          </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Latitude</h5>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <h5 style="margin-bottom:20px;" class="form-h5">Longitude</h5>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 my-auto text-center pt-3" style="padding-top:45px;">
                <button type="button" class="btn btn-primary" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker-alt"></i></button>
            </div>
        </div>

        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12">
            <div class="form-group">
                <h5 style="margin-bottom:20px;">Jenis Tindak Pidana</h5>
                <select name="jenis" class="form-control" id="">
                    <option value="Perampokan">Perampokan</option>
                    <option value="Jambret">Jambret</option>
                    <option value="Begal">Begal</option>
                    <option value="Tabrak Lari">Tabrak Lari</option>
                </select>
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

        <hr class="mb-4">

        <h4 class="mb-3" style="margin-bottom:20px;">Pelapor</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pelapor">Nama Pelapor</label>
            <input type="text" name="pelapor" class="form-control" id="pelapor" placeholder="">
          </div>
          <div class="col-md-6 mb-3">
            <label for="telp">No. Telpon</label>
            <input type="number" name="telp" class="form-control" id="telp" placeholder="">
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Kirim</button>
        `
    )
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
      $('#tgl').val(date)
}

function mappicker(lat,lng){
    window.open("../map?lat="+$(lat).val()+"&lng="+$(lng).val(),"MapWindow","width=830,height=500,location=no").focus();
}

function send() {
    $("#form_lapor").submit(function (e) {
        $('.kbthn:checked').each(function() {
            kebutuhan.push($(this).val());
        }); 
        $('#kebutuhan').val(kebutuhan.join(", "));
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "https://backoffice.elingsolo.com/sm-ci/PublicService/save",
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
              $("#form_lapor")[0].reset();
              Swal.fire("Berhasil !", r.msgs, "success");
            } else {
              Swal.fire("Gagal !", r.msgs, "error");
            }
          },
        });
      });
}