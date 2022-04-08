<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>IDEA</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="<?php echo base_url('public/assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('public/assets/css/ak_style.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   </head>
   <input type="hidden" name="base_urls" id="base_urls" value="<?=base_url();?>/">
  <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="login_left_area">
                  <div class="logo">
                    <a href="<?=base_url();?>"><img src="<?php echo base_url('public/assets/images/front_img/logo.png'); ?>"></a>
                  </div>
                  <h2>Get Started with Idea to Steer</h2>
                  <h6>Get your Idea to Steer account now.</h6>

                   <div class="row tab_content" id="tab_content_1">
              <div class="col-xl-12">
                  <div class="card custom_card">
                      <div class="card-body" >
                        <div class="row">
                           <div class="col-xl-12">
                            <h4>Confirm your email address</h4>
                           </div>
                        </div>      
                        <div class="row mt-1 mb-3">
                           <div class="col-xl-12">
                                <p>We have sent an email with a confirmation link to your email address. In order to complete the sign-up process, please click the confirmation link.</p>
                                <p>If you do not receive a confirmation email, please check your spam folder. Also, please verify that you entered a valid email address in our sign-up form.</p>
                                <p>If you need assistance, please <a href="#">contact us</a>.</p>
                           </div>
                        </div> 
                      </div>

                  </div>
              </div>
          </div>
                   
                  <p class="copyright">@Ideatosteer.com, All rights Reserved</p>
               </div>
            </div>
             
         </div>
      </div>
   </body>
   <!-- JAVASCRIPT -->
   <script src="<?php echo base_url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/libs/simplebar/simplebar.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/libs/node-waves/waves.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/libs/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/libs/jquery.counterup/jquery.counterup.min.js'); ?>"></script>
   <!-- apexcharts -->
   <script src="<?php echo base_url('public/assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/js/pages/dashboard.init.js'); ?>"></script>
   <!-- App js -->
   <script src="<?php echo base_url('public/assets/js/app.js'); ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/myCustomJs.js'); ?>"></script>
   </body>
</html>