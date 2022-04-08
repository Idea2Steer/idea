 <?php  
  $userInfo = getUserInfo(session()->get('user_id'));
  $profile_pic = $userInfo->profile_pic == '' ? 'defalt_image.png' : $userInfo->profile_pic;
 ?>
<div class="vertical-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?=base_url('Admin')?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo base_url('public/assets/images/front_img/close_logo.png');?>" alt="" >
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo base_url('public/assets/images/front_img/logo_sidebar.png');?>" alt="" >
                        </span>
                    </a>

                   
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li <?php if($title == 'Dashboard'){ ?>class="vj_active" <?php } ?>>
                              <a href="<?=base_url('Admin')?>" class="waves-effect">
                                    <i class="fa fa-home"></i>
                                    <span>Admin Dashboard</span>
                                </a>
                            </li>
                            
                           <li <?php if($title == 'Add Contact' || $title == 'Employee Contact List' || $title == 'Contractor Contact List' || $title == 'Client Contact List'){ ?>class="vj_active" <?php } ?>>
                              <a href="<?=base_url('Admin/employeeContactList')?>" class="waves-effect">
                                    <i class="fas fa-user-friends"></i>
                                    <span>Contacts</span>
                                </a>
                            </li>
                            
                            <li <?php if($title == 'Project List' || $title == 'Assigned Project List'){ ?>class="vj_active" <?php } ?>>
                              <a href="<?=base_url('Admin/projectList')?>" class="waves-effect">
                                    <i class='fas fa-file-invoice'></i>
                                    <span>Projects</span>
                                </a>
                            </li>

                           <!--  <li <?php if($title == 'Project Financial Details'){ ?>class="vj_active" <?php } ?>>
                              <a href="<?=base_url('Admin/projectFinancialDetails')?>" class="waves-effect">
                                    <i class='fas fa-coins'></i>
                                    <span>Accounts</span>
                                </a>
                            </li> -->

                             <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class='fas fa-coins'></i>
                                    <span>Accounts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li <?php if($title == 'Project Financial Details'){ ?>class="vj_active" <?php } ?>><a href="<?=base_url('Admin/projectFinancialDetails')?>" >Projects</a></li>
                                    <li <?php if($title == 'Generate Invoice'){ ?>class="vj_active" <?php } ?>>
                                        <a href="<?=base_url('Admin/generateInvoice')?>">Generate Invoices</a>
                                    </li>
                                    <li <?php if($title == 'Invoice Details'){ ?>class="vj_active" <?php } ?>><a href="<?=base_url('Admin/invoiceDetails')?>">Invoices</a></li> 
                                </ul>
                            </li>
                            

                            <li><a href="<?=base_url('logout');?>">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </a>
                               
                            </li>

                          <!--   <li class="profile_sidebar"><a href="#">
                                    <img src="<?php echo base_url('public/upload/profile_image/'.$profile_pic); ?>" class="profile_pic_sidebar">
                                    <span><?php echo $userInfo->first_name.' '. $userInfo->last_name?></span>
                                </a>
                               
                            </li> -->

                           

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>