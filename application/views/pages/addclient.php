<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Tenant's Information</h5>
    <br>
    <div class="card m-2 shadow">
      <div class="container">
        <form id="save_customer">
          <div class="row">
            <div class="col-6">
              <div class="p-3">
                <h5>Owner's Information</h5>
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Firstname]"  id="fname" required>
                </div>
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Middlename]" id="mname" required>
                </div>
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Lastname]" id="lname"required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" name="customer[Owner_Address]" id="add" required>
                </div>
                <div class="form-group">
                  <label for="">Contact Number</label>
                  <input type="text" class="form-control" name="customer[Owner_Contact_Num]" id="cont" required>
                </div>
              </div>
            </div>
            <div class="col-6" id="occupantfield">
              <div class="p-3">
                <h5>Occupant's Information</h5>
                <div class="form-check mb-2">
                  <input type="checkbox" class="form-check-input" id="sameas">
                  <label class="form-check-label">Same as Owner's Information</label>
                </div>
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" name="customer[Occu_Firstname]" id="ofname" required>
                </div>
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" class="form-control" name="customer[Occu_Middlename]" id="omname" required>
                </div>
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" name="customer[Occu_Lastname]" id="olname" required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" name="customer[Occu_Address]" id="oadd" required>
                </div>
                <div class="form-group">
                  <label for="">Contact Number</label>
                  <input type="text" class="form-control" name="customer[Occu_Contact_Num]" id="ocont" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="p-3">
                <h5>Stall Information</h5>
                <div class="form-group">
                  <label>Section</label>
                  <select class="form-control form-control-sm" name="customer[section]" >
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
                  <input type="text" class="form-control" id="stallf_buss_id" name="customer[Business_Id]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="">
                  <label for="">Business Name</label>
                  <input type="text" class="form-control" id="stallf_buss_name" name="customer[Business_Name]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="">
                  <label for="">Date Occupied</label>
                  <input type="Date" class="form-control" id="stallf_date_ocu" name="customer[date_occupied]">
                  <span id="" class="text-danger"></span>
                </div>
              </div>
            </div>
            <div class="col-6" id="stall_fields2">
              <br>
              <div class="p-3">
                <div class="form-group" id="">
                  <label for="">Stall Number</label>
                  <input type="text" class="form-control" id="stallf_num"name="customer[Stall_Number]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="dailyfee">
                  <label for="">Daily Fee</label>
                  <input type="text" class="form-control" id="stallf_daily_fee" name="customer[Daily_fee]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="squaremeter">
                  <label for="">Square Meters</label>
                  <input type="text" class="form-control" id="stall_sqr_m" name="customer[Square_meters]">
                  <span id="" class="text-danger"></span>
                </div>
                <div class="form-group" id="floorlevel">
                  <label>Floor Level</label>
                  <select class="form-control form-control-sm" id="stall_flr_lvl" name="customer[Floor_level]">
                    <option value=""></option>
                    <option value="Basement">Basement</option>
                    <option value="Ground Floor">Ground Floor</option>
                    <option value="Second Floor">Second Floor</option>
                    <option value="Third Floor">Third Floor</option>
                    <option value="Fourth Floor">Fourth Floor</option>
                  </select><br>
                </div>
                <div class="form-group" id="floorlevel">
                  <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary bg-dark" onclick="clear();">Clear</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>



<!-- Dark Overlay element -->

<div class="overlay"></div>
