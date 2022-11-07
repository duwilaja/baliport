<?php
$wisata="";
foreach($kategori as $k){
	$wisata=$k->id==$kid?$k->kategori:$wisata;
}
?>		
		
		<!-- Jumbotron -->
        <div
            class=" bg-image p-5"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/003.webp'); height: 200px;">
            <h2 style="color: #ffff;"><?=$wisata?></h2>
            <h5 style="color: #ffff; font-weight: 300; opacity: 50%;" >Rekomendasi <?=$wisata?> di Bali</h5>
        </div>
        <!-- Jumbotron -->
		<!-- Start Default News Area -->
        <section class="default-news-area">
            <div class="container">
                <div class="tech-news ptb-50">
					<div class="row">
					<?php foreach($artikel as $b){?>
						<div class="col-lg-3 col-sm-3 ">
                            <div class="single-tech-news-box" style="border-radius: 10px;">
                                <a href="<?= base_url('portal/wisataSingle/').$b->id."/?x=".str_ireplace(" ","_",$b->judul_wisata)?>">
                                    <img src="<?= base_url('data/wisata/').$b->gambar;?>" alt="image">
                                </a>
                                
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="<?= base_url('portal/wisataSingle/').$b->id."/?x=".str_ireplace(" ","_",$b->judul_wisata)?>"><?= $b->judul_wisata ?></a>
                                    </h3>
                                    <p><?= date('d M Y',strtotime($b->ctd_date)) ?></p>
                                </div>
                            </div>
                        </div>
					<?php }?>
					</div>
                </div>
				<?= $this->pagination->create_links(); ?>
            </div>
        </section>
        <!-- End News Area -->

