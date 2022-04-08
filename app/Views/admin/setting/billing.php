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
          <form  action="<?php echo base_url('Admin/saveBankDetails'); ?>" method="post"  enctype="multipart/form-data" id="saveBankDetailsForm">
         <?php if($account_exists == '0'){ ?>
         <div class="form_info form_card" id="save_bank_details">
               <div class="row">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Account holder name:</label>
                         <input type="text" class="form-control ak_select" id="account_holder_name" name="account_holder_name" placeholder="Account holder name">
                         <p class="error" id="err_account_holder_name"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Account number:</label>
                         <input type="text" class="form-control ak_select" id="account_number" name="account_number" placeholder="Account number" >
                          <p class="error" id="err_account_number"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Conf. account number:</label>
                         <input type="text" class="form-control ak_select" id="c_account_number" name="c_account_number" placeholder="Conf. account number" value="">
                         <p class="error" id="err_c_account_number"></p>
                       </div>
                  </div>
               </div>


               <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Bank name:</label>
                         <input type="text" class="form-control ak_select" id="bank_name" name="bank_name" placeholder="Bank name" >
                         <p class="error" id="err_bank_name"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Bank IFSC:</label>
                         <input type="text" class="form-control ak_select" id="bank_ifsc_code" name="bank_ifsc_code" placeholder="Bank IFSC" >
                         <p class="error" id="err_bank_ifsc_code"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Bank branch:</label>
                         <input type="text" class="form-control ak_select" id="bank_branch" name="bank_branch" placeholder="Bank branch" >
                         <p class="error" id="err_bank_branch"></p>
                       </div>
                  </div>
               </div>

                <div class="row mt-3">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Cancal cheque copy:</label>
                         <input type="file" class="form-control ak_select" id="cancelled_cheque" name="cancelled_cheque">
                         <p class="error" id="err_cancelled_cheque"></p>
                       </div>
                  </div>
                 
                  
               </div>

               <div class="row mt-3">
                  <div class="col-md-12 col-xl-12 text-center">
                     <input type="hidden" id="type" name="type" value="add">
                      <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="saveBankDetails()">Save</button>  
                     <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>  
                  </div>
                   
               </div>
            </div>
         <?php }else{ ?>
            <div class="form_info form_card" id="update_bank_details">
               <div class="row">
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Account holder name:</label>
                         <input type="text" class="form-control ak_select" id="account_holder_name" name="account_holder_name" placeholder="Account holder name" value="<?=$bank_details->account_holder_name?>">
                         <p class="error" id="err_account_holder_name"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Account number:</label>
                         <input type="text" class="form-control ak_select" id="account_number" name="account_number" placeholder="Account number" value="<?=$bank_details->account_number?>">
                          <p class="error" id="err_account_number"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Bank name:</label>
                         <input type="text" class="form-control ak_select" id="bank_name" name="bank_name" placeholder="Bank name" value="<?=$bank_details->bank_name?>">
                         <p class="error" id="err_bank_name"></p>
                       </div>
                  </div>
                   
               </div>


               <div class="row mt-3">
                  
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Bank IFSC:</label>
                         <input type="text" class="form-control ak_select" id="bank_ifsc_code" name="bank_ifsc_code" placeholder="Bank IFSC" value="<?=$bank_details->bank_ifsc_code?>">
                         <p class="error" id="err_bank_ifsc_code"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                     <div class="form-group">
                         <label for="email">Bank branch:</label>
                         <input type="text" class="form-control ak_select" id="bank_branch" name="bank_branch" placeholder="Bank branch" value="<?=$bank_details->bank_branch?>">
                         <p class="error" id="err_bank_branch"></p>
                       </div>
                  </div>
                  <div class="col-md-12 col-xl-4">
                       <div class="form-group">
                         <label for="email">Cancal cheque copy:</label>
                         <input type="file" class="form-control ak_select" id="cancelled_cheque" name="cancelled_cheque">
                         <input type="hidden" class="form-control ak_select" id="cancelled_cheque_old" name="cancelled_cheque_old" value="<?=$bank_details->cancelled_cheque?>">
                         <p class="error" id="err_cancelled_cheque"></p>
                       </div>
                  </div>
               </div>
 

               <div class="row mt-3">
                  <div class="col-md-12 col-xl-12 text-center">
                      <input type="hidden" id="type" name="type" value="update">
                     <input type="hidden" class="form-control ak_select" id="bank_details_id" name="bank_details_id" value="<?=$bank_details->bank_details_id?>">
                      <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="updateBankDetails()">Update</button>  
                      <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>     
                  </div>
                   
               </div>
            </div>
            <?php } ?>
          </form>

         <!-- end row-->
         <!-- end row -->
         <!-- end row -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
 
</div>
<?=$this->endSection()?>    