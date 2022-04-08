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
                            <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <?php $company_logo = $companyInfo->company_logo =='' ? 'dummy_logo.png' : $companyInfo->company_logo; ?>
                                        <img src="<?=base_url('public/upload/company_logo/'.$company_logo)?>" style="width: 200px;height: 100px;" id="displayImages"  >
                                        <a href="<?=base_url('Admin/editCompanyDetails')?>" class="c_edit_icon c_icons" style="position: absolute;right: 26px; top: 22px;" data-bs-original-title="Edit Profile!" aria-label="Edit Profile!"><i class="fa fa-edit"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="width: 50%;">Company Name</td>
                                    <td><?=$companyInfo->company_name =='' ? 'N/A' : $companyInfo->company_name;?></td>
                                  </tr>
                                  <tr>
                                    <td>Owner Name</td>
                                    <td><?=$companyInfo->company_owner =='' ? 'N/A' : $companyInfo->company_owner;?></td>
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