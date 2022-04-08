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
            <div class="col-md-12">
               <div class="card custom_card">
                  <div class="card-body">
                       <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- 111111111111 -->
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <h4 class="float-end font-size-16">Invoice #<?=$invoice_info->invoice_unique_id?> <span class="badge bg-success font-size-12 ms-2"><?=$invoice_info->invoice_for?></span></h4>
                                            <div class="mb-4">
                                                <img src="<?=base_url('public/upload/company_logo/'.$company_info->company_logo)?>" alt="logo" height="50"/>
                                            </div>
                                            <div class="text-muted">
                                                <p class="mb-1"><?=$company_info->company_address?></p>
                                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> <?=$company_info->company_owner?></p>
                                                <p><i class="uil uil-phone me-1"></i> <?=$company_info->company_phone?></p>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="text-muted">
                                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                                    <h5 class="font-size-15 mb-2"><?=$user_info->first_name.' '.$user_info->last_name?> (<?=$user_info->designation?>)</h5>
                                                    <p class="mb-1"><?=$user_info->address?></p>
                                                    <p class="mb-1"><?=$user_basic_info->email?></p>
                                                    <p><?=$user_info->phone_no?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-muted text-sm-end">
                                                    <div>
                                                        <h5 class="font-size-16 mb-1">Invoice No:</h5>
                                                        <p>#<?=$invoice_info->invoice_unique_id?></p>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                                        <p><?=date_format(date_create($invoice_info->invoice_date),"d M, Y")?></p>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="py-2">
                                            <h5 class="font-size-15">Invoices summary</h5>

                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-centered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 70px;">No.</th>
                                                            <th>Project Name</th>
                                                            <th>Price Type</th>
                                                            <th>Total Hours</th>
                                                            <th>Amount</th>
                                                            <th class="text-end" style="width: 120px;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">01</th>
                                                            <td><?=$invoice_info->project_title?></td>
                                                            <td><?=$invoice_info->price_type?></td>
                                                            <?php  $total_hours    =  $invoice_info->price_type == 'Fixed' ? 'N/A' : $invoice_info->total_hours; ?>
                                                            <td><?=$total_hours?></td>
                                                            <td><?=$invoice_info->total_amount?></td>
                                                            <td class="text-end">$<?=$invoice_info->total_amount?></td>
                                                        </tr>
                                                        
                                                        


                                                        <tr>
                                                            <th scope="row" colspan="5" class="text-end">Sub Total</th>
                                                            <td class="text-end">$<?=$invoice_info->total_amount?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="5" class="border-0 text-end">
                                                                Discount :</th>
                                                            <td class="border-0 text-end">- $0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="5" class="border-0 text-end">
                                                                Tax</th>
                                                            <td class="border-0 text-end">$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="5" class="border-0 text-end">Total</th>
                                                            <td class="border-0 text-end"><h4 class="m-0">$<?=$invoice_info->total_amount?></h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- <div class="d-print-none mt-4">
                                                <div class="float-end">
                                                    <a href="<?=base_url('public/upload/invoice_pdf/'.$invoice_info->invoice_pdf)?>" class="btn btn-primary w-md waves-effect waves-light" download>Download</a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                  </div>
               </div>
            </div>
            <!-- end col-->
             
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