<div class="row tab_content" id="tab_content_2">
              <div class="col-xl-12">
                  <div class="card custom_card">
                      <div class="card-body" >
                        <div class="row">
                           <div class="col-xl-12">
                            <h4>Address  Information</h4>
                           </div>
                        </div> 
                        <div class="row mt-1  mb-3">
                           <div class="col-xl-12">
                                <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?=$result->address?>"> 
                                </div> 
                                <p class="error" id="err_address"></p>
                           </div>
                        </div> 
                          <div class="row  mb-3">
                            <div class="col-xl-3">
                               <div class="input-group">
                                  <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                   <select class="form-control" id="country" name="country" onchange="getStateBycountryID(this.value)">
                                      <option value="">Select Contry</option>
                                      <?php foreach ($countries as $valueC) { ?>
                                      <option value="<?=$valueC->id?>" <?php if($valueC->id == $result->country){?>selected <?php } ?>><?=$valueC->name?></option>
                                      <?php } ?>
                                  </select>
                                </div> 
                                <p class="error" id="err_country"></p>
                           </div>
                           <div class="col-xl-3">
                                <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-school'></i></span>
                                   <select class="form-control" id="state" name="state" onchange="getCityList(this.value)">
                                      <?php foreach ($state_list as $valueS) { ?>
                                      <option value="<?=$valueS->id?>" <?php if($valueS->id == $result->state){?>selected <?php } ?>><?=$valueS->name?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                                <p class="error" id="err_state"></p>
                           </div>
                           <div class="col-xl-3">
                               <div class="input-group">
                                  <span class="input-group-text"><i class='fas fa-city'></i></span>
                                   <select class="form-control" id="city" name="city">
                                      <?php foreach ($city_list as $valueCL) { ?>
                                      <option value="<?=$valueCL->id?>" <?php if($valueCL->id == $result->city){?>selected <?php } ?>><?=$valueCL->name?></option>
                                      <?php } ?>
                                  </select>
                                </div> 
                                 <p class="error" id="err_city"></p>
                           </div>
                           <div class="col-xl-3">
                                <div class="input-group">
                                  <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                   <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code" value="<?=$result->zip_code?>">
                                </div> 
                                <p class="error" id="err_zip_code"></p>
                           </div>
                        </div> 
                      
                      </div>
                      <input type="hidden" name="state_status" id="state_status" value="">
                      <input type="hidden" name="city_status" id="city_status" value="">
                  </div>
              </div>
          </div>