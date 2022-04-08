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
                          <form action="<?php echo base_url('Admin/updateProjectInfo'); ?>" id="saveProjectInfoForm" enctype="multipart/form-data"   method="post">
                              <div class="row">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Project Title :</label>
                                        <input type="text" class="form-control" id="project_title" name="project_title" value="<?=$projectInfo->project_title?>"> 
                                         <p class="error" id="err_project_title"></p>
                                      </div>
                                 </div>

                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Select Client Type :</label>
                                        <select class="form-control" id="user_type_id" name="user_type_id" onchange="getUserListByUserType(this.value)">
                                            <option value="">Select Client Type</option>
                                            <option value="4" <?php if($projectInfo->user_type_id == '4'){?>selected <?php } ?>>Client</option>
                                            <option value="3" <?php if($projectInfo->user_type_id == '3'){?>selected <?php } ?>>Contractor</option>
                                        </select>
                                         <p class="error" id="err_user_type_id"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Client List :</label>
                                        <select class="form-control" id="user_id" name="user_id">
                                            <option value="">Select Client</option>
                                            <?php foreach ($user_list as $value) {  
                                             $userInfo = getUserInfo($value->user_id);
                                            ?>
                                            <option value="<?=$value->user_id?>" <?php if($projectInfo->user_id == $value->user_id){?>selected <?php } ?>>
                                             <?php 
                                                echo $userInfo->first_name.' '.$userInfo->last_name.'('.$userInfo->designation.')';
                                             ?>
                                            </option>
                                            <?php } ?> 
                                        </select>
                                         <p class="error" id="err_user_id"></p>
                                      </div>
                                 </div>
                                 
                              </div>

                              <div class="row mt-3">
                                <div class="col-md-12 col-xl-12" style="text-align: right;">
                                    <button type="button" class="btn btn-success btn-sm" onclick="editProjectAttached('add')"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="editProjectAttached('remove')"><i class="fa fa-times-circle"></i></button>
                                 </div>  
                              </div>

                              <div class="row"  id="all_attached">
                                <?php if(getTotalAttached($projectInfo->project_id) == '0'){ 
                                         $pa= 1;
                                ?>
                                <div class="col-md-12 col-xl-4 mt-3" id="pa_1">
                                      <div class="form-group">
                                        <label for="email">Project Attached - 1 :</label>
                                        <input type="file" class="form-control" id="project_attached_1" name="project_attached_1"> 
                                         <p class="error" id="err_project_attached_1"></p>
                                      </div>
                                </div>
                                 <?php }else{ ?>
                                    <?php $pa =0; foreach ($project_attached as $valuePA) { $pa++;?>
                                    <div class="col-md-12 col-xl-4 mt-3" id="pa_<?=$pa?>">
                                      <div class="form-group">
                                        <label for="email">Project Attached - <?=$pa?> :</label>
                                        <input type="file" class="form-control" id="project_attached_<?=$pa?>" name="project_attached_<?=$pa?>"> 
                                        <p class="error" id="err_project_attached_<?=$pa?>"></p>
                                         <input type="hidden" class="form-control" id="project_attached_old_<?=$pa?>" name="project_attached_old_<?=$pa?>" value="<?=$valuePA->project_attached?>"> 
                                        <input type="hidden" class="form-control" id="project_attached_id_<?=$pa?>" name="project_attached_id_<?=$pa?>" value="<?=$valuePA->project_attached_id?>">  
                                      </div>
                                   </div>
                                   <?php } ?>
                                 <?php } ?>
                              </div>
                               
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-12">
                                      <div class="form-group">
                                        <label for="email">Project Description :</label>
                                        <textarea class="form-control" name="project_description" id="project_description"><?=$projectInfo->project_description?></textarea>
                                         <p class="error" id="err_project_description"></p>
                                      </div>
                                 </div>
                                  
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-12 text-center">
                                    <input type="hidden" name="total_project_attached" id="total_project_attached" value="<?=$pa?>">
                                    <input type="hidden" name="project_id" id="project_id" value="<?=$projectInfo->project_id?>">
                                     <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="saveProjectInfo();">Update</button> 
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
   CKEDITOR.replace('project_description');
</script>
<?=$this->endSection()?>    