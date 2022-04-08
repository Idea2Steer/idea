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
                  <div style="float: right;">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="viewAddInvoiceForm('Received','<?=$project_info->user_id?>')">Received Invoice</a>
                  </div>
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
                        <div class="row">
                          <div class="col-12">
                                <h4><?=$project_info->project_title?></h4>
                                <hr>
                                <p>
                                  <?=$project_info->project_description?>  
                                </p>
                          </div>
                        </div>
                         <?php  $totalAttached =  getTotalAttached($project_info->project_id); 
                            if($totalAttached > '0'){
                          ?>
                        <div class="row mt-3">
                            <div class="col-12">
                                <h5>Attached Files</h5>
                               <table>
                                 <?php $af=0; foreach ($project_attached as $valuePA) { $af++;?>
                                   <tr style="line-height: 30px;">
                                        <td><?=$af?>.</td>
                                        <td style="padding-left: 10px;"><?=$valuePA->project_attached?></td>
                                        <td>
                                            <a href="<?=base_url('public/upload/project_attached/'.$valuePA->project_attached)?>" style="padding-left: 10px; color: green;" download><i class="fa fa-download"></i></a>
                                            <a href="javascript:void(0);" onclick="deleteAttachedFiles('<?=$project_info->project_id?>','<?=$valuePA->project_attached_id?>')" style="padding-left: 10px; color: red;"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                   </tr>
                                 <?php } ?> 
                               </table>
                            </div>
                        </div>   
                        <?php } ?>
                        <div class="row mt-3">
                          <div class="col-12">
                            <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Client Type </th>
                                        <th>Client Name </th>
                                        <th>Total  Attached</th>
                                        <th>Create Date</th>
                                        <th>Total Assigned Dev.</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><?=getUserType($project_info->user_type_id)?></td>
                                        <td><?php $UserInfo = getUserInfo($project_info->user_id); ?>
                                            <?=$UserInfo->first_name.' '.$UserInfo->last_name?> (<?=$UserInfo->designation?>)
                                        </td>
                                        <td> <?php echo $totalAttached;  ?>   </td>
                                        <td><?=date_format(date_create($project_info->create_date),"d-m-Y H:iA");?></td>
                                        <td><?=getTotalAssigned($project_info->project_id)?></td>
                                        <?php $status =  array('0' =>'Created','1'=>'Working','2'=>'Completed','3'=>'Cancelled');    ?>    
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

                <div class="row">
                    <div class="col-12">
                        <h5>Received Amount Details  
                            <button type="button" class="btn btn-primary btn-sm" style="float: right;" onclick="viewReceivedAmount('Received','<?=$project_info->project_id?>')">View Received All Amount</button>
                        </h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                                 
                                <div class="row mt-3">
                                      <div class="col-12">
                                        <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Total Amount </th>
                                                    <th>Last Received Amount</th>
                                                    <th>Last Received Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?=$total_received_amount?></td>
                                                        <td><?=$last_received_amount?></td>
                                                        <td><?=$last_received_date?></td>
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
                        <h5>Paid Amount Details <button type="button" class="btn btn-primary btn-sm" style="float: right;" onclick="viewReceivedAmount('Paid','<?=$project_info->project_id?>')">View Paid All Amount</button></h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                                <div class="row mt-3">
                                      <div class="col-12">
                                        <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Total Paid Amount </th>
                                                    <th>Last Paid Amount</th>
                                                    <th>Last Paid Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?=$total_paid_amount?></td>
                                                        <td><?=$last_paid_amount?></td>
                                                        <td><?=$last_paid_date?></td>
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
                <div class="col-12" style="text-align: right;">
                     <a href="<?=base_url('Admin/assignedProject')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Assign</a>
                </div>      
              </div> 

              <div class="row">
                <div class="col-12">
                    <div class="card custom_card">
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
                                <th style="width: 90px;">Action</th> 
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
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="viewAddInvoiceForm('Paid','<?=$valuePA->user_id?>')">Paid Invoice</button>
                                        </td>
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

<!-- Received Invoice -->
<div class="modal" id="myReceivedInvoiceModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
     <form action="<?php echo base_url('Admin/saveReceivedInvoiceInfo'); ?>" id="saveReceivedInvoiceInfoForm" enctype="multipart/form-data" method="post">
      <div class="modal-body">
          <div class="row">
                <div class="col-6">
                     <label for="email" class="form-label">Price Type:</label>
                    <select class="form-control" id="price_type" name="price_type" onchange="enableTotalHours(this.value)">
                        <option value="">Select Price Type</option>
                        <option value="Hourly">Hourly</option>
                        <option value="Fixed">Fixed</option> 
                    </select>
                    <p class="error" id="err_price_type"></p>
                </div>
                 <div class="col-6">
                     <label for="email" class="form-label">Total Hours:</label>
                    <input type="text"  class="form-control" id="total_hours" name="total_hours" placeholder="Total Hours" disabled>
                    <p class="error" id="err_total_hours"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">Amount:</label>
                   <input type="text"  class="form-control" id="total_amount" name="total_amount" placeholder="Amount">
                   <p class="error" id="err_total_amount"></p>
                </div>
                 <div class="col-6">
                    <label for="email" class="form-label">Invoice / Received Date:</label>
                    <input type="date"  class="form-control" id="invoice_date" name="invoice_date" placeholder="Invoice Date">
                    <p class="error" id="err_invoice_date"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">From Date:</label>
                   <input type="date"  class="form-control" id="from_date" name="from_date" placeholder="From Date">
                   <p class="error" id="err_from_date"></p>
                </div>
                 <div class="col-6">
                     <label for="email" class="form-label">To Date:</label>
                    <input type="date"  class="form-control" id="to_date" name="to_date" placeholder="To Date">
                    <p class="error" id="err_to_date"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">Invoice Copy:</label>
                   <input type="file"  class="form-control" id="invoice_copy" name="invoice_copy">
                   <p class="error" id="err_invoice_copy"></p>
                </div>
                <div class="col-6">
                   <label for="email" class="form-label">Remark:</label>
                   <input type="text"  class="form-control" id="remark" name="remark" placeholder="Remark">
                   <p class="error" id="err_remark"></p>
                </div>
                  
          </div>

          <div class="row mt-3">
                <div class="col-6">
                     <label for="email" class="form-label">Working Status:</label>
                    <select class="form-control" id="working_status" name="working_status">
                        <option value="">Select Working Status</option>
                        <option value="1">Working</option>
                        <option value="2">Completed</option> 
                        <option value="3">Cancelled</option> 
                        <option value="4">Work push</option> 
                        <option value="5">Work stop</option> 
                    </select>
                    <p class="error" id="err_working_status"></p>
                </div>
          </div>

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" id="rp_project_id" name="rp_project_id" value="<?=$project_info->project_id?>">
        <input type="hidden" id="rp_invoice_type" name="rp_invoice_type" value="">
        <input type="hidden" id="rp_client_user_id" name="rp_client_user_id" value="">
        <button type="button" class="btn btn-primary" onclick="saveReceivedInvoice()" id="submiteAdminButtons">Save</button> 
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="submiteAdminButtons_c">Close</button>
        <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
      </div>
      </form>

    </div>
  </div>
</div>

 

  <div class="modal" id="myReceivedALLAmountDetailsModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="d_modal_title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
          <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Invoice Date</th>
                    <th>Price Type</th>
                    <th>Total Hours</th>
                    <th>Total Amount</th> 
                    <th>Client / Employee</th>  
                  </tr>
                </thead>
                <tbody id="invoice_info">
                   
                </tbody>
              </table>
          </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="submiteAdminButtons_c">Close</button>
      </div>
    </div>
  </div>
</div>
<?=$this->endSection()?>    