<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0"><?=$title?></h4>
               </div>
            </div>
         </div>
         <?php if(session()->getFlashdata('msg') != ''){ ?>
      <div class="row flasMsg">
         <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?php echo session()->getFlashdata('msg'); ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
            </div>
         </div>  
      </div>  
       <?php } ?>
         <!-- end page title -->
        
         <div class="form_info form_card">
            <form  action="<?php echo base_url('Admin/updateProfile'); ?>" method="post"  enctype="multipart/form-data" id="updateProfileForm">
               <div class="row">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">First name:</label>
                         <input type="text" class="form-control ak_select" id="first_name" name="first_name" placeholder="First name" value="<?php echo $user_info->first_name; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Middle name:</label>
                         <input type="text" class="form-control ak_select" id="middle_name" name="middle_name" placeholder="Middle name" value="<?php echo $user_info->middle_name; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Last name:</label>
                         <input type="text" class="form-control ak_select" id="last_name" name="last_name"  placeholder="last name" value="<?php echo $user_info->last_name; ?>">
                       </div>
                  </div>
               </div>
                  <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Phone no. type:</label>
                         <select class="form-control ak_select" id="phone_no_type" name="phone_no_type">
                             <option value="Mobile" <?php if($user_info->phone_no_type == 'Mobile'){?> selected <?php } ?> >Mobile</option>
                             <option value="Work" <?php if($user_info->phone_no_type == 'Work'){?> selected <?php } ?>>Work</option>
                             <option value="Home" <?php if($user_info->phone_no_type == 'Home'){?> selected <?php } ?>>Home</option>
                             <option value="Wattsapp" <?php if($user_info->phone_no_type == 'Wattsapp'){?> selected <?php } ?>>Wattsapp</option>
                         </select>
                         
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Phone no.:</label>
                         <input type="text" class="form-control ak_select" id="phone_no" name="phone_no" placeholder="Phone no." value="<?php echo $user_info->phone_no; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Profile Image:</label>
                         <input type="file" class="form-control ak_select" id="profile_image" name="profile_image">
                         <input type="hidden" id="profile_pic_old" name="profile_pic_old" value="<?php echo $user_info->profile_pic; ?>">
                       </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Address type:</label>
                         <select class="form-control ak_select" id="address_type" name="address_type">
                              <option value="Billing" <?php if($user_info->address_type == 'Billing'){?> selected <?php } ?>>Billing</option>
                              <option value="Shipping" <?php if($user_info->address_type == 'Shipping'){?> selected <?php } ?>>Shipping</option>
                              <option value="Home" <?php if($user_info->address_type == 'Home'){?> selected <?php } ?>>Home</option>
                              <option value="Work" <?php if($user_info->address_type == 'Work'){?> selected <?php } ?>>Work</option>
                         </select>  
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Address:</label>
                         <input type="text" class="form-control ak_select" id="address" name="address" value="<?php echo $user_info->address; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Zip code:</label>
                         <input type="text" class="form-control ak_select" id="zip_code" name="zip_code" placeholder="Zip code" value="<?php echo $user_info->zip_code; ?>">
                       </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">City:</label>
                         <select class="form-control ak_select" id="city_id" name="city_id">
                            <?php  foreach ($city_list as $valueCL){ ?>
                                 <option value="<?php echo $valueCL->city_id; ?>" <?php if($user_info->city == $valueCL->city_id){?>selected=""<?php } ?>><?php echo $valueCL->city_name; ?></option>
                            <?php } ?>
                         </select>
                       
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">State:</label>
                          <select class="form-control ak_select" id="state_id" name="state_id">
                            <?php  foreach ($state_list as $valueSL){ ?>
                                 <option value="<?php echo $valueSL->state_id; ?>" <?php if($user_info->state == $valueSL->state_id) { ?>selected=""<?php } ?>><?php echo $valueSL->state_name; ?></option>
                            <?php } ?>
                         </select>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Facebook link:</label>
                         <input type="text" class="form-control ak_select" id="facebook_link" name="facebook_link" placeholder="facebook link" value="<?php echo $user_info->facebook_link; ?>">
                       </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Instagram link:</label>
                         <input type="text" class="form-control ak_select" id="insta_link" name="insta_link" placeholder="Instagram link" value="<?php echo $user_info->insta_link; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">linkedin link:</label>
                         <input type="text" class="form-control ak_select" id="linkedin_link" name="linkedin_link"  placeholder="linkedin link" value="<?php echo $user_info->linkedin_link; ?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Twitter link:</label>
                         <input type="text" class="form-control ak_select" id="twitter_link" name="twitter_link" placeholder="Twitter link" value="<?php echo $user_info->twitter_link; ?>">
                       </div>
                  </div>
               </div>
               <div class="row mt-3">
                <input type="hidden" class="form-control ak_select" id="user_info_id" name="user_info_id" value="<?php echo $user_info->user_info_id; ?>">
                  <div class="col-md-12 col-xl-12 text-center">
                      <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="updateProfile()">Update Profile</button> 

                      <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>    
                  </div>
               </div>
           </form>
            </div>
      </div>
   </div>
</div>
<?=$this->endSection()?>  