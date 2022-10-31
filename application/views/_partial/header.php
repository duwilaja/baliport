<div class="header top-header">
    <div class="container">
        <div class="d-flex">
            <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
            <a class="header-brand" href="<?=base_url('Portal')?>">
                <img src="<?=base_url()?>assets/portal/img/LOGO-ELING.png" class="header-brand-img desktop-lgo" alt="Aronox logo">
                <img src="<?=base_url()?>assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Aronox logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a>
                <div class="dropdown   header-fullscreen" >
                    <a  class="nav-link icon full-screen-link"  id="fullscreen-button">
                        <i class="mdi mdi-arrow-collapse"></i>
                    </a>
                </div>
                <div class="dropdown header-notify">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span id="notif"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow pt-0">
                        <div class="dropdown-header border-bottom p-4 pt-0 mb-3 w-270">
                            <div class="d-flex">
                                <h5 class="dropdown-title float-left mb-1 font-weight-semibold text-drak">Notifications</h5>
                                <a href="#" class="fa fa-close text-right float-right ml-auto text-muted"></a>
                            </div>
                        </div>
                        <div id="content-notif"></div>
                        
                        <!-- <div class=" text-center p-2 border-top mt-3">
                            <a href="#" class="">View All Notifications</a>
                        </div> -->
                    </div>
                </div>
                <div class="dropdown ">
                    <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile-details mt-2">
                            <span class="mr-3 font-weight-semibold"><?= $this->session->userdata('nama');?></span>
                        </div>
                        <img class="avatar avatar-md brround" src="<?=base_url();?>assets/images/users/1.jpg" alt="image">
                        </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow w-250">
                        <div class="user-profile border-bottom p-3">
                            <div class="user-image"><img class="user-images" src="<?=base_url();?>assets/images/users/1.jpg" alt="image"></div>
                            <div class="user-details">
                                <h4><?= $this->session->userdata('nama');?></h4>
                                <p class="mb-1 fs-13 text-muted"><?= $this->session->userdata('email') ?></p>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi mdi-account-outline text-primary "></i> My Profile</a>
                        <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi mdi-settings text-primary"></i> Setting</a>
                        <a href="<?= site_url('Auth/logout');?>" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi  mdi-logout-variant text-primary"></i>Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>