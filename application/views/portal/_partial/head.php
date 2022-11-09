    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/bootstrap.min.css">
        <!-- Animate CSS --> 
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/animate.min.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/meanmenu.css">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/boxicons.min.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/owl.carousel.min.css">
        <!-- Owl Carousel Default CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/magnific-popup.min.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/nice-select.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/style.css">
        <!-- Dark CSS -->
        <link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/dark.css">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="<?= base_url('bali/');?>assets/css/responsive.css">
		
		<title><?= $title?></title>

        <link rel="icon" type="image/png" href="<?= base_url('bali/');?>assets/img/icon-jepun.png">
		<style type="text/css">
			.aktip{
				color: #ffffff;
				background-color: #ff661f;
				border: 1px solid #ff661f !important;
			}
			.main-navbar .navbar .navbar-nav .nav-item a{
				font-size: 14px;
			}
			
			.myImg {
			  border-radius: 5px;
			  cursor: pointer;
			  transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			}

			/* Modal Content (image) */
			.modal-content {
			  margin: auto;
			  display: block;
			  width: 70%;
			  /*max-width: 500px;*/
			  height: 80%;
			}

			/* Caption of Modal Image */
			#caption {
			  margin: auto;
			  display: block;
			  width: 80%;
			  max-width: 700px;
			  text-align: center;
			  color: #ccc;
			  padding: 10px 0;
			  height: 150px;
			}

			/* Add Animation */
			.modal-content, #caption {  
			  -webkit-animation-name: zoom;
			  -webkit-animation-duration: 0.6s;
			  animation-name: zoom;
			  animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
			  from {-webkit-transform:scale(0)} 
			  to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
			  from {transform:scale(0)} 
			  to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
			  position: absolute;
			  top: 15px;
			  right: 35px;
			  color: #f1f1f1;
			  font-size: 40px;
			  font-weight: bold;
			  transition: 0.3s;
			}

			.close:hover,
			.close:focus {
			  color: #bbb;
			  text-decoration: none;
			  cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
			  .modal-content {
				width: 100%;
			  }
			}

		</style>
    </head>
