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
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <div class="login_left_area">
                  <div class="logo">
                     <a href="<?=base_url('/')?>"><img src="<?php echo base_url('public/assets/images/front_img/logo.png'); ?>"></a>
                  </div>
                  <h2>Hi, Welcome to Idea to Steer</h2>
                  <h6>Sign in to continue to Idea to Steer.</h6>
                  <form class="login_form" action="<?php echo base_url('Home/changePasswordProcess'); ?>"  id="updatePassword_from"  method="post">
                     <br>
                     <div class="input-group">
                        <label for="email">New Password</label>
                        <span class="input-group-addon">
                           <img src="<?php echo base_url('public/assets/images/front_img/pass_icon.png'); ?>"></span>
                         <input  type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                     </div>
                     <p class="error" id="err_new_password"></p>

                     <br><br>
                     <div class="input-group">
                        <label for="email">Confirm password</label>
                        <span class="input-group-addon"><img src="<?php echo base_url('public/assets/images/front_img/pass_icon.png'); ?>"></span>
                        <input  type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm password">
                     </div>
                     <p class="error" id="err_c_password"></p>
                     <input type="hidden" name="user_id" id="user_id" value="<?=$result->user_id?>"> 
                     <button class="btn" id="submiteAdminButtons" type="button" onclick="updatePassword()">Change</button>
                      <button type="button" disabled="" class="btn" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>
                     
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