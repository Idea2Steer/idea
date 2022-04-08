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
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="structureSetting()">Structure Setting</a>
                            <a href="<?=base_url('Admin/addContact')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Contact </a>
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

         <?=$this->include("admin/userManagement/contact_menu"); ?>

          <div class="row">
            <div class="col-12">
                <div class="card custom_card custom-table-scroll">
                      <div class="card-body" >
                          <table id="datatable" class="table table-bordered dt-responsive nowrap employee_table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                 foreach ($result as $value) { $i++;
                                                    $profile_picL = $value->profile_pic == '' ? 'defalt_image.png' : $value->profile_pic;
                                                    if($value->status == '1'){
                                                       $status = 'Active'; 
                                                       $class = 'text-success';
                                                    }else{
                                                       $status = 'Deactivate';
                                                       $class = 'text-danger'; 
                                                    }
                                                  ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><img src="<?=base_url('public/upload/profile_image/'.$profile_picL)?>" class="rounded-circle header-profile-user"></td>
                                                    <td><?=$value->first_name.' '.$value->last_name?></td> 
                                                    <td><?=$value->designation?></td> 
                                                    <td><?=$value->email?></td> 
                                                    <td><?=$value->phone_no?></td> 
                                                    <td class="<?=$class?>"><?=$status?></td>
                                                    <td>
                                                       <a href="<?=base_url('Admin/editContact/'.$value->user_id)?>" title="Edit Employee Info" class="c_action_icons"><i class="fas fa-edit"></i></a>
                                                       <a href="javascript:void(0)" style="color: red;" onclick="deleteContactInformation('<?=$value->user_id?>')" title="Delete Employee Info" class="c_action_icons"><i class='fas fa-trash-alt'></i></a>
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

 <?=$this->include("admin/userManagement/table_structure"); ?>
<?=$this->endSection()?>    