        <!-- Start Main News Slider Area -->
        <section class="main-news-slider-area">
            <div class="container">

                <div class="section-title"> 
                    <h2>Upcoming Events</h2> 
                </div>
                <div class="main-news-slides owl-carousel owl-theme">
<?php foreach($slider as $e){?>
                    <div class="news-slider-item">
                        <a href="<?= base_url('portal/eventSingle/').$e->id."/?x".str_ireplace(" ","_",$e->judul_event);?>">
                            <!--img src="<?= base_url('bali/');?>assets/img/main-news-slider/main-news-slider-1.jpg" alt="image"-->
							<img src="<?= base_url().substr($e->uploadedfile,1)?>" alt="">
                        </a>

                        <div class="slider-content">
                            <div class="tag">event</div>
                            <h3 style="font-size: 24px;">
                                <a href="<?= base_url('portal/eventSingle/').$e->id."/?x=".str_ireplace(" ","_",$e->judul_event);?>"><?= $e->judul_event?></a>
                            </h3>
                            <span><a href=""><?= $e->lokasi?></a> / <?= date('d M Y',strtotime($e->tgl_start))?> - <?= date('d M Y',strtotime($e->tgl_end))?></span>
                        </div>
                    </div>
<?php }?>
                    
                </div>
            </div>
        </section>
        <!-- End Main News Slider Area -->

        <!-- Start Default News Area -->
        <section class="default-news-area ptb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
					<?php foreach($event as $e){?>
                        <div class="single-culture-news">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="culture-news-image">
                                        <a href="<?= base_url('portal/eventSingle/').$e->id."/?x=".str_ireplace(" ","_",$e->judul_event);?>">
                                            <img src="<?= base_url().substr($e->uploadedfile,1)?>" alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="culture-news-content mt-0">
                                        <span>event</span>
                                        <h3>
                                            <a href="<?= base_url('portal/eventSingle/').$e->id."/?x=".str_ireplace(" ","_",$e->judul_event);?>"><?= $e->judul_event ?></a>
                                        </h3>
                                        <p><?= substr($e->deskripsi_event,0,75) ?>...</p>
                                        <span><i class="bx bx-map"></i><?= $e->lokasi ?></label> 
                                        <p><?= date('d M Y',strtotime($e->tgl_start)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?>


                        <!--div class="pagination-area justify-content-center">
                            <a href="#" class="prev page-numbers">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                            <a href="#" class="page-numbers">1</a>
                            <span class="page-numbers current" aria-current="page">2</span>
                            <a href="#" class="page-numbers">3</a>
                            <a href="#" class="page-numbers">4</a>
                            <a href="#" class="next page-numbers">
                                <i class='bx bx-chevron-right'></i>
                            </a>
                        </div-->
						<?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Default News Area -->
        