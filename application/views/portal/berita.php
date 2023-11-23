		<!-- Start News Area -->
        <section class="news-area bg-ffffff ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <aside class="widget-area">
                            <section class="widget widget_tag_cloud">
                                <h3 class="widget-title">News</h3>
                                <!--div class="widget widget_search">
                                    <form class="search-form">
                                        <label>
                                            <span class="screen-reader-text">Search for:</span>
                                            <input type="search" class="search-field" placeholder="Search...">
                                        </label>
                                        <button type="submit">
                                            <i class='bx bx-search'></i>
                                        </button>
                                    </form>
                                </div--
                                <div class="tagcloud">
								<php foreach($kategori as $k){?>
                                    <a href="<= base_url('portal/berita/').$this->uri->segment(3).'?k='.$k->id?>" <= $k->id==$kid?'class="aktip"':''; ?>><= $k->kategori?></a>
								<php }?>
                                    <!--a href="#">Kuliner Tradisional</a>
                                    <a href="#">Adat & Budaya</a>
                                    <a href="#">Rekreasi</a>
                                    <a href="#">Oleh - Oleh Khas</a>
                                    <a href="#">Travel Agensi</a>
                                    <a href="#">Penginapan</a>
                                    <a href="#">Pelayanan Publik</a-->
                                </div-->

                                
                            </section>
                            
                           <br>
                        </aside>
                    </div>

                    <div class="col-lg-8">
					<?php foreach($artikel as $b){?>
                        <div class="single-news-item">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="news-image">
                                        <a href="<?= base_url('portal/beritaSingle/').$b->rowid."/?x=".str_ireplace(" ","_",$b->judul_news)?>">
                                            <img src="<?= $b->image;?>" alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="news-content">
                                        <span><?= $b->jenis_berita ?></span>
                                        <h3>
                                            <a href="<?= base_url('portal/beritaSingle/').$b->rowid."/?x=".str_ireplace(" ","_",$b->judul_news)?>"><?= $b->judul_news ?></a>
                                        </h3>
                                        <?= substr($b->isi_konten,0,75)."..." ?>
                                        <!-- <p><a href="#">Patricia</a> / 28 September, 2022</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?>

                        <!--div class="pagination-area">
                            <a href="#" class="prev page-numbers">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                            <span class="page-numbers current" aria-current="page">1</span>
                            <a href="#" class="page-numbers">2</a>
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
        <!-- End News Area -->

