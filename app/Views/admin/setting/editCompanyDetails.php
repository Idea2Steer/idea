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
           <div class="row">
                <div class="col-12">
                    <div class="card custom_card">
                          <div class="card-body" >   
                            <form  action="<?php echo base_url('Admin/updateCompanyDetails'); ?>" method="post"  enctype="multipart/form-data" id="saveBankDetailsForm">
                            <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <?php $company_logo = $companyInfo->company_logo =='' ? 'dummy_logo.png' : $companyInfo->company_logo; ?>
                                        <img src="<?=base_url('public/upload/company_logo/'.$company_logo)?>" style="width: 200px;height: 100px;cursor: pointer;" id="displayImages" onclick="openFileSection()">
                                        
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="width: 50%;">Company Name</td>
                                    <td> <input type="text" class="form-control custom_border" id="company_name" name="company_name" value="<?=$companyInfo->company_name?>"></td>
                                  </tr>
                                  <tr>
                                    <td>Owner Name</td>
                                    <td><input type="text" class="form-control custom_border" id="company_owner" name="company_owner" value="<?=$companyInfo->company_owner?>"></td>
                                  </tr>
                                  <tr>
                                    <td>Phone No.</td>
                                    <td> <input type="text" class="form-control custom_border" id="company_phone" name="company_phone" value="<?=$companyInfo->company_phone?>"></td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td><input type="text" class="form-control custom_border" id="company_address" name="company_address" value="<?=$companyInfo->company_address?>"></td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="text-align: center;">
                                        <input type="file" class="form-control" id="profile_image" name="profile_image" style="display: none;">
                                        <input type="hidden" class="form-control" id="profile_image_old" name="profile_image_old" value="<?=$companyInfo->company_logo?>">
                                        <input type="hidden" name="company_info_id" id="company_info_id" value="<?=$companyInfo->company_info_id?>">
                                      <button type="button" class="btn btn-primary" onclick="updateBankDetails()" id="submiteAdminButtons">Submit</button>
                                      <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>  
                                      </td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                            </form>  
                          </div>
                    </div>
                </div>
                
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