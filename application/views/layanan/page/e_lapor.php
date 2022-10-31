<div class="pt-5 mt-5 text-center">
    <h2>E-Lapor</h2>
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
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
  </div>
  <div class="row">
    <div class="col-md-12 order-md-2">
      <!-- <h4 class="mb-3">Billing address</h4> -->
      <form id="form_lapor" class="needs-validation" enctype="multipart/form-data">
        <div id="form-lapor"></div>
      </form>
    </div>
  </div>