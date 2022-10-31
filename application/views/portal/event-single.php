<div class="main-content p80">
  <div class="container">
    <div class="card" style="box-shadow: 0 0 5px;">
      <div class="card-body">
        <!-- <h5 class="card-title">Card title</h5> -->
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
</div>