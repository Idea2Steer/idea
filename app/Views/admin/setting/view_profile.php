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
         <!-- end page title -->
         <div class="row">
            <div class="col-4">
               <div class="card custom_card">
                  <div class="card-body">
                     <div class="text-center">
                        <div>
                           <?php $profile_pic = $user_info->profile_pic == '' ? 'defalt_image.png' : $user_info->profile_pic; ?>
                           <img src="<?php echo base_url('public/upload/profile_image/'.$profile_pic); ?>" class=" rounded-circle img-thumbnail" style="width: 80px;height: 80px;border: 2px solid #ccc;">
                          
                            <div class="dropdown mt-4 mt-sm-0 c_edit_icon">
                                <a href="#" class="btn btn-primary  dropdown-toggle waves-effect btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?=base_url('Admin/editContact/'.$user_info->user_id)?>">Edit Profile!</a>
                                    <a class="dropdown-item" href="<?=base_url('Admin/changePassword')?>">Change Password!</a>
                                    <a class="dropdown-item" href="<?=base_url('Admin/companyDetails')?>">Update Comapny Details!</a>
                                    
                                </div>
                             </div>
                        </div>
                        <h5 class="mt-3 mb-1"><?php echo  $user_info->first_name.' '.$user_info->last_name; ?></h5>
                        <p class="text-muted"><?=$user_info->designation?></p>
                     </div>
                     <hr class="my-4">
                     <div class="row">
                          <div class="col-12">
                                <table class="table table-bordered">
                                   <tbody>
                                     <tr>
                                       <td><h6 class="mb-1">Name</h6></td>
                                       <td><?php echo  $user_info->first_name.'  '.$user_info->last_name; ?></td>
                                     </tr>
                                     <tr>
                                       <td><h6>Mobile</h6></td>
                                       <td><?php echo $user_info->phone_no =='' ? 'N/A' : $user_info->phone_no; ?></td>
                                     </tr>
                                     <tr>
                                       <td><h6>Email</h6></td>
                                       <td><?php echo $result->email ?></td>
                                     </tr>
                                     <tr>
                                       <td><h6>Address</h6></td>
                                       <td><?php echo $user_info->address =='' ? 'N/A' : $user_info->address; ?></td>
                                     </tr>
                                     <tr>
                                       <td><h6>Country</h6></td>
                                       <td>
                                        <?php 
                                            if($user_info->country == ''){
                                                echo "N/A";
                                            }else{ 
                                                echo getCountryName($user_info->country); 
                                            }
                                        ?>
                                            
                                        </td>
                                     </tr>
                                     <tr>
                                       <td><h6>State</h6></td>
                                       <td>
                                          <?php 
                                            if($user_info->state == ''){
                                                echo "N/A";
                                            }else{
                                                echo getStateName($user_info->state);
                                            } 
                                          ?>
                                       </td>
                                     </tr>
                                     <tr>
                                       <td><h6>City</h6></td>
                                       <td>
                                         <?php 
                                           if($user_info->city == ''){
                                            echo "N/A";
                                           }else{
                                            echo getCityName($user_info->city);
                                            } 
                                         ?>
                                       </td>
                                     </tr>
                                     
                                     
                                  </tbody>  
                                  </table> 
                          </div>
                      </div>          
                     <hr class="my-2">
                        <div class="row">
                                <div class="col-3 c_icon">
                                    <a href="<?=$user_info->facebook_link?>" target="_blank"><i class="fab fa-facebook-square" style="color: #4867aa;"></i></a>
                                </div>
                                <div class="col-3 c_icon">
                                       <a href="<?=$user_info->facebook_link?>" target="_blank"><i class="fab fa-instagram-square" style="color: #a72eb9;"></i></a>
                                </div>
                                <div class="col-3 c_icon">
                                       <a href="<?=$user_info->facebook_link?>" target="_blank"><i class="fab fa-linkedin-square" style="color: #0a66c2;"></i></a>
                                </div>
                                <div class="col-3 c_icon">
                                      <a href="<?=$user_info->facebook_link?>" target="_blank"><i class="fab fa-twitter-square" style="color: #1da1f2;"></i></a>
                                </div>
                        </div>
                  </div>
               </div>
            </div>

            <div class="col-8">
               <div class="card custom_card">
                  <div class="card-body" >   
                      <h5 class="font-size-16 mb-4">Credit Card information
                        <div style="float: right;"><button type="button" class="btn btn-primary btn-sm"  onclick="addNewCardInfo()"><i class="fa fa-plus"></i> Add More</button></div>
                      </h5> 
                      <table class="table table-bordered">
                           <thead>
                             <tr>
                               <th>Sno.</th>
                               <th>Card No.</th>
                               <th>Card Holder Name</th>
                               <th>Card Expiry</th>
                               <th>Status</th>
                               <th>Actions</th>
                               
                             </tr>
                           </thead>
                           <tbody>
                            <?php 
                                $cl=0;
                            foreach ($user_card_list as $valueCL) { $cl++;?>
                             <tr>
                               <td><?=$cl?></td>
                               <td><?=$valueCL->card_no?></td>
                               <td><?=$valueCL->card_holder_name?></td>
                               <td><?=$valueCL->card_expiry_month.'/'.$valueCL->card_expiry_year?></td>
                               <td>Actvie</td>
                               <td>
                                <a href="javascript:void(0)" title="Edit Project" onclick="editCardInformation('<?=$valueCL->card_details_id?>')"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" style="color: red;" onclick="deleteCardInformation('<?=$valueCL->card_details_id?>')"><i class='fas fa-trash-alt'></i></a>
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



<!-- sample modal content -->
<div id="myaddCreditCardInformationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add  Credit Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  action="<?php echo base_url('Admin/saveUserCardDetails '); ?>" method="post"  enctype="multipart/form-data" id="saveUserCardDetailsForm">
            <div class="modal-body">
              <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                      <label for="email">Name:</label>
                      <input type="text" class="form-control" placeholder="Enter your name" id="card_holder_name" name="card_holder_name">
                      <p class="error" id="err_card_holder_name"></p>
                    </div>
                  </div>
              </div> 
              <div class="row mt-3">
                  <div class="col-12">
                     <div class="form-group">
                      <label for="email">Credit Card Number:</label>
                      <input type="text" class="form-control" placeholder="0000 0000 0000 0000" id="card_no" name="card_no">
                      <p class="error" id="err_card_no"></p>
                    </div>
                  </div>
              </div> 

              <div class="row mt-3">
                  <div class="col-4">
                     <div class="form-group">
                      <label for="email">Month:</label>
                      <select class="form-control" id="card_expiry_month" name="card_expiry_month">
                          <?php for ($i=1; $i <=12 ; $i++) { ?>
                          <option value="<?=$i?>"><?=$i?></option>
                          <?php } ?>
                      </select>  
                    </div>
                  </div>
                  <div class="col-4">
                     <div class="form-group">
                      <label for="email">Year:</label>
                      <select class="form-control" id="card_expiry_year" name="card_expiry_year">
                          <?php for ($y=date('y'); $y <= (date('y')+10); $y++) { ?>
                          <option value="<?=$y?>"><?=$y?></option>
                          <?php } ?> 
                      </select>  
                    </div>
                  </div>
                  <div class="col-4">
                     <div class="form-group">
                      <label for="email">CVV/CVC:</label>
                      <input type="text" class="form-control" placeholder="123" id="cvv_cvc" name="cvv_cvc"> 
                      <p class="error" id="err_cvv_cvc"></p>
                    </div>
                  </div>
              </div> 
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="process_type" id="process_type" value="add">
                <input type="hidden" name="card_details_id" id="card_details_id">   
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal" id="submiteAdminButtons_c">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="saveCreditCardInfo()" id="submiteAdminButtons">Save</button>
                <button type="button" disabled="" class="btn btn-primary waves-effect waves-light" style="display: none;" id="waiteAdminButtons" ><i class="fa fa-spinner fa-spin"></i> Please Wait..</button>   
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?=$this->endSection()?>
