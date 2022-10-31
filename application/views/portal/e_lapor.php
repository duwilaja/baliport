<!--Sub Header Start-->
<style>
  .image-uploader {
    min-height: 20rem!important;
  }
</style>
  <section class="wf100 subheader">
    <div class="container">
        <h2>E-Lapor</h2>
        <ul>
          <!-- <li> <a href="index.html">Home</a> </li> -->
          <li> <a href="#">Layanan</a> </li>
          <li> E-Lapor </li>
        </ul>
    </div>
  </section>
  <!--Sub Header End--> 
  <!--Main Content Start-->
  <div class="main-content p80">
    <!--Donation Start-->
    <div class="container">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-12">
                <h5 style="margin-bottom:20px;">Jenis Laporan</h5>
                <div class="form-group mt-4">
                    <select class="form-control" id="select-jenis" onchange="jenis(this.value)">
                        <option value="">Pilih Jenis Laporan</option>
                        <option value="Kecelakaan">Kecelakaan</option>
                        <option value="Kemacetan">Kemacetan</option>
                        <option value="Pelanggaran">Pelanggaran</option>
                        <option value="Gangguan Lalu Lintas">Gangguan Lalu Lintas</option>
                        <option value="Infrastruktur Jalan">Infrastruktur Jalan</option>
                        <option value="Tindak Pidana di Jalan">Tindak Pidana di Jalan</option>
                    </select>
                </div>
          </div>
        </div>
        <form id="form_lapor" class="needs-validation" enctype="multipart/form-data">
          <div id="form-lapor"></div>
        </form>
    </div>
  </div>
  <!--Main Content End--> 