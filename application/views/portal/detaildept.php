         <section class="wf100 subheader">
            <div class="container">
               <h2>Departemen <?= $dept[0]->nama_departemen?></h2>
               <ul>
                  <li> <a href="<?= base_url()?>">Beranda</a> </li>
                  <li> <a href="<?= base_url('Portal/dept')?>">Departemen</a> </li>
               </ul>
            </div>
         </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
         <div class="main-content p80">
            <!--Department Details Page Start-->
            <div class="department-details">
               <div class="container">
                  <div class="row">
                      <!--Sidebar Start-->
                     <div class="col-md-3">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <div class="widget" style="margin-bottom:20px;">
                           <!-- <h4>About us</h4> -->
                              <div class="about-widget inner">
                                 <img src="<?=base_url('./data/dept/').$dept[0]->image?>" alt="">
                              </div>
                           </div>
                           <!--Widget End-->
                        </div>
                     </div>
                     <!--Sidebar End--> 
                     <div class="col-md-9">
                        <!--Department Details Txt Start-->
                        <div class="deprt-txt">
                           <h3><?= $dept[0]->nama_departemen?></h3>
                           <p><?php echo nl2br($dept[0]->deskripsi_dept)?></p>
                           
                        </div>
                        <hr>
                        <!--Department Details Txt End--> 
                        <!--Related Departments Start-->
                        <div class="other-department wf100">
                           <h3>Berita Terkait</h3>
                           <div class="row">
                           <?php foreach($artikel as $ar):?>
                                    <div class="col-md-4 col-sm-6">
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
                           </div>
                        </div>
                        <!--Related Departments End--> 
                     </div>
                  </div>
               </div>
            </div>
            <!--Department Details Page End--> 
         </div>
         <!--Main Content End--> 