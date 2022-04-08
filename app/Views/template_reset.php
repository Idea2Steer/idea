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
      <input type="hidden" name="base_urls" id="base_urls" value="<?=base_url();?>/">
   </head>
    <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <div class="login_left_area">
                  <div class="logo">
                      <img src="<?php echo base_url('public/assets/images/front_img/logo.png'); ?>">
                  </div>
                  <h2>Reset Password</h2>
                  <h6>Reset Password with Idea to Steer.</h6>
                  <br><br>
               <form class="login_form" action="<?=base_url('Home/resetPasswordProcess')?>"  id="resetPasswordProcessForm"  method="post">
                     <div class="input-group">
                        <label for="email">Email Address</label>
                        <span class="input-group-addon"><img src="<?php echo base_url('public/assets/images/front_img/mail_icon.png'); ?>" style="    padding-top: 20px;"></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email">
                     </div>
                     <p class="error" id="err_email"></p>
                     <button class="btn" type="button" onclick="resetPassword()" id="submiteAdminButtons">RESET</button>
                     <button type="button" disabled="" class="btn" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>

                     <p class="not_register">Already Have An Account? <a href="<?=base_url('/')?>"> Login</a></p>
                     <p class="not_register">Not Register Yet? <a href="<?=base_url('register')?>"> Create An Account</a></p>
                  </form>
                  <p class="copyright">@Ideatosteer.com, All rights Reserved</p>
               </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 pad_0">
               <div class="login_right_area">
                  <img src="<?php echo base_url('public/assets/images/front_img/login_right.png'); ?>">
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