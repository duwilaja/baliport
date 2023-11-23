<?php
$artikel=$news;
$car=count($artikel)>7?7:count($artikel);
$kategori=array();
$ls=array();
foreach($wisata as $w){
	if(!in_array($w->jenis_wisata_id,$ls)){
		$kategori[]=(object)array("kategori_id"=>$w->jenis_wisata_id,"gambar"=>$w->image,"kategori"=>$w->jenis_wisata);
		$ls[]=$w->jenis_wisata_id;
	}
}
?>		
		<!-- Start Main News Area -->
        <section class="main-news-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-main-news">
						<?php if(count($artikel)>0){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[0]->rowid."/?x=".str_ireplace(" ","_",$artikel[0]->judul_news)?>">
                                <img src="<?= $artikel[0]->image;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3>
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[0]->rowid."/?x=".str_ireplace(" ","_",$artikel[0]->judul_news)?>"><?= $artikel[0]->judul_news?></a>
                                </h3>
                                <span><?= date('d M Y',strtotime($artikel[0]->tanggal_news))?></span>
                            </div>
						<?php }?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single-main-news-inner mb-4">
                        <?php if(count($artikel)>1){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[1]->rowid."/?x=".str_ireplace(" ","_",$artikel[1]->judul_news)?>">
                                <img src="<?= $artikel[1]->image;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3 style="font-size: 20px;">
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[1]->rowid."/?x=".str_ireplace(" ","_",$artikel[1]->judul_news)?>"><?= $artikel[1]->judul_news?></a>
                                </h3>
                                <span><?= date('d M Y',strtotime($artikel[1]->tanggal_news))?></span>
                            </div>
                        <?php }?>
                        </div>

                        <div class="single-main-news-inner mb-5">
                        <?php if(count($artikel)>2){?>
                            <a href="<?= base_url('portal/beritaSingle/').$artikel[2]->rowid."/?x=".str_ireplace(" ","_",$artikel[2]->judul_news)?>">
                                <img src="<?= $artikel[2]->image;?>" alt="image">
                            </a>
                            <div class="news-content">
                                <!-- <div class="tag">National</div> -->
                                <h3 style="font-size: 20px;">
                                    <a href="<?= base_url('portal/beritaSingle/').$artikel[2]->rowid."/?x=".str_ireplace(" ","_",$artikel[2]->judul_news)?>"><?= $artikel[2]->judul_news?></a>
                                </h3>
                                <span><?= date('d M Y',strtotime($artikel[2]->tanggal_news))?></span>
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
								<a href="<?= base_url('portal/wisata/?k=').$b->kategori_id?>">
                                <img src="<?= $b->gambar;?>" alt="image">
								</a>
                            </div>

                            <div class="content">
                                <h3 style="font-size: 14px;"><a href="<?= base_url('portal/wisata/?k=').$b->kategori_id?>"><?= $b->kategori?></a></h3>
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
<?php $i=0;
foreach($eventx as $e){
	$i++;
	?>
                    <div class="news-slider-item">
                        <a href="<?= base_url('portal/eventSingle/').$e->rowid."/?x=".str_ireplace(" ","_",$e->nama_event);?>">
                            <!--img src="<?= base_url('bali/');?>assets/img/main-news-slider/main-news-slider-1.jpg" alt="image"-->
							<img src="<?= $e->image ?>" alt="">
                        </a>

                        <div class="slider-content">
                            <!--div class="tag">event</div-->
                            <h3 style="font-size: 24px;">
                                <a href="<?= base_url('portal/eventSingle/').$e->rowid."/?x=".str_ireplace(" ","_",$e->nama_event);?>"><?= $e->nama_event?></a>
                            </h3>
                            <span><a href=""><?= date('d M Y',strtotime($e->tgl_event))?> - <?= date('d M Y',strtotime($e->tgl_berakhir))?></span>
                        </div>
                    </div>
<?php 
if($i>4){ break; }
}?>   
						</div>
					</div>
                </div>


                <div class="health-news ptb-50">
                    <div class="section-title"> 
                        <h2>Public Transportaion Route</h2> 
                    </div>

                    <div class="row">
                        <div class="main-news-slides owl-carousel owl-theme">
<?php foreach($transport as $e){?>
                    <div class="news-slider-item">
                        <a href="<?= base_url('kontak/transport');?>">
                            <img src="<?= base_url("data/tentang/").$e->gambar?>" alt="">
                        </a>

                        <div class="slider-content">
                            <!--div class="tag">event</div-->
                            <h3 style="font-size: 24px;">
                                <a href="<?= base_url('kontak/transport');?>"><?= $e->judul?></a>
                            </h3>
                            <span></span>
                        </div>
                    </div>
<?php }?>   
						</div>
					</div>
                </div>

                <div class="tech-news pb-50">
                    <div class="section-title"> 
                        <h2>News</h2> 
                    </div>


                    <div class="row">
					<?php for($i=3;$i<$car;$i++){?>
                        <div class="col-lg-3 col-sm-3">
                            <div class="single-tech-news-box">
                                <a href="<?= base_url('portal/beritaSingle/').$artikel[$i]->rowid."/?x=".str_ireplace(" ","_",$artikel[$i]->judul_news)?>">
                                    <img src="<?= $artikel[$i]->image;?>" alt="image">
                                </a>
                                
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="<?= base_url('portal/beritaSingle/').$artikel[$i]->rowid."/?x=".str_ireplace(" ","_",$artikel[$i]->judul_news)?>"><?= $artikel[$i]->judul_news?></a>
                                    </h3>
                                    <p><?= date('d M Y',strtotime($artikel[$i]->tanggal_news))?></p>
                                </div>
                            </div>
                        </div>
					<?php }?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Default News Area -->
        
