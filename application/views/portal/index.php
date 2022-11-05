        <!-- Start Main News Area -->
        <section class="main-news-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-main-news">
						<?php if(count($artikel)>0){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[0]->id?>">
                                <img src="<?= base_url('data/artikel/').$artikel[0]->gambar;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3>
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[0]->id?>"><?= $artikel[0]->judul_artikel?></a>
                                </h3>
                                <span><a href="<?= base_url('portal/beritaSingle/').$artikel[0]->id?>"></a><?= date('d M Y',strtotime($artikel[0]->ctd_date))?></span>
                            </div>
						<?php }?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single-main-news-inner mb-4">
                        <?php if(count($artikel)>1){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[1]->id?>">
                                <img src="<?= base_url('data/artikel/').$artikel[1]->gambar;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3 style="font-size: 20px;">
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[1]->id?>"><?= $artikel[1]->judul_artikel?></a>
                                </h3>
                                <span><?= date('d M Y',strtotime($artikel[1]->ctd_date))?></span>
                            </div>
                        <?php }?>
                        </div>

                        <div class="single-main-news-inner mb-5">
                        <?php if(count($artikel)>2){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[2]->id?>">
                                <img src="<?= base_url('data/artikel/').$artikel[2]->gambar;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3 style="font-size: 20px;">
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[2]->id?>"><?= $artikel[2]->judul_artikel?></a>
                                </h3>
                                <span><?= date('d M Y',strtotime($artikel[2]->ctd_date))?></span>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Main News Area -->

        <!-- Start Team Area -->
        <section class="team-area pt-30">
            <div class="container">
                <div class="section-title"> 
                    <h2>Explore Bali</h2> 
                </div>
                <div class="row">
				<?php foreach($kategori as $b){?>
                    <div class="col-lg-2 col-md-2">
                        <div class="single-team-box">
                            <div class="image">
								<a href="<?= base_url('portal/berita/?k=').$b->kategori_id?>">
                                <img src="<?= base_url('data/artikel/').$b->gambar;?>" alt="image">
								</a>
                            </div>

                            <div class="content">
                                <h3 style="font-size: 14px;"><a href="<?= base_url('portal/beritaSingle/').$b->id?>"><?= $b->kategori?></a></h3>
                            </div>
                        </div>
                    </div>
				<?php }?>                    
                </div>
            </div>
        </section>
        <!-- End Team Area -->

        <!-- Start Default News Area -->
        <section class="default-news-area">
            <div class="container">

                <div class="politics-news">
                    <div class="section-title"> 
                        <h2>Upcoming Events</h2> 
                    </div>

                    <div class="row">
                        <div class="main-news-slides owl-carousel owl-theme">
<?php foreach($slider as $e){?>
                    <div class="news-slider-item">
                        <a href="<?= base_url('portal/eventSingle/').$e->id;?>">
                            <!--img src="<?= base_url('bali/');?>assets/img/main-news-slider/main-news-slider-1.jpg" alt="image"-->
							<img src="<?= base_url().substr($e->uploadedfile,1)?>" alt="">
                        </a>

                        <div class="slider-content">
                            <!--div class="tag">event</div-->
                            <h3 style="font-size: 24px;">
                                <a href="<?= base_url('portal/eventSingle/').$e->id;?>"><?= $e->judul_event?></a>
                            </h3>
                            <span><a href=""><?= $e->lokasi?></a> / <?= date('d M Y',strtotime($e->tgl_start))?> - <?= date('d M Y',strtotime($e->tgl_end))?></span>
                        </div>
                    </div>
<?php }?>   
						</div>
					</div>
                </div>


                <div class="health-news ptb-50">
                    <div class="section-title"> 
                        <h2>Public Transportaion Route</h2> 
                    </div>

                    <div class="about-image">
                        <img src="<?= base_url('bali/');?>assets/img/about.jpg" alt="image">
                    </div>
                </div>

                <div class="tech-news pb-50">
                    <div class="section-title"> 
                        <h2>News</h2> 
                    </div>


                    <div class="row">
					<?php for($i=3;$i<count($artikel);$i++){?>
                        <div class="col-lg-3 col-sm-3">
                            <div class="single-tech-news-box">
                                <a href="<?= base_url('portal/beritaSingle/').$artikel[$i]->id?>">
                                    <img src="<?= base_url('data/artikel/').$artikel[$i]->gambar;?>" alt="image">
                                </a>
                                
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="<?= base_url('portal/beritaSingle/').$artikel[$i]->id?>"><?= $artikel[$i]->judul_artikel?></a>
                                    </h3>
                                    <p><?= date('d M Y',strtotime($artikel[$i]->ctd_date))?></p>
                                </div>
                            </div>
                        </div>
					<?php }?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Default News Area -->
        
