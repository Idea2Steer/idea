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
                <div class="col-lg-6 col-md-12 col-sm-12">
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

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card custom_card">
                      <div class="card-body" > 
                          
                        <div class="row mt-3">
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
              <!-- Attached -->
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
              <!-- END Attached -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5>Received Amount Details   </h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                                  <div class="row">
                                      <div class="col-12">
                                         <a href="<?=base_url('Admin/viewAllInvoices')?>" class="btn btn-primary btn-sm" style="float: right;">View Received All Amount</a>
                                      </div>
                                  </div>      
                                <div class="row mt-3">
                                      <div class="col-12">
                                        <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th style="font-size: 12px;">Total Amount </th>
                                                    <th style="font-size: 12px;">Last Received Amount</th>
                                                    <th style="font-size: 12px;">Last Received Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?=$total_received?></td>
                                                        <td><?=$last_received->total_amount?></td>
                                                        <td>
                                                            <?php  
                                                            if($last_received->add_date == 'N/A'){
                                                               echo $last_received->add_date; 
                                                            }else{
                                                                echo date_format(date_create($last_received->add_date),"d-M-Y");
                                                            }
                                                          ?>
                                                        </td>
                                                   </tr>
                                                </tbody>
                                        </table>
                                      </div>
                                </div>
                           </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5>Paid Amount Details </h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                            <div class="row">
                                      <div class="col-12">
                                         <a href="<?=base_url('Admin/viewAllEmployeeInvoices')?>" class="btn btn-primary btn-sm" style="float: right;" >View Paid All Amount</a>
                                      </div>
                                  </div> 

                                <div class="row mt-3">
                                      <div class="col-12">
                                        <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th style="font-size: 12px;">Total Paid Amount </th>
                                                    <th style="font-size: 12px;">Last Paid Amount</th>
                                                    <th style="font-size: 12px;">Last Paid Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?=$total_paid?></td>
                                                        <td><?=$last_paid->total_amount?></td>
                                                        <td>
                                                             <?php  
                                                            if($last_paid->add_date == 'N/A'){
                                                               echo $last_paid->add_date; 
                                                            }else{
                                                               echo date_format(date_create($last_paid->add_date),"d-M-Y");
                                                            }
                                                          ?>
                                                             
                                                        </td>
                                                   </tr>
                                                </tbody>
                                        </table>
                                      </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>  

                
              <div class="row">
                <div class="col-12">
                    <div class="card custom_card custom-table-scroll">
                      <div class="card-body" > 
                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Price Type</th>
                                <th>Price</th>
                                <th>Assigned On</th>
                                <th>Status</th> 
                                 
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $assigned_task_status =  array('0' =>'Assigned','1' =>'Working','2'=>'Complete','3'=>'Cancelled','4'=>'Work push','5'=>'Work stop');
                                $i=0; foreach ($project_assigned as $valuePA) { $i++;
                                    $userInfo =  getUserInfo($valuePA->user_id);
                                     $profile_picL = $userInfo->profile_pic == '' ? 'defalt_image.png' : $userInfo->profile_pic;
                                    ?>
                                 <tr>
                                        <td><?=$i?></td>
                                        <td><img src="<?=base_url('public/upload/profile_image/'.$profile_picL)?>" class="rounded-circle header-profile-user"></td> 
                                        <td><?=$userInfo->first_name.' '.$userInfo->last_name?></td> 
                                        <td><?=$userInfo->designation?></td> 
                                        <td><?=$valuePA->price_type?></td>
                                        <td><?=$valuePA->price?> <?=$valuePA->currency?></td>
                                        <td><?=$valuePA->assigned_on?></td>
                                        <td><?=$assigned_task_status[$valuePA->assigned_task_status]?></td>
                                         
                                 </tr>
                                 <?php } ?>
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