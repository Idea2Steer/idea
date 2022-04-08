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
         <form  action="<?php echo base_url('Admin/saveContactDetails'); ?>" method="post"  enctype="multipart/form-data" id="saveContactDetailsForm">
           
          <!-- Basic Info -->
          <?=$this->include("admin/userManagement/contact_details/basic_info"); ?>
          <!-- Address Information -->
          <?=$this->include("admin/userManagement/contact_details/address_info"); ?>
          <!-- Social Information  -->
          <?=$this->include("admin/userManagement/contact_details/social_info"); ?>

             <div class="row mt-1 mb-4">
              <div class="col-xl-12 " style="text-align: center;">
                <button type="button" class="btn btn-primary btn-lg" onclick="saveBasicInformation()" id="submiteAdminButtons">Submit</button>
                <button type="button" disabled="" class="btn btn-primary waves-effect waves-light btn-lg" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button> 
              </div>
             </div>   
       </form>  

      </div>
   </div>
</div>
<?=$this->endSection()?>    