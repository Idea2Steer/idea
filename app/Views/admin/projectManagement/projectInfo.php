<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<?php $status =  array('0' =>'Created','1'=>'Working','2'=>'Completed','3'=>'Cancelled'); 
     $totalAttached =  getTotalAttached($project_info->project_id); 
?>    
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
                <div class="col-8">
                    <div class="card custom_card" style="min-height: 390px;">
                      <div class="card-body" >   
                        <div class="row">
                          <div class="col-12">
                                <h4><?=$project_info->project_title?></h4>
                                <hr>
                                <p>
                                  <?=$project_info->project_description?>  
                                </p>
                          </div>
                        </div>
                         
                      </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card custom_card">
                      <div class="card-body" >   
                        <div class="row">
                          <div class="col-12">
                                <table  class="table table-bordered">
                                    <tr>
                                        <th colspan="2">Client Information</th>
                                    </tr>
                                    <tbody>
                                         <tr>
                                            <td>Client Type </td>
                                            <td><?=getUserType($project_info->user_type_id)?></td>
                                         </tr>
                                         <tr>
                                            <td>Client Name </td>
                                            <td>
                                                 <?php $UserInfo = getUserInfo($project_info->user_id); ?>
                                                 <?=$UserInfo->first_name.' '.$UserInfo->last_name?> (<?=$UserInfo->designation?>)
                                            </td>
                                         </tr> 
                                          <tr>
                                            <td>Total  Attached</td>
                                            <td><?php echo $totalAttached;?></td>
                                         </tr> 
                                         <tr>
                                            <td>Create Date</td>
                                             <td><?=date_format(date_create($project_info->create_date),"d-m-Y H:iA");?></td>
                                         </tr> 
                                         <tr>
                                           <td>Assigned Dev.</td>
                                           <td><?=getTotalAssigned($project_info->project_id)?></td>
                                         </tr>   
                                         <tr>
                                           <td>Status</td>
                                           <td><?=$status[$project_info->status]?></td> 
                                         </tr>
                                    </tbody>
                               </table>  
                          </div>
                        </div>
                         
                      </div>
                    </div>
                </div>
              </div>  
              <?php 
                  if($totalAttached > '0'){
               ?>
                   <div class="row">
                        <div class="col-12">
                            <h5>Attached Files</h5>
                            <div class="card custom_card">
                              <div class="card-body" >   
                                <div class="row mt-3">
                                    <div class="col-12">
                                       <table  class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sno.</th>
                                            <th>Attached File</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         <?php $af=0; foreach ($project_attached as $valuePA) { $af++;?>
                                           <tr style="line-height: 30px;">
                                                <td><?=$af?>.</td>
                                                <td style="padding-left: 10px;"><?=$valuePA->project_attached?></td>
                                                <td>
                                                    <a href="<?=base_url('public/upload/project_attached/'.$valuePA->project_attached)?>" style="padding-left: 10px;" download><i class="fa fa-download"></i></a>
                                                </td>
                                           </tr>
                                         <?php } ?> 
                                        </tbody>
                                       </table>
                                    </div>
                                </div>
                                 
                              </div>
                            </div>
                        </div>
                      </div>     
              <?php } ?>   
         <!-- end row -->
         <!-- end row -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
 
</div>
  
<?=$this->endSection()?>    