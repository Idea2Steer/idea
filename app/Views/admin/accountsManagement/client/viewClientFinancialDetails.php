<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<?php $status =  array('0' =>'Created','1'=>'Working','2'=>'Completed','3'=>'Cancelled'); 
      
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
                

                <div class="col-6">
                    <div class="card custom_card">
                      <div class="card-body" > 
                            <!-- <div class="row">
                              <div class="col-12">
                                 <button style="float: right;" class="btn btn-primary btn-sm" onclick="viewAddInvoiceForm('Received','<?php //$project_info->user_id ?>')">Received Invoice</button>
                                </div> 
                            </div>  -->
                   
                        <div class="row mt-3">
                          <div class="col-12">
                                <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th style="font-size: 12px;">Name</th>
                                            <th style="font-size: 12px;">Email</th>
                                            <th style="font-size: 12px;">Phone</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=$user_info->first_name.' '.$user_info->last_name?></td>
                                                <td><?=$user_basic_info->email?></td>
                                                <td><?=$user_info->phone_no?></td>
                                            </tr>
                                        </tbody>
                                </table> 
                          </div>
                        </div>
                         
                      </div>
                    </div>
                </div>


                <div class="col-6">
                        
                        <div class="card custom_card">
                          <div class="card-body" > 
                            <!-- <div class="row">
                                      <div class="col-12">
                                         <button type="button" class="btn btn-primary btn-sm" style="float: right;" onclick="viewReceivedAmount('Paid','<?php //$project_info->project_id?>')">View Paid All Amount</button>
                                      </div>
                                  </div>  -->

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
                                                        <td><?=getTotalPaidByClint($user_info->user_id)?></td>
                                                        <td><?=$lp_invoice_info->total_amount?></td>
                                                         <td><?=$lp_invoice_info->add_date?></td>
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
                    <div class="card custom_card">
                      <div class="card-body" > 
                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Project Name</th>
                                <th>Total Paid</th>
                                <th>Assn. Developers</th>
                                <th>Last Paid</th>
                                <th>Last Paid Date</th>
                                <th>Status</th> 
                                <th style="width: 90px;">Action</th> 
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $status =  array('0'=>'Created','1'=>'Working','2'=>'Completed','3'=>'Cancelled','4'=>'Work push','5'=>'Work stop');
                                    $i=0; foreach ($project_list as $value) { $i++;
                                    $payemtnInfo = getLastPaymentByProject($value->project_id);
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$value->project_title?></td>
                                    <td><?=$payemtnInfo['total_received_amount']?></td>
                                    <td><?=getTotalAssigned($value->project_id)?></td>
                                    <td><?=$payemtnInfo['last_received_amount']?></td>
                                    <td><?=$payemtnInfo['last_received_date']?></td>
                                    <td><?=$status[$value->status]?></td>
                                    <td>
                                        <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                           <a class="dropdown-item" href="<?=base_url('Admin/projectInfo/'.$value->project_id)?>">Pro. Basic Details</a>
                                           <a class="dropdown-item" href="javascript:void(0)" onclick="getAssignedDevelopers('<?=$value->project_id?>')">Assigned Dev. List</a>
                                           <a class="dropdown-item" href="javascript:void(0)" onclick="viewReceivedAmount('Received','<?=$value->project_id?>')">Pro. Payment Details</a>
                                        </div>
                                     </div>
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



<div id="mygetAssignedDevelopersModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Developers List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
               <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Sno.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Assigned Date</th>
                      </tr>
                    </thead>
                    <tbody id="assigned_dev_list">
                      
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


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