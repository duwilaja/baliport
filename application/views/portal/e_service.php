<!--Sub Header Start-->
<style>
  .image-uploader {
    min-height: 20rem!important;
  }
</style>
  <section class="wf100 subheader">
    <div class="container">
        <h2>E-Service</h2>
        <ul>
          <!-- <li> <a href="index.html">Home</a> </li> -->
          <li> <a href="#">Layanan</a> </li>
          <li> E-Service </li>
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
                <h5 style="margin-bottom:20px;">Jenis Service</h5>
                <div class="form-group mt-4">
                    <select class="form-control" id="select-jenis" onchange="jenis(this.value)">
                        <option value="">Pilih Jenis Service</option>
                        <option value="Permohonan Pengawalan">Permohonan Pengawalan</option>
                        <option value="Permohonan Uji Kompetensi SIM">Permohonan Uji Kompetensi SIM</option>
                    </select>
                </div>
          </div>
        </div>
        <form id="form_service" class="needs-validation" enctype="multipart/form-data">
          <div id="form-service"></div>
        </form>
    </div>
  </div>
  <!--Main Content End--> 