<!DOCTYPE html>
<html>
<head>
	<title>Smart City</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url();?>assets/portal/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="<?=base_url();?>assets/portal/css/style.css"/>
	<link rel="icon" href="<?=base_url();?>assets/portal/img/LOGO-ELING.png" type="image/x-icon"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="padding-left: 0 !important;">
	<!-- Offcanvas Menu Section -->
	
	<!-- Offcanvas Menu Section end -->

	<!-- Blog Section end -->
	<section class="blog-details">
		<div class="container">
			<div class="single-blog-page">
				<div class="blog-metas">
					<div class="blog-meta"><?= $artikel->ctd_date?></div>
				</div>
				<h2><?= $artikel->judul_artikel?></h2>
				<div class="blog-thumb">
					<div class="thumb-cata"><?= $artikel->kategori?></div>
					<img src="<?=base_url();?>data/artikel/<?= $artikel->gambar?>" class="mr-5 mb-5" alt="">
				</div>
				<p class="text-justify"><?= $artikel->deskripsi?></p>
				<div class="row">
					<a href="<?= site_url('Portal')?>" class="btn btn-primary ml-auto mr-3"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="<?=base_url();?>assets/portal/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/owl.carousel.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/isotope.pkgd.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/jquery.nicescroll.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/circle-progress.min.js"></script>
	<script src="<?=base_url();?>assets/portal/js/pana-accordion.js"></script>
	<script src="<?=base_url();?>assets/portal/js/main.js"></script>

	</body>
</html>
