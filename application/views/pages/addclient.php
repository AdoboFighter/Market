<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads shadow">Tenant's Information</h5>
    <br>
    <div class="card m-2 shadow">
      <div class="container">
        <form id="save_customer">
          <div class="row">
            <div class="col-6" style="border-right: 1px solid #bdc4c6;">
              <div class="p-3">
                <h5 class="font-weight-bold" style="margin-bottom: 40px">Tenant's Information</h5>
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Firstname]" id="fname" required>
                </div>
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Middlename]" id="mname" required>
                </div>
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" name="customer[Owner_Lastname]" id="lname" required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" name="customer[Owner_Address]" id="add" required>
                </div>
                <div class="form-group">
                  <label for="">Contact Number</label>
                  <input type="text" maxlength="11" class="form-control" name="customer[Owner_Contact_Num]" id="cont" required>
                </div>
              </div>
            </div>
            <div class="col-6" id="occupantfield">
              <div class="p-3">
                <h5 class="font-weight-bold">Occupant's Information</h5>
                <div class="form-check mb-2">
                  <input type="checkbox" class="form-check-input" id="sameas">
                  <label class="form-check-label">Same as Tenant's Information</label>
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
                  <input type="text" maxlength="7" class="form-control" name="customer[Occu_Contact_Num]" id="ocont" required>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <br>


      <div class="card m-2 shadow">
        <div class="row">
          <div class="col-6" style="border-right: 1px solid #bdc4c6;">
            <div class="p-3">
              <h5 class="font-weight-bold">Business Information</h5>
              <br>
              <div class="form-group" id="">
                <label for="">Business ID</label>
                <input type="text" maxlength="7" class="form-control" id="stallf_buss_id" name="customer[Business_Id]" required>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="">
                <label for="">Business Name</label>
                <input type="text" class="form-control" id="stallf_buss_name" name="customer[Business_Name]" required>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="">
                <label for="">Date Registered</label>
                <input type="date" class="form-control" id="stallf_date_reg" name="customer[Date_Registered]" required>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="">
                <label for="">Date Renewed</label>
                <input type="date" class="form-control" id="stallf_date_renew" name="customer[Date_Renewed]" required>
                <span id="" class="text-danger"></span>
              </div>


            </div>
          </div>

          <div class="col-6" >
            <div class="p-3">
              <h5 class="font-weight-bold">Stall Information</h5>
              <br>
              <div class="form-group" id="">
                <label for="">Date Occupied</label>
                <input type="Date" class="form-control" id="stallf_date_ocu" name="customer[date_occupied]" required disabled>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="floorlevel">
                <label>Floor Level</label>
                <select class="form-control form-control-sm" id="stall_flr_lvl" name="customer[Floor_level]"required disabled>
                  <option value=""></option>
                  <option value="Basement">Basement</option>
                  <option value="Ground Floor">Ground Floor</option>
                  <option value="Second Floor">Second Floor</option>
                  <option value="Third Floor">Third Floor</option>
                  <option value="Fourth Floor">Fourth Floor</option>
                </select>
              </div>

              <div class="form-group">
                <label>Section</label>
                <select class="form-control form-control-sm" name="customer[section]" id="section_dyna"required disabled>
                  <option selected value="">Please Select</option>
                  <option value="Fish">Fish</option>
                  <option value="Flores - Pat">Flores - Pat</option>
                  <option value="Meat/Chicken">Meat/Chicken</option>
                  <option value="Regidor A">Regidor A</option>
                  <option value="Regidor B">Regidor B</option>
                  <option value="Paterno">Paterno</option>
                  <option value="PAT-VEG">PAT-VEG</option>
                  <option value="2nd FLOOR">2nd FLOOR</option>
                  <option value="Grd. Flr.">Grd. Flr.</option>
                  <option value="Fruit">Fruit</option>
                  <option value="NIGHT MARKET">NIGHT MARKET</option>
                  <option value="Service Road">Service Road</option>
                </select>
                <span id="section_error" class="text-danger"></span>
              </div>

              <div class="form-group" id="">
                <label for="">Stall Number</label>
                <input type="text" class="form-control" id="stallf_num" name="customer[Stall_Number]"required disabled>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="squaremeter">
                <label for="">Square Meters</label>
                <input type="text" class="form-control" id="stall_sqr_m" name="customer[Square_meters]"required disabled>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group" id="dailyfee">
                <label for="" >Daily Fee</label>
                <input type="text" class="form-control" id="stallf_daily_fee" name="customer[Daily_fee]"required disabled>
                <span id="" class="text-danger"></span>
              </div>

              <div class="form-group text-right">
                <button type="reset" class="btn stylish-color-dark text-white" onclick="clear();">Clear</button>
                <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>


          <!-- <div class="col-6" id="stall_fields2" style="margin-top: 15px;">
          <div class="p-3">
          <br>
          <div class="form-group" id="">
          <label for="">Date Occupied</label>
          <input type="Date" class="form-control" id="stallf_date_ocu" name="customer[date_occupied]" required>
          <span id="" class="text-danger"></span>
        </div>

        <div class="form-group" id="floorlevel">
        <label>Floor Level</label>
        <select class="form-control form-control-sm" id="stall_flr_lvl" name="customer[Floor_level]"required>
        <option value=""></option>
        <option value="Basement">Basement</option>
        <option value="Ground Floor">Ground Floor</option>
        <option value="Second Floor">Second Floor</option>
        <option value="Third Floor">Third Floor</option>
        <option value="Fourth Floor">Fourth Floor</option>
      </select>
    </div>

    <div class="form-group">
    <label>Section</label>
    <select class="form-control form-control-sm" name="customer[section]" id="section_dyna"required>
    <option selected value="">Please Select</option>
    <option value="Fish">Fish</option>
    <option value="Flores - Pat">Flores - Pat</option>
    <option value="Meat/Chicken">Meat/Chicken</option>
    <option value="Regidor A">Regidor A</option>
    <option value="Regidor B">Regidor B</option>
    <option value="Paterno">Paterno</option>
    <option value="PAT-VEG">PAT-VEG</option>
    <option value="2nd FLOOR">2nd FLOOR</option>
    <option value="Grd. Flr.">Grd. Flr.</option>
    <option value="Fruit">Fruit</option>
    <option value="NIGHT MARKET">NIGHT MARKET</option>
    <option value="Service Road">Service Road</option>
  </select>
  <span id="section_error" class="text-danger"></span>
</div>

<div class="form-group" id="">
<label for="">Stall Number</label>
<input type="text" class="form-control" id="stallf_num" name="customer[Stall_Number]"required>
<span id="" class="text-danger"></span>
</div>

<div class="form-group" id="squaremeter">
<label for="">Square Meters</label>
<input type="text" class="form-control" id="stall_sqr_m" name="customer[Square_meters]"required>
<span id="" class="text-danger"></span>
</div>

<div class="form-group" id="dailyfee">
<label for="" >Daily Fee</label>
<input type="text" class="form-control" id="stallf_daily_fee" name="customer[Daily_fee]"required>
<span id="" class="text-danger"></span>
</div>

<div class="form-group text-right">
<button type="reset" class="btn stylish-color-dark text-white" onclick="clear();">Clear</button>
<button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
</div>

</div>
</div> -->
</div>
</div>
<br>
<br>
</div>
</div>

</form>

<!-- Dark Overlay element -->

<div class="overlay"></div>
