

<div class="modal" id="myTableStructureModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Structure Setting</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
          <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Column Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                       <td>1.</td>
                       <td>Sno.</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch0" switch="0" onclick="hideTableColumn('0')" checked/>
                                <label for="square-switch0" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>

                  <tr>
                       <td>2.</td>
                       <td>Image</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch1" switch="1" onclick="hideTableColumn('1')" checked/>
                                <label for="square-switch1" data-on-label="Show"  data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                   <tr>
                       <td>3.</td>
                       <td>Name</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch2" switch="2" onclick="hideTableColumn('2')" checked/>
                                <label for="square-switch2" data-on-label="Show"  data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>4.</td>
                       <td>Designation</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch3" switch="3" value="1" onclick="hideTableColumn('3')" checked/>
                                <label for="square-switch3" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>5.</td>
                       <td>Email</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch4" switch="4" onclick="hideTableColumn('4')" checked/>
                                <label for="square-switch4" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>6.</td>
                       <td>Phone No</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch5" switch="5"  onclick="hideTableColumn('5')" checked/>
                                <label for="square-switch5" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>7.</td>
                       <td>Status</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch6" switch="6" onclick="hideTableColumn('6')"  checked/>
                                <label for="square-switch6" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>8.</td>
                       <td>Action</td>
                       <td>
                           <div class="square-switch">
                                <input type="checkbox" id="square-switch7" switch="7" onclick="hideTableColumn('7')" checked/>
                                <label for="square-switch7" data-on-label="Show" data-off-label="Hide"></label>
                            </div>
                       </td>
                  </tr>
                </tbody>
              </table>
          </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="submiteAdminButtons_c">Close</button>
      </div>
    </div>
  </div>
</div>