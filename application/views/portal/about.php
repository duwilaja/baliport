<!--Subheader Start-->
<section class="wf100 subheader">
  <div class="container">
      <h2>Tentang Kami </h2>
      <ul>
        <li> <a href="index.html">Beranda</a> </li>
        <li> Tentang </li>
      </ul>
  </div>
</section>
<!--Subheader End--> 
<!--Main Content Start-->
<div class="main-content">
  <!--Local Boards & Services-->
  <section class="wf100 p80-0 Mayor-video-msg" style="background-image: none;">
    <!-- <?php foreach( $tentang as $t ): ?>
      <div class="h2-Mayor-msg">
        <div class="Mayor-img" style="width: 25rem;"> 
          <img src="<?= base_url().'data/tentang/'.$t->gambar;?>" alt="">
        </div>
        <div class="Mayor-txt">
          <h4><?= $t->judul?></h4>
          <p><?= $t->deskripsi?></p>
        </div>
      </div>
    <?php endforeach; ?> -->
    <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-7">
            <div class="Mayor-welcome text-center">
            <?php foreach( $tentang as $t ): ?>
              <img src="../assets/images/LOGO-ELING.png" alt="" style="width: 170px;margin-bottom:5rem">
                <h5>Tentang Kami</h5>
                <p><?= $t->deskripsi?></p>
              <?php endforeach; ?>
            </div>
          </div>
          
      </div>
    </div>
  </section>
  <!--Local Boards & Services End--> 
  

  <!--Local Boards & Services Start-->

  <!--Local Boards & Services End--> 
  <!-- Explore Community End--> 
</div>