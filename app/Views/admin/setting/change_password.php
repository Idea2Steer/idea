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
            <div class="col-md-12">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <?php echo session()->getFlashdata('msg'); ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                    </div>
            </div>
          </div>
          <?php } ?>
         <!-- end page title -->
         <div class="form_info form_card">
              <?php if(session()->getFlashdata('msg2') != ''){ ?>
                        <p class="error" style="text-align: center;"><?php echo session()->getFlashdata('msg2'); ?></p>
                     <?php } ?>
            <form action="<?php echo base_url('Admin/updatePassword'); ?>" id="change_password_from"  method="post">
               <div class="row">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">OLD Password:</label>
                         <input type="password" class="form-control ak_select" id="old_password" name="old_password" placeholder="OLD Password"> 
                          <p class="error" id="err_old_password"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">New Password:</label>
                         <input type="password" class="form-control ak_select" id="new_password" name="new_password" placeholder="New Password">
                         <p class="error" id="err_new_password"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Conf. Password:</label>
                         <input type="password" class="form-control ak_select" id="c_password" name="c_password" placeholder="Conf. Password">
                          <p class="error" id="err_c_password"></p>
                       </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12 col-xl-12 text-center">
                      <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="changePassword();">Update</button> 
                      <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
                  </div>
                   
               </div>
            </form>
            </div>
         <!-- end row-->
         <!-- end row -->
         <!-- end row -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
 
</div>
<?=$this->endSection()?>    