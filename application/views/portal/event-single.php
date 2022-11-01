<!--div class="main-content p80">
  <div class="container">
    <div class="card" style="box-shadow: 0 0 5px;">
      <div class="card-body">
        <!-- <h5 class="card-title">Card title</h5> --
        <div class="owl-carousel owl-theme">
            <?php 
            $image_arr = explode(";", $event->uploadedfile);
            foreach( $image_arr as $x ): ?>
              <div class="item"> <img src="<?= base_url($x) ?>" alt="..."> </div>
            <?php endforeach; ?>
        </div>
        <div class="new-txt">
          <ul class="news-meta">
            <li><?php $start_date = strtotime( $event->tgl_start ); $sd = date( 'd M,Y', $start_date ); echo $sd;?> - <?php $start_end = strtotime( $event->tgl_end ); $ed = date( 'd M,Y', $start_end ); echo $ed;?></li>
          </ul>
          <h4><?= $event->judul_event?></h4>
          <p><?php echo nl2br($event->deskripsi_event)?></p>
        </div>
      </div>
    </div>
  </div>
</div-->

        <!-- Start News Details Area -->
        <section class="news-details-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 mt-0">
                       
                        <div class="blog-details-desc">
                            <div class="article-content mt-0">
                                <span><a href="#"><?= $event->lokasi?></a> / <?= date('d M Y',strtotime($event->tgl_start))?> - <?= date('d M Y',strtotime($event->tgl_end))?></span>
                                <h3><?= $event->judul_event?></h3>
                                <div class="article-image">
                                    <img src="<?= base_url().substr($event->uploadedfile,1)?>" alt="image">
                                </div> <br>
                                <?= $event->deskripsi_event?>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start News Details Area -->
