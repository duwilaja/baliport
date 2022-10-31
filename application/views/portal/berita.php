<!--Sub Header Start-->
<section class="wf100 subheader">
            <div class="container">
               <h2>Berita & Artikel Terupdate</h2>
               <ul>
                  <li> <a href="<?= base_url()?>">Beranda</a> </li>
                  <li> <a href="#"> Berita </a> </li>
               </ul>
            </div>
         </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
         <div class="main-content p80">
            <!--Events Start-->
            <div class="news-wrapper news-grid">
               <div class="container">
                  <div class="row">
                     <!--News Box Start-->
                    <?php foreach($artikel as $ar):?>
                        <div class="col-md-3 col-sm-6">
                            <div class="news-box">
                                <div class="new-thumb"> <span class="cat c1"><?= $ar->kategori?></span> <img src="<?= base_url().'data/artikel/'.$ar->gambar;?>" alt=""> </div>
                                <div class="new-txt">
                                <ul class="news-meta">
                                    <li><?= $ar->ctd_date?></li>
                                    <!-- <li>176 Comments</li> -->
                                </ul>
                                <h6><a href="<?= base_url('Portal/beritaSingle/').$ar->id?>"><?= $ar->judul_artikel ?></a></h6>
                                    <p> <?= (str_word_count($ar->deskripsi) > 4 ? substr($ar->deskripsi,0,100)."..." : $ar->deskripsi) ?> </p>
                                </div>
                                <!-- <div class="news-box-f"> <img src="<?= base_url('assets/portal/');?>images/tuser1.jpg" alt=""> Johny Stewart <a href="#"><i class="fas fa-arrow-right"></i></a> </div> -->
                            </div>
                        </div>
                    <?php endforeach;?>
                     <!--News Box End--> 
                  </div>
                  <div class="row">
                     <div class="site-pagination">
                        <nav aria-label="Page navigation">
                           <!-- <ul class="pagination">
                              <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li class="active"><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#">5</a></li>
                              <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                           </ul> -->
                           <?= $this->pagination->create_links(); ?>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <!--Events End--> 
         </div>
         <!--Main Content End--> 