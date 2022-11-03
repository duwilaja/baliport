<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Aronox – Admin Bootstrap4 Responsive Webapp Dashboard Templat" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin site template, html admin template,responsive admin template, admin panel template, bootstrap admin panel template, admin template, admin panel template, bootstrap simple admin template premium, simple bootstrap admin template, best bootstrap admin template, simple bootstrap admin template, admin panel template,responsive admin template, bootstrap simple admin template premium"/>

		<!-- Title -->
		<title><?=$title?></title>

		<!--Favicon -->
		<link rel="icon" href="<?=base_url();?>assets/portal/img/LOGO-ELING.png" type="image/x-icon"/>

		<!-- Style css -->
		<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" />

		<!---Icons css-->
		<link href="<?=base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link href="<?=base_url();?>assets/plugins/iconfonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="<?=base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/skins/hor-skin/hor-skin1.css" />

        <link href="<?=base_url();?>assets/plugins/sweet-alert/jquery.sweet-modal.min.css" rel="stylesheet" />
		<link href="<?=base_url();?>assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
	</head>

	<body class="h-100vh">
		<div class="page">
			<div class="page-single construction-body">
				<div class="container text-center single-page single-pageimage  ">
				    <div class="row">
						<div class="col-xl-7 col-lg-6 col-md-12">
							<img src="<?=base_url();?>bali/assets/img/logo-jepun-bali-500.png" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt="">
						</div>
						<div class="col-xl-5  col-lg-6 col-md-12 ">
							<div class="col-lg-11">
								<div class="wrapper wrapper2">
									<form id="login" class="card-body" tabindex="500" action="<?=site_url('Auth/proses_login');?>" method="post">
										<h2 class="mb-1 font-weight-semibold">Login</h2>
										<p class="mb-6">Sign In to your account</p>
										<div class="input-group mb-3">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" class="form-control" placeholder="Username" name="username" value="">
										</div>
										<div class="input-group mb-4">
											<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
											<input type="password" class="form-control" placeholder="Password" name="password" value="">
										</div>
										<div class="row mb-0">
											<div class="col-12">
												<button type="submit" class="btn btn-primary btn-block">Login</button>
											</div>
										</div>
									</form>
									<div class="card-body social-icons border-top">
										Portal Smart City Solo
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Jquery js-->
		<script src="<?=base_url();?>assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?=base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="<?=base_url();?>assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="<?=base_url();?>assets/js/vendors/circle-progress.min.js"></script>

		<!-- Jquery-rating js-->
		<script src="<?=base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>

        <script src="<?=base_url();?>assets/plugins/sweet-alert/jquery.sweet-modal.min.js"></script>
		<script src="<?=base_url();?>assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="<?=base_url();?>assets/js/sweet-alert.js"></script>

        <script>
            <?php if($this->session->flashdata('gagal')){ ?>
            swal({
                title:'Alert',
                text:'<?=$this->session->flashdata('gagal');?>',
                type:'error',
                showCancelButton: false,
			    confirmButtonText: 'OK',
            });
            <?php }?>
        </script>
	</body>
</html>
