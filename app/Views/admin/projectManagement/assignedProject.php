<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
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
                  <div class="alert alert-success alert-dismissible">
                      <strong>Success!</strong> <?php echo session()->getFlashdata('msg'); ?>. 
                  </div>
               </div>  
            </div>  
       <?php } ?>
          <div class="row">
            <div class="col-12">
                <div class="card custom_card">
                      <div class="card-body" >
                          <form action="<?php echo base_url('Admin/saveAssignedInfo'); ?>" id="saveAssignedInfoForm" enctype="multipart/form-data"   method="post">
                              <div class="row">
                                 <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                        <label for="form-label">Select Project :</label>
                                        <select class="select2 form-control" id="project_id" name="project_id">
                                              <option value="">Select Project</option>
                                              <?php foreach ($project_list as $valuePL) { ?>
                                                <option value="<?=$valuePL->project_id?>"><?=$valuePL->project_title?>(<?=$valuePL->project_unique_id?>)</option>
                                              <?php } ?>
                                         </select>  
                                         <p class="error" id="err_project_id"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                         <label for="email">Select User:</label>
                                         <select class="select2 form-control" id="user_id" name="user_id"  >
                                              <option value="">Select User</option>
                                              <?php foreach ($user_list as $valueUL){
                                                   $userInfo =  getUserInfo($valueUL->user_id);
                                               ?>
                                              <option value="<?=$valueUL->user_id?>"><?=ucfirst($userInfo->first_name.' '.$userInfo->last_name)?> (<?=$userInfo->designation?>)</option>
                                              <?php } ?>  
                                         </select>  
                                         <p class="error" id="err_user_id"></p>
                                       </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                         <label for="email">Select Price Type:</label>
                                         <select class="form-control" id="price_type" name="price_type">
                                              <option value="">Select Price Type</option>
                                              <option value="Hourly">Hourly</option>
                                              <option value="Fixed">Fixed</option>
                                         </select>  
                                         <p class="error" id="err_price_type"></p>
                                       </div>
                                 </div>
                                  <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                        <label for="email">Price:</label>
                                        <input type="text" class="form-control" id="price" name="price"> 
                                         <p class="error" id="err_price"></p>
                                      </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                         <label for="email">Select Currency:</label>
                                         <select class="form-control" id="currency" name="currency">
                                              <option value="">Select Currency</option>
                                              <option value="USD">USD</option>
                                              <option value="INR">INR</option>
                                         </select>  
                                         <p class="error" id="err_currency"></p>
                                       </div>
                                 </div>
                                  <div class="col-md-12 col-xl-6">
                                      <div class="form-group">
                                        <label for="email">Assigned On:</label>
                                        <select class="form-control" id="assigned_on" name="assigned_on">
                                             <option value="">Select Assigned On </option>
                                              <option value="Upwork">Upwork</option>
                                              <option value="Freelancer">Freelancer</option>
                                              <option value="Othere">Othere</option>
                                         </select>
                                         <p class="error" id="err_assigned_on"></p>  
                                      </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-12">
                                      <div class="form-group">
                                        <label for="email">Assigned Task:</label>
                                        <textarea class="form-control" name="assigned_task" id="assigned_task"></textarea>
                                         <p class="error" id="err_assigned_task"></p>
                                      </div>
                                 </div>
                                  
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-12 text-center">
                                     <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="saveAssignedInfo();">Save</button> 
                                     <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
                                 </div>
                                  
                              </div>
                           </form>
                      </div>
                </div>          
            </div>
         </div> 

      </div>
   </div>
</div>
<script>
   CKEDITOR.replace('assigned_task');
</script>
<?=$this->endSection()?>    