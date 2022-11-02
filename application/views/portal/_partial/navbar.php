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
                                <img src="<?= base_url('bali/');?>assets/img/logo-jepun.png" class="black-logo" alt="image">
                                <img src="<?= base_url('bali/');?>assets/img/logo-jepun.png" class="white-logo" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?= base_url('bali/');?>assets/img/logo-jepun.png" class="black-logo" alt="image">
                            <img src="<?= base_url('bali/');?>assets/img/logo-jepun.png" class="white-logo" alt="image">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link">
                                        Home 
                                    </a>
                                </li>

                                <li class="nav-item <?php echo ($link=='berita')?"active":"";?>">
                                    <a href="<?= base_url("portal/berita");?>" class="nav-link">
                                        Explore
                                    </a>
                                </li>

                                <li class="nav-item <?php echo ($link=='event')?"active":"";?>">
                                    <a href="<?= base_url("portal/event");?>" class="nav-link">
                                        Event
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php echo ($link=='e_lapor'||$link=='e_service')?"active":"";?>">
                                        Public Service 
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item <?php echo ($link=='e_lapor')?"active":"";?>">
                                            <a href="<?= base_url("lapor/lapor");?>" class="nav-link ">
                                                E-Lapor
                                            </a>
                                        </li>

                                        <li class="nav-item <?php echo ($link=='e_service')?"active":"";?>">
                                            <a href="<?= base_url("lapor/service");?>" class="nav-link">
                                                E-Service
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item <?php echo ($link=='kontak')?"active":"";?>">
                                    <a href="<?= base_url("kontak");?>" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                            </ul>

                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search for..">
                                        <button type="submit"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
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