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
                <div class="col-6">
                    <div class="card custom_card">
                          <div class="card-body" >   
                            <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <?php $company_logo = $companyInfo->company_logo =='' ? 'dummy_logo.png' : $companyInfo->company_logo; ?>
                                        <img src="<?=base_url('public/upload/company_logo/'.$company_logo)?>" style="width: 200px;height: 100px;" id="displayImages">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Company Name</td>
                                    <td><?=$companyInfo->company_owner =='' ? 'N/A' : $companyInfo->company_owner;?></td>
                                  </tr>
                                  <tr>
                                    <td>Owner Name</td>
                                    <td><?=$companyInfo->company_name =='' ? 'N/A' : $companyInfo->company_name;?></td>
                                  </tr>
                                  <tr>
                                    <td>Phone No.</td>
                                    <td><?=$companyInfo->company_phone =='' ? 'N/A' : $companyInfo->company_phone;?></td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td><?=$companyInfo->company_address =='' ? 'N/A' : $companyInfo->company_address;?></td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                          </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card custom_card">
                          <div class="card-body" >   
                            <form  action="<?php echo base_url('Admin/updateCompanyDetails'); ?>" method="post"  enctype="multipart/form-data" id="saveBankDetailsForm">
                                <div class="row">
                                    <div class="col-12">
                                         <div class="form-group">
                                            <label for="email">Upload Logo:</label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                                          </div>
                                    </div>
                                </div> 
                                <div class="row mt-4">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label for="email">Company Owner:</label>
                                            <input type="text" class="form-control" id="company_owner" name="company_owner" value="<?=$companyInfo->company_owner?>">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label for="email">Company name:</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?=$companyInfo->company_name?>">
                                          </div>
                                    </div>
                                </div>
                                 
                                <div class="row mt-4">
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label for="email">Company phone:</label>
                                            <input type="text" class="form-control" id="company_phone" name="company_phone" value="<?=$companyInfo->company_phone?>">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="form-group">
                                            <label for="email">Company Address:</label>
                                            <input type="text" class="form-control" id="company_address" name="company_address" value="<?=$companyInfo->company_address?>">
                                          </div>
                                    </div>
                                </div>
                                <div class="row mt-4" style="padding-bottom: 11px;">
                                    <input type="hidden" class="form-control" id="profile_image_old" name="profile_image_old" value="<?=$companyInfo->company_logo?>">
                                    <input type="hidden" name="company_info_id" id="company_info_id" value="<?=$companyInfo->company_info_id?>">
                                    <button type="button" class="btn btn-primary" onclick="updateBankDetails()" id="submiteAdminButtons">Submit</button>
                                    <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>  
                                </div> 
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