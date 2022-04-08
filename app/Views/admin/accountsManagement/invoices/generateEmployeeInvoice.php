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
       <?=$this->include("admin/accountsManagement/invoices/invoices_menu"); ?>
         <!-- end page title -->
          <div class="row">
            <div class="col-12">
                <div class="card custom_card">
                      <div class="card-body" >
                          <form action="<?php echo base_url('Admin/saveInvoiceDetails'); ?>" id="saveInvoiceDetailsForm" enctype="multipart/form-data"   method="post">
                            <div class="row">
                                <div class="col-md-12 col-xl-12" style="text-align: right;">
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                           <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myCustomInvoiceModal">Custom Invoice</a>
                                           <a class="dropdown-item" href="<?=base_url('Admin/viewAllEmployeeInvoices')?>">View All Invoice</a>
                                        </div>
                                    </div>
                                </div>      
                            </div>    
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Select Project :</label>
                                        <select class="form-control" id="project_id" name="project_id" onchange="getEmployeeByProjectID(this.value)">
                                            <option value="">Select Project</option>
                                            <?php foreach ($project_list as $value) { ?>
                                            <option value="<?=$value->project_id?>"><?=$value->project_title?></option> 
                                            <?php } ?>
                                        </select>
                                         <p class="error" id="err_project_id"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Select User :</label>
                                        <select class="form-control" id="user_id" name="user_id" onchange="getEmployeeHireInfo(this.value)">
                                            <option value="">Select User</option>
                                        </select>
                                         <p class="error" id="err_user_id"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Total Paid :</label>
                                         <input type="text" class="form-control" id="total_paid" name="total_paid" value="0" disabled> 
                                         <p class="error" id="err_total_paid"></p>
                                      </div>
                                 </div>
                               </div>

                               <div class="row mt-3" id="hire_info" style="display: none;">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Hire  Type:</label>
                                         <input type="text" class="form-control" id="hire_type" name="hire_type" value="N/A" disabled> 
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Price:</label>
                                         <input type="text" class="form-control" id="price" name="price" value="N/A" disabled> 
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Hire On :</label>
                                         <input type="text" class="form-control" id="hire_on" name="hire_on" value="N/A" disabled> 
                                      </div>
                                 </div>
                               </div>

                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                        <label for="email">Price Type :</label>
                                        <select class="form-control" id="price_type" name="price_type" onchange="enableTotalHours(this.value)">
                                            <option value="">Select Price Type</option>
                                            <option value="Hourly">Hourly</option>
                                            <option value="Fixed">Fixed</option> 
                                        </select>
                                        <p class="error" id="err_price_type"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Total Hours :</label>
                                         <label for="email" class="form-label">Total Hours:</label>
                                         <input type="text"  class="form-control total_hours" id="total_hours" name="total_hours" placeholder="Total Hours" disabled>
                                         <p class="error" id="err_total_hours"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Amount :</label>
                                          <input type="text"  class="form-control" id="total_amount" name="total_amount" placeholder="Amount">
                                          <p class="error" id="err_total_amount"></p>
                                      </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Invoice / Received Date:</label>
                                         <input type="date"  class="form-control" id="invoice_date" name="invoice_date" placeholder="Invoice Date">
                                         <p class="error" id="err_invoice_date"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">From Date :</label>
                                         <input type="date"  class="form-control" id="from_date" name="from_date" placeholder="From Date">
                                         <p class="error" id="err_from_date"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">To Date:</label>
                                         <input type="date"  class="form-control" id="to_date" name="to_date" placeholder="To Date">
                                         <p class="error" id="err_to_date"></p>
                                      </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
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
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                         <label for="email">Invoice Copy :</label>
                                         <input type="file"  class="form-control" id="invoice_copy" name="invoice_copy">
                                         <p class="error" id="err_invoice_copy"></p>
                                      </div>
                                 </div>
                                 <div class="col-md-12 col-xl-4">
                                      <div class="form-group">
                                           <label for="email" class="form-label">Remark:</label>
                                           <input type="text"  class="form-control" id="remark" name="remark" placeholder="Remark">
                                           <p class="error" id="err_remark"></p>
                                      </div>
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <div class="col-md-12 col-xl-12 text-center">
                                    <input type="hidden" name="invoice_for" id="invoice_for" value="Paid">  
                                     <input type="hidden" name="invoice_type" id="invoice_type" value="Regular">   
                                     <button type="button" class="btn btn-primary waves-effect waves-light" id="submiteAdminButtons" onclick="saveInvoiceDetails();">Save</button> 
                                     <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
                                 </div>
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



<!-- Received Invoice -->
<div class="modal" id="myCustomInvoiceModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Custom Invoice</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
     <form action="<?=base_url('Admin/saveCustomInvoiceDetails')?>" id="saveCustomInvoiceForm" enctype="multipart/form-data" method="post">
      <div class="modal-body">
         <div class="row mt-3">
                <div class="col-6">
                     <label for="email" class="form-label">Select Employee:</label>
                    <select class="form-control" id="c_user_id" name="c_user_id">
                        <option value="">Select Employee </option>
                        <?php foreach ($client_list as  $value) { 
                            $userInfo     = getUserInfo($value->user_id); 
                            $user_name    = $userInfo->first_name.' '.$userInfo->last_name; 
                        ?>
                        <option value="<?=$value->user_id?>"><?=$user_name?> (<?=$userInfo->designation?>)</option>
                        <?php } ?>
                    </select>
                    <p class="error" id="err_c_user_id"></p>
                </div>
                 <div class="col-6">
                     <label for="email" class="form-label">Descriptions:</label>
                     <textarea class="form-control" id="c_descriptions" name="c_descriptions" rows="1" style="height: 30px;"></textarea>
                     <p class="error" id="err_c_descriptions"></p>
                </div>
          </div>
           
          <div class="row  mt-3">
                <div class="col-6">
                     <label for="email" class="form-label">Price Type:</label>
                    <select class="form-control" id="c_price_type" name="c_price_type" onchange="enableTotalHours(this.value)">
                        <option value="">Select Price Type</option>
                        <option value="Hourly">Hourly</option>
                        <option value="Fixed">Fixed</option> 
                    </select>
                    <p class="error" id="err_c_price_type"></p>
                </div>
                 <div class="col-6">
                     <label for="email" class="form-label">Total Hours:</label>
                    <input type="text"  class="form-control total_hours" id="c_total_hours" name="c_total_hours" placeholder="Total Hours" disabled>
                    <p class="error" id="err_c_total_hours"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">Amount:</label>
                   <input type="text"  class="form-control" id="c_total_amount" name="c_total_amount" placeholder="Amount">
                   <p class="error" id="err_c_total_amount"></p>
                </div>
                 <div class="col-6">
                    <label for="email" class="form-label">Invoice / Received Date:</label>
                    <input type="date"  class="form-control" id="c_invoice_date" name="c_invoice_date" placeholder="Invoice Date">
                    <p class="error" id="err_c_invoice_date"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">From Date:</label>
                   <input type="date"  class="form-control" id="c_from_date" name="c_from_date" placeholder="From Date">
                   <p class="error" id="err_c_from_date"></p>
                </div>
                 <div class="col-6">
                     <label for="email" class="form-label">To Date:</label>
                    <input type="date"  class="form-control" id="c_to_date" name="c_to_date" placeholder="To Date">
                    <p class="error" id="err_c_to_date"></p>
                </div>
          </div>

          <div class="row mt-3">
                <div class="col-6">
                   <label for="email" class="form-label">Invoice Copy:</label>
                   <input type="file"  class="form-control" id="c_invoice_copy" name="c_invoice_copy">
                   <p class="error" id="err_c_invoice_copy"></p>
                </div>
          </div>

          

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" name="c_invoice_for" id="c_invoice_for" value="Paid"> 
        <input type="hidden" name="c_invoice_type" id="c_invoice_type" value="Custom"> 
        <button type="button" class="btn btn-primary" onclick="saveCustomInvoiceDetails()" id="c_submiteAdminButtons">Save</button> 
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="c_submiteAdminButtons_c">Close</button>
        <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="c_waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
      </div>
      </form>

    </div>
  </div>
</div>
<?=$this->endSection()?>    