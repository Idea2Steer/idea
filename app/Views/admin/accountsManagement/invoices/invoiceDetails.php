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
         <!-- end page title -->
         <div class="row">
            <div class="col-md-6 col-xl-4">
               <div class="card custom_card">
                  <div class="card-body">
                     <div>
                        <h4 class="mb-2 mt-1"><span data-plugin="counterup"><?=$total_project?></span></h4>
                        <p class="text-muted mb-0">Total Project</p>
                     </div>
                     
                  </div>
               </div>
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-4">
               <div class="card custom_card">
                  <div class="card-body">
                     <div>
                        <h4 class="mb-2 mt-1"><span data-plugin="counterup"><?=$total_received?></span></h4>
                        <p class="text-muted mb-0">Total Received Amount </p>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-4">
               <div class="card custom_card">
                  <div class="card-body">
                     
                     <div>
                        <h4 class="mb-2 mt-1"><span data-plugin="counterup"><?=$total_paid?></span></h4>
                        <p class="text-muted mb-0">Total Paid Amount </p>
                     </div>
                      
                  </div>
               </div>
            </div>
            <!-- end col-->
         </div>


          <div class="row">
                    <div class="col-6">
                        <h5>Received Amount Details   </h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                                  <div class="row">
                                      <div class="col-12">
                                         <a href="<?=base_url('Admin/viewAllInvoices')?>" class="btn btn-primary btn-sm" style="float: right;" >View All Invoices </a>
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
                                                            <?php    echo date_format(date_create($last_received->add_date),"d-M-Y");  ?>
                                                        </td>
                                                   </tr>
                                                </tbody>
                                        </table>
                                      </div>
                                </div>
                           </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h5>Paid Amount Details </h5>
                        <div class="card custom_card">
                          <div class="card-body" > 
                            <div class="row">
                                      <div class="col-12">
                                         <a href="<?=base_url('Admin/viewAllEmployeeInvoices')?>" class="btn btn-primary btn-sm" style="float: right;" >View All Invoices </a>
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
                                                            <?php    echo date_format(date_create($last_paid->add_date),"d-M-Y");  ?>
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

         <!-- end row-->
         <!-- end row -->
         <!-- end row -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
 
</div>
<?=$this->endSection()?>    