        <!-- Start News Details Area -->
        <section class="news-details-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 mt-0">
                       
                        <div class="blog-details-desc">
                            <div class="article-content mt-0">
                                <span><a href="#"><?= $artikel->kategori?></a> / <?= date('d M Y',strtotime($artikel->ctd_date))?></span>
                                <h3><?= $artikel->judul_wisata?></h3>
                                <div class="article-image">
                                    <img src="<?= base_url("data/wisata/").$artikel->gambar;?>" alt="image">
                                </div> <br>
                                <?= nl2br($artikel->deskripsi)?>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start News Details Area -->
