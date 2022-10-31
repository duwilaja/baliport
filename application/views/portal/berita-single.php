<!--Sub Header Start-->
         <section class="wf100 subheader">
            <div class="container">
               <h2>Detail Berita</h2>
               <ul>
                  <li> <a href="index.html">Beranda</a> </li>
                  <li> <a href="#">Berita</a> </li>
               </ul>
            </div>
         </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
         <div class="main-content p80">
            <!--News Details Page Start-->
            <div class="news-details">
               <div class="container">
                  <div class="row">
                     <!--Content Col Start-->
                     <div class="col-md-9">
                       <div class="new-thumb"> 
                          <a href="#">
                            <i class="fas fa-link"></i></a> 
                            <span class="cat c4"><?= $artikel->kategori?></span> 
                            <img src="<?=base_url();?>data/artikel/<?= $artikel->gambar?>" alt=""> 
                        </div>
                        <div class="news-box" style="height: auto;">
                          <div class="new-txt">
                            <ul class="news-meta">
                                <li><?= $artikel->ctd_date?></li>
                            </ul>
                            <h4><?= $artikel->judul_artikel?></h4>
                            <p><?php echo nl2br($artikel->deskripsi)?></p>
                          </div>
                        </div>
                     </div>
                     <!--Content Col End--> 
                     <!--Sidebar Start-->
                     <div class="col-md-3">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <!-- <div class="widget">
                           <h4>About us</h4>
                              <div class="about-widget inner">
                                 <img src="images/about-widget-img.jpg" alt="">
                                 <p> On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment. </p>
                                 <a href="#">More About us</a> 
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget">
                            <h4>Post Lalu</h4>
                              <div class="recent-posts inner">
                                 <ul>
                                    <?php foreach ($recentAr as $ra) { ?>
                                       <li>
                                          <img src="<?=base_url('data/artikel/').$ra->gambar?>" alt=""> <strong><?= $ra->ctd_date?></strong>
                                          <h6> <a href="<?= base_url('Portal/beritaSingle/').$ra->id?>"><?= $ra->judul_artikel?> </a> </h6>
                                       </li>
                                    <?php };?>
                                 </ul>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <!-- <div class="widget">
                           <h4>Categories</h4>
                              <div class="categories inner">
                                 <ul>
                                    <li><a href="#">Latest Updates</a></li>
                                    <li><a href="#">Economical Stability</a></li>
                                    <li><a href="#">Educational Institutes</a></li>
                                    <li><a href="#">Speeches &amp; Videos</a></li>
                                    <li><a href="#">Latest Updates</a></li>
                                    <li><a href="#">Foreign Policies</a></li>
                                 </ul>
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget">
                           <h4>Yang Akan Datang</h4>
                              <div class="upcoming-events inner">
                                 
                                 <ul id="nextEvents">
                                 </ul>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <!-- <div class="widget">
                            <h4>Archives</h4>
                              <div class="archives inner">
                                
                                 <ul>
                                    <li><a href="#">May 2019</a></li>
                                    <li><a href="#">April 2019</a></li>
                                    <li><a href="#">March 2019</a></li>
                                    <li><a href="#">February 2019</a></li>
                                    <li><a href="#">January 2019</a></li>
                                    <li><a href="#">March 2017</a></li>
                                 </ul>
                              </div>
                           </div> -->
                           <!--Widget End--> 
                           
                           <!--Widget Start-->
                           <div class="widget">
                            <h4>Tags</h4>
                              <div class="tags-widget inner">
                                 <?php foreach ($tags as $t) {?>
                                    <a href="#"><?= $t->kategori?></a>
                                 <?php }?>
                                
                              </div>
                           </div>
                           <!--Widget End--> 
                        </div>
                     </div>
                     <!--Sidebar End--> 
                  </div>
               </div>
            </div>
            <!--News Details Page End--> 
         </div>
         <!--Main Content End--> 