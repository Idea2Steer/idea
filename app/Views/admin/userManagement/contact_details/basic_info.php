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
                           <div class="col-xl-6  mt-2">
                                <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-users'></i></span>
                                   <select class="form-control" id="user_type_id" name="user_type_id">
                                      <option value="">Select User Type</option>
                                      <option value="2">Employee</option>
                                      <option value="3">Contractor</option>
                                      <option value="4">Client</option> 
                                  </select>
                                </div> 
                                <p class="error" id="err_user_type_id"></p>

                           </div>
                           <div class="col-xl-6 mt-2">
                                <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-user-tie'></i></span>
                                   <select class="form-control" id="designation" name="designation">
                                      <option value="">Select designation</option>
                                      <option value="Ceo">Ceo</option>
                                      <option value="Cfo">Cfo</option>
                                      <option value="Coo">Coo</option>
                                      <option value="Chr">Chr</option>
                                      <option value="Project manager">Project manager</option>
                                      <option value="Seo">Seo</option>
                                      <option value="Digital marketing">Digital marketing</option>
                                      <option value="Content manager">Content manager</option>
                                      <option value="Ui/ux designer">Ui/ux designer</option>
                                      <option value="Developer">Developer</option>
                                  </select>
                                </div> 
                                <p class="error" id="err_designation"></p>
                           </div>
 
                           
                        </div> 

                        <div class="row mb-3">
                          <div class="col-xl-6 mt-2">
                              <div class="input-group">
                                <span class="input-group-text"><i class='fas fa-user-graduate'></i></span>
                                <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" >
                                <input type="text" class="form-control" placeholder="Last Name"  id="last_name" name="last_name">
                              </div> 
                              <p class="error" id="err_first_name"></p>
                              <p class="error" id="err_last_name"></p>
                          </div>
                          <div class="col-xl-6 mt-2">
                               <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                  <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                </div>
                                <p class="error" id="err_email"></p>
                           </div>
                        </div> 


                        <div class="row mb-3">
                           <div class="col-xl-6 mt-2">
                               <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                  <input type="text" class="form-control" placeholder="Phone no"  id="phone_no" name="phone_no">
                                </div>
                                <p class="error" id="err_phone_no"></p>
                           </div>
                           <div class="col-xl-6 mt-2">
                              <div class="input-group">
                                  <input type="file" class="form-control" id="profile_pic" name="profile_pic" placeholder="Email">
                                </div>
                           </div>
                        </div> 
   
                      </div>

                  </div>
              </div>
          </div>