		<!-- Start Contact Area -->
        <section class="contact-area ptb-50">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-8">

                        <div class="contact-form ">
                            <div class="title mb-5">
                                <h3>E-Lapor</h3>
                                <p>People's online aspiration and complaint service</p>
                                <hr>
                            </div>



                <div class="mb-3 mt-4">
					<label for="exampleInputEmail1" class="form-label">Jenis Laporan</label>
                    <select id="select-jenis" onchange="jenis(this.value);">
                        <option value="">Pilih Jenis Laporan</option>
                        <option value="Kecelakaan">Kecelakaan</option>
                        <option value="Kemacetan">Kemacetan</option>
                        <option value="Pelanggaran">Pelanggaran</option>
                        <option value="Gangguan Lalu Lintas">Gangguan Lalu Lintas</option>
                        <option value="Infrastruktur Jalan">Infrastruktur Jalan</option>
                        <option value="Tindak Pidana di Jalan">Tindak Pidana di Jalan</option>
                    </select>
                </div>
				
        <form id="form_lapor" class="needs-validation" enctype="multipart/form-data">
          <div id="form-lapor"></div>
        </form>
		
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->
