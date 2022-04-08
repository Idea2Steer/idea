 <div class="row tab_content" id="tab_content_1">
              <div class="col-xl-12">
                  <div class="card custom_card">
                      <div class="card-body" >
                        <div class="row">
                           <div class="col-xl-12">
                            <h4>Basic Information</h4>
                           </div>
                        </div>      
                        <div class="row mt-1 mb-3">
                           <div class="col-xl-6">
                                <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-users'></i></span>
                                   <select class="form-control" id="user_type_id" name="user_type_id">
                                      <option value="2" <?php if($result->user_type_id == '2'){?>selected <?php } ?>>Employee</option>
                                      <option value="3" <?php if($result->user_type_id == '3'){?>selected <?php } ?>>Contractor</option>
                                      <option value="4" <?php if($result->user_type_id == '4'){?>selected <?php } ?>>Client</option>  
                                  </select>
                                </div> 
                                <p class="error" id="err_user_type_id"></p>

                           </div>
                           <div class="col-xl-6">
                                <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-user-tie'></i></span>
                                   <select class="form-control" id="designation" name="designation">
                                      <option value="">Select designation</option>
                                      <option value="Ceo" <?php if($result->designation == 'Ceo'){?>selected <?php } ?>>Ceo</option>
                                      <option value="Cfo" <?php if($result->designation == 'Cfo'){?>selected <?php } ?>>Cfo</option>
                                      <option value="Coo" <?php if($result->designation == 'Coo'){?>selected <?php } ?>>Coo</option>
                                      <option value="Chr" <?php if($result->designation == 'Chr'){?>selected <?php } ?>>Chr</option>
                                      <option value="Project manager" <?php if($result->designation == 'Project manager'){?>selected <?php } ?>>Project manager</option>
                                      <option value="Seo" <?php if($result->designation == 'Seo'){?>selected <?php } ?>>Seo</option>
                                      <option value="Digital marketing" <?php if($result->designation == 'Digital marketing'){?>selected <?php } ?>>Digital marketing</option>
                                      <option value="Content manager" <?php if($result->designation == 'Content manager'){?>selected <?php } ?>>Content manager</option>
                                      <option value="Ui/ux designer" <?php if($result->designation == 'Ui/ux designer'){?>selected <?php } ?>>Ui/ux designer</option>
                                      <option value="Developer" <?php if($result->designation == 'Developer'){?>selected <?php } ?>>Developer</option>
                                  </select>
                                </div> 
                                <p class="error" id="err_designation"></p>
                           </div>
 
                           
                        </div> 

                        <div class="row mb-3">
                          <div class="col-xl-6">
                              <div class="input-group">
                                <span class="input-group-text"><i class='fas fa-user-graduate'></i></span>
                                <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="<?=$result->first_name?>">
                                <input type="text" class="form-control" placeholder="Last Name"  id="last_name" name="last_name" value="<?=$result->last_name?>">
                              </div> 
                              <p class="error" id="err_first_name"></p>
                              <p class="error" id="err_last_name"></p>
                          </div>
                          <div class="col-xl-6">
                               <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                  <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?=$result->email?>" disabled>
                                </div>
                                <p class="error" id="err_email"></p>
                           </div>
                        </div> 


                        <div class="row mb-3">
                           <div class="col-xl-6">
                               <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                  <input type="text" class="form-control" placeholder="Phone no"  id="phone_no" name="phone_no" value="<?=$result->phone_no?>">
                                </div>
                                <p class="error" id="err_phone_no"></p>
                           </div>
                           <div class="col-xl-6">
                              <div class="input-group">
                                  <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                                  <input type="hidden" class="form-control" id="profile_pic_old" name="profile_pic_old" value="<?=$result->profile_pic?>">
                                </div>
                           </div>
                        </div> 
   
                      </div>

                  </div>
              </div>
          </div>