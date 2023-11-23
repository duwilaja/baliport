<?php
$wisata="";
foreach($kategori as $k){
	$wisata=$k->id==$kid?$k->kategori:$wisata;
}
switch($kid){
	case 2: $wisata="Wisata Alam"; break;
	case 3: $wisata="Wisata Kuliner"; break;
	case 1: $wisata="Kuliner Tradisional"; break;
	case 4: $wisata="Adat dan Budaya"; break;
	case 5: $wisata="Tempat Rekreasi"; break;
	case 6: $wisata="Oleh-oleh Khas"; break;
	case 7: $wisata="Penginapan"; break;
}
?>		
		
		<!-- Jumbotron -->
        <div
            class=" bg-image p-5"
            style="background-image: url('<?= base_url('assets/images')?>/003.webp'); height: 200px;">
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
                                <a href="<?= base_url('portal/wisataSingle/').$b->rowid."/?x=".str_ireplace(" ","_",$b->judul)?>">
                                    <img src="<?= $b->image;?>" alt="image">
                                </a>
                                
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="<?= base_url('portal/wisataSingle/').$b->rowid."/?x=".str_ireplace(" ","_",$b->judul)?>"><?= $b->judul ?></a>
                                    </h3>
                                    <!--p><?= date('d M Y',strtotime($b->ctddate)) ?></p-->
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

