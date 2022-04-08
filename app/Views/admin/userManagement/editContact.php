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
                  <div style="float: right;"><a href="<?=base_url('Admin/employeeContactList')?>" class="btn btn-primary btn-sm">Back</a></div>
               </div>
            </div>
         </div>
          <?php if(session()->getFlashdata('msg') != ''){ ?>
            <div class="row flasMsg">
               <div class="col-12">
                  <div class="alert alert-success alert-dismissible">
                      <strong>Success!</strong> <?php echo session()->getFlashdata('msg'); ?>. 
                  </div>
               </div>  
            </div>  
       <?php } ?>
         <form  action="<?php echo base_url('Admin/updateContactDetails'); ?>" method="post"  enctype="multipart/form-data" id="saveContactDetailsForm">
          <!-- Basic Info -->
          <?=$this->include("admin/userManagement/contact_details/edit/basic_info"); ?>
          <!-- Address Information -->
          <?=$this->include("admin/userManagement/contact_details/edit/address_info"); ?>
          <!-- Social Information  -->
          <?=$this->include("admin/userManagement/contact_details/edit/social_info"); ?>
          <input type="hidden" name="user_id" id="user_id" value="<?=$result->user_id?>">

           <div class="row mt-1 mb-4">
              <div class="col-xl-12 " style="text-align: center;">
                <button  class="btn btn-primary btn-lg"  id="submiteAdminButtons">Update</button>
             </div>
             </div>
       </form>  

      </div>
   </div>
</div>
<?=$this->endSection()?>    