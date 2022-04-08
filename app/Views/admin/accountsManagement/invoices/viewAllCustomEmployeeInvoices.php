<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0" style="width: 100%;"><?=$title?>
                        <div style="float: right;">
                            <a href="<?=base_url('Admin/generateEmployeeInvoice')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Generate Invoice </a>
                        </div>
                  </h4>
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
        <?=$this->include("admin/accountsManagement/invoices/emp_inv_menu"); ?>
          <div class="row">
            <div class="col-12">
                <div class="card custom_card">
                      <div class="card-body" >
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Invoice Id</th>
                                                <th>Descriptions</th>
                                                <th>User Name</th>
                                                <th>Amount</th>
                                                <th>Invoice Date</th>
                                                <th>Download</th>
                                                <th style="width: 60px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0; foreach ($project_invoice as $value) { $i++;
                                                    $userInfo     = getUserInfo($value->user_id); 
                                                    $user_name    = $userInfo->first_name.' '.$userInfo->last_name; 
                                                 ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$value->invoice_unique_id?></td>
                                                    <td><?=$value->descriptions?></td> 
                                                    <td><?=$user_name?> (<?=$userInfo->designation?>)</td> 
                                                    <td><?=$value->total_amount?></td> 
                                                    <td><?=$value->invoice_date?></td> 
                                                    <td>
                                                        <a href="<?=base_url('public/upload/invoice_pdf/'.$value->invoice_pdf)?>" download>Download</a>
                                                    </td> 
                                                    <td>
                                                        <div class="dropdown mt-4 mt-sm-0">
                                                            <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                               <a class="dropdown-item" href="<?=base_url('Admin/viewInvoices/'.$value->invoice_id)?>">View Invoice</a>
                                                                
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

      </div>
   </div>
</div>
<?=$this->endSection()?>    