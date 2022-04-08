 <?php  
  $userInfo = getUserInfo(session()->get('user_id'));
  $profile_pic = $userInfo->profile_pic == '' ? 'defalt_image.png' : $userInfo->profile_pic;
 ?>
<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?=base_url('Admin')?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('public/assets/images/front_img/close_logo.png');?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('public/assets/images/front_img/logo-dark.png');?>" alt="" height="20">
                                </span>
                            </a>

                            <a href="<?=base_url('Admin')?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('public/assets/images/front_img/logo-sm.png');?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('public/assets/images/front_img/logo-light.png');?>" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." >
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-apps"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="px-lg-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/github.png');?>" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/bitbucket.png');?>" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/dribbble.png');?>" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/dropbox.png');?>" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/mail_chimp.png');?>" alt="mail_chimp">
                                                <span>Mail Chimp</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="<?php echo base_url('public/assets/images/front_img/brands/slack.png');?>" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="uil-minus-path"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block ak_drp">
                            <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." id="headerCustomSearchBox"  name="headerCustomSearchBox" oninput="headerCustomSearch(this.value)">
                                <i class="fa fa-search"></i>

                                <div class="serch_result" id="custom_serch_result">
                                    <ul id="show_userList">
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                        <li><a href="#">Akash goswami</a></li>
                                    </ul>
                                </div>

                            </div>
                        </form>
                        </div>
                        
                        <div class="dropdown d-inline-block ak_drp">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="fa fa-bell"></i> -->
                                <img src="<?php echo base_url('public/assets/images/front_img/notification.png');?>">
                                <span class="badge bg-ak-blue rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Notifications </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> Mark all as read</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript:void(0);" class="text-reset notification-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="uil-shopping-basket"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="text-reset notification-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="<?php echo base_url('public/assets/images/users/avatar-3.jpg');?>" class="rounded-circle avatar-xs" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hour ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="text-reset notification-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="uil-truck"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-reset notification-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="<?php echo base_url('public/assets/images/users/avatar-4.jpg');?>" class="rounded-circle avatar-xs" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="uil-arrow-circle-right me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/upload/profile_image/'.$profile_pic); ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo $userInfo->first_name.' '. $userInfo->last_name?></span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="<?=base_url('Admin/viewProfile')?>"><i class="fa fa-user-circle-o"></i> <span class="align-middle">View Profile</span></a>
                                <!-- <a class="dropdown-item" href="<?=base_url('Admin/billing')?>"><i class='fas fa-file-invoice-dollar'></i> <span class="align-middle">Billing Method</span></a> -->
                                <!-- <a class="dropdown-item d-block" href="<?=base_url('Admin/editProfile')?>"><i class="fa fa-edit"></i> <span class="align-middle">Update Profile</span></a> -->
                                <!-- <a class="dropdown-item" href="<?=base_url('Admin/changePassword')?>"><i class="fa fa-eye"></i> <span class="align-middle">Change Password</span></a> -->
                                <a class="dropdown-item" href="<?=base_url('Admin/companyDetails')?>"><i class="fa fa-building-o"></i> <span class="align-middle">Comapny Details</span></a>
                                <a class="dropdown-item" href="<?=base_url('logout');?>"><i class="fa fa-sign-out"></i> <span class="align-middle">Sign out</span></a>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block ak_drp">
                            <a href="<?=base_url('logout');?>"><button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="<?php echo base_url('public/assets/images/front_img/logout.png');?>" alt="Header Avatar">
                            </button></a>
                        </div>
                      
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="uil-cog"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>