		<!-- Start Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="wrapper">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-1a"></div>
                    <div class="circle circle-2"></div>
                    <div class="circle circle-3"></div>
                </div>
                <span>Loading...</span>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-header-social">
                            <li>
                                <i class='bx bx-calendar'></i>
                                <a href="#">Call Center :<strong> 111</strong></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <ul class="top-header-others">

                            <li>
                                <i class='bx bx-calendar'></i>
                                <a href="#"><span id="Date"></span> | <span id="jam"></span>:<span id="min"></span>:<span id="sec"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Header Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img src="<?= base_url("bali/")?>assets/img/logo-elingbali-70.png" class="black-logo" alt="image">
                                <img src="<?= base_url("bali/")?>assets/img/logo-elingbali-70.png" class="white-logo" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?= base_url("bali/")?>assets/img/logo-elingbali-70.png" class="black-logo" alt="image">
                            <img src="<?= base_url("bali/")?>assets/img/logo-elingbali-70.png" class="white-logo" alt="image">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?= base_url();?>" class="nav-link <?php echo ($link=='index')?"active":"";?>">
                                        Home 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        Wisata 
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
									<ul class="dropdown-menu">
                                        <li class="nav-item ">
                                            <a href="wisata-alam.html" class="nav-link">
                                                Wisata Alam
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="wisata-kuliner.html" class="nav-link">
                                                Wisata Kuliner
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="kuliner-tradisional.html" class="nav-link">
                                                Kuliner Tradisional
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="wisata-adat.html" class="nav-link">
                                                Adat & Budaya
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="rekreasi.html" class="nav-link">
                                                Tempat Rekreasi
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="oleh-oleh.html" class="nav-link">
                                                Oleh - Oleh Khas
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php echo ($link=='e_lapor'||$link=='e_service')?"active":"";?>">
                                        Public Service 
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        
                                        <li class="nav-item">
                                            <a href="penginapan.html" class="nav-link">
                                                Penginapan
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="travel-agensi.html" class="nav-link">
                                                Travel Agensi
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="pelayanan-publik.html" class="nav-link">
                                                Lokasi Pelayanan Publik
                                            </a>
                                        </li>

                                        <hr style="background-color: #a0a0a0;">

                                        <li class="nav-item">
                                            <a href="<?= base_url("lapor/lapor");?>" class="nav-link <?php echo ($link=='e_lapor')?"active":"";?>">
                                                E-Lapor
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?= base_url("lapor/service");?>" class="nav-link <?php echo ($link=='e_service')?"active":"";?>">
                                                E-Service
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url("portal/event");?>" class="nav-link <?php echo ($link=='event')?"active":"";?>">
                                        Event
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url("kontak/trafic");?>" class="nav-link <?php echo ($link=='trafic')?"active":"";?>">
                                        Traffic
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="<?= base_url("portal/berita");?>" class="nav-link <?php echo ($link=='berita')?"active":"";?>">
                                        News
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Infographic
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="weekly-report.html" class="nav-link">
                                                Weekly Traffic Report
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="monthly-report.html" class="nav-link">
                                                Monthly Traffic Report
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php echo ($link=='galeri')?"active":"";?>">
                                        Gallery
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= base_url("kontak/galeri");?>" class="nav-link <?php echo ($link=='galeri')?"active":"";?>">
                                                Foto Kegiatan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								
								<li class="nav-item">
                                    <a href="<?= base_url("kontak/transport");?>" class="nav-link <?php echo ($link=='transport')?"active":"";?>">
                                        Transportation Route 
                                    </a>
                                </li>
								
                                <li class="nav-item">
                                    <a href="<?= base_url("kontak");?>" class="nav-link <?php echo ($link=='kontak')?"active":"";?>">
                                        Contact
                                    </a>
                                </li>
								
								<li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Download
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            
                                            <a href="#" class="nav-link">
                                             Peraturan Daerah
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                             Perundang- Undangan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- s -->
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search for..">
                                        <button type="submit"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->