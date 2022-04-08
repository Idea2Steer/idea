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
                            <a href="<?=base_url('Admin/addProject')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Project </a>
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
        <?=$this->include("admin/projectManagement/project_menu"); ?>
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
                                                <th>Total Attached</th>
                                                <th>Contractor / Client Name</th>
                                                <th>Status</th>
                                                <th style="width: 60px;">Action</th>
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
                                                    <td>
                                                    <?=getTotalAttached($value->project_id)?>      
                                                    </td>
                                                    <td>
                                                       <?php 
                                                         $UserInfo = getUserInfo($value->user_id);
                                                       ?>   
                                                       <?php echo $UserInfo->first_name.' '.$UserInfo->last_name; ?>
                                                       (<?php echo $UserInfo->designation; ?>)
                                                    </td>    
                                                    <td><?=$status[$value->status]?></td>
                                                    <td style="text-align: center;">
                                                        <div class="dropdown mt-4 mt-sm-0">
                                                            <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?=base_url('Admin/projectInfo/'.$value->project_id)?>">View</a>
                                                                <a class="dropdown-item" href="<?=base_url('Admin/editProject/'.$value->project_id)?>">Edit</a>
                                                                <a class="dropdown-item" href="<?=base_url('Admin/assignedProject')?>">Assign</a>
                                                                <a class="dropdown-item" href="javascript:void(0)" style="color: red;" onclick="deleteProjectInformation('<?=$value->project_id?>')">Delete</a>
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