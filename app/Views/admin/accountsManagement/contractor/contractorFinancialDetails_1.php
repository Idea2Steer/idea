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
                <div class="card custom_card">
                      <div class="card-body" >
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Contractor Name</th>
                                                <th>Total Project</th>
                                                <th>Total Paid Amount</th> 
                                                <th>Runing Project</th> 
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
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