<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Client's Information</h5>

    <div class="card m-2">
      <div class="container">
        <form class="p-3" id="save_customer">
          <div class="row">
            <div class="col-6">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <div class="form-group">
                    <h5>Owner's Information</h5>
                    <label>Client Type</label>
                    <select class="form-control form-control-sm" name="add_customer_form[Client_type]" onchange="clienttype();" id="clientselect" required>
                      <option selected value="">Please Select</option>
                      <option value="0">Tenant</option>
                      <option value="1">Ambulant</option>
                      <option value="2">Delivery</option>
                      <option value="3">Parking</option>
                    </select><br>
                  </div>
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Owner_Firstname]"  id="fname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Owner_Middlename]" id="mname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Owner_Lastname]" id="lname"required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="add_customer_form[Owner_Address]" id="add" required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="add_customer_form[Owner_Contact_Num]" id="cont" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6" id="occupantfield">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <h5>Occupant's Information</h5>
                  <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="sameas">
                    <label class="form-check-label">Same as Owner's Information</label>
                  </div>
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Occu_Firstname]" id="ofname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Occu_Middlename]" id="omname" required>

                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="add_customer_form[Occu_Lastname]" id="olname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="add_customer_form[Occu_Address]" id="oadd" required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="add_customer_form[Occu_Contact_Num]" id="ocont" required>
                  </div>
                  <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary bg-dark" onclick="clear();">Clear</button>
                    <button type="button" class="btn btn-secondary bg-dark" onclick="testambval();">test</button>
                </div>
              </div>
            </div>





            <div class="row">

              <div class="col-6">
                <div id="stall_div">
                <h5>Stall Information</h5>

                <div class="form-group">
                  <label>Section</label>
                  <select class="form-control form-control-sm" name="add_customer_form[section]" >
                    <option selected value="">Please Select</option>
                    <option value="Fish">Fish</option>
                    <option value="Meat">Meat</option>
                    <option value="Section1">Section 1</option>
                    <option value="Section2">Section 2</option>
                  </select><br>
                  <span id="section_error" class="text-danger"></span>
                </div>
                <div class="form-group" id="">
                  <label for="">Business ID</label>
                  <input type="text" class="form-control" id="stallf_buss_id" name="add_customer_form[Business_Id]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="">
                  <label for="">Business Name</label>
                  <input type="text" class="form-control" id="stallf_buss_name" name="add_customer_form[Business_Name]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="">
                  <label for="">Date Occupied</label>
                  <input type="Date" class="form-control" id="stallf_date_ocu" name="add_customer_form[date_occupied]">
                  <span id="" class="text-danger"></span>
                </div>
              </div>

              </div>

              <div class="col-12" id="ambulant_div">
              <h5>Ambulant Information</h5>
              <div class="form-group" id="location" name="ambulant_div">
                <label for="">Location</label>
                <input type="text" class="form-control" id="amlocation" name="add_customer_form[Location]">
                <span id="" class="text-danger"></span>
              </div>
              <div class="form-group" id="locationNum" >
                <label for="">Location Number</label>
                <input type="text" class="form-control" id="amnum" name="add_customer_form[Location_num]">
                <span id="" class="text-danger"></span>
              </div>
            </div>

              <div class="col-6" id="stall_fields2">
                <div class="form-group" id="">
                  <label for="">Stall Number</label>
                  <input type="text" class="form-control" id="stallf_num"name="add_customer_form[Stall_Number]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="dailyfee">
                  <label for="">Daily Fee</label>
                  <input type="text" class="form-control" id="stallf_daily_fee" name="add_customer_form[Daily_fee]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="squaremeter">
                  <label for="">Square Meters</label>
                  <input type="text" class="form-control" id="stall_sqr_m" name="add_customer_form[Square_meters]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="floorlevel">
                  <label>Floor Level</label>
                  <select class="form-control form-control-sm" id="stall_flr_lvl" name="add_customer_form[Floor_level]">
                    <option value=""></option>
                    <option value="Basement">Basement</option>
                    <option value="Ground">Ground Floor</option>
                    <option value="Second">Second Floor</option>
                    <option value="Third">Third Floor</option>
                    <option value="Fourth">Fourth Floor</option>
                  </select><br>
                </div>
              </div>

            </div>

          </form>

          <div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content p-3">
                <h5>Client Added</h5>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
