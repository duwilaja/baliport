<div class="pt-5 mt-5 text-center">
    <h2>E-Service</h2>
    <div class="form-group mt-4">
        <select class="form-control" id="select-jenis" onchange="jenis(this.value)">
            <option value="">Pilih Jenis Service</option>
            <option value="Permohonan Pengawalan">Permohonan Pengawalan</option>
            <option value="Permohonan Uji Kompetensi SIM">Permohonan Uji Kompetensi SIM</option>
        </select>
    </div>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
  </div>
  <div class="row">
    <div class="col-md-12 order-md-2">
      <!-- <h4 class="mb-3">Billing address</h4> -->
      <form id="form_service" class="needs-validation" enctype="multipart/form-data">
        <div id="form-service"></div>
      </form>
    </div>
  </div>