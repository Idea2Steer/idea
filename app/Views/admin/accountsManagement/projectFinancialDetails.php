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
                            <a href="<?=base_url('Admin/assignedProject')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Assign</a>
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
       <?=$this->include("admin/accountsManagement/accounts_menu"); ?>
          <div class="row">
            <div class="col-12">
                <div class="card custom_card custom-table-scroll">
                      <div class="card-body" >
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Project ID</th>
                                                <th>Project Title</th>
                                                <th>Received Amount</th>
                                                <th>Paid Amount</th> 
                                                <th style="width: 83px;">Start Date</th> 
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 $i=0;
                                                 $status =  array('0'=>'Created','1'=>'Working','2'=>'Completed','3'=>'Cancelled');
                                                 foreach ($project_list as $value) { $i++;
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$value->project_unique_id?></td> 
                                                    <td><?=$value->project_title?></td> 
                                                    <td><?=getTotalInvoiceAmount($value->project_id,'Received')?></td>  
                                                    <td><?=getTotalInvoiceAmount($value->project_id,'Paid')?></td> 
                                                    <td><?=date_format(date_create($value->create_date),"d-M-Y")?></td>   
                                                    <td>
                                                        <div class="dropdown mt-4 mt-sm-0">
                                                        <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?=base_url('Admin/viewProjectFinancialDetails/'.$value->project_id)?>">View Details</a>
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
<?=$this->endSection()?>    