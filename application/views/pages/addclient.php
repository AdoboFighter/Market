
<div id="content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
                  <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
                  E-Market
                </button>
            </div>
        </nav>

  <div class="container justify-content-center">
    <div class="card">
      <h5 class="card-header text-center bg-primary text-white">Client's Information</h5>
<div class="container">
  <form class="p-3" id="saveclient">


  <div class="row">
  <div class="col-4">
      <div class="span6" style="float: none; margin: 0 auto;">
        <div class="p-3">
          <div class="form-group">
            <h5>Owner's Information</h5>
            <label>Client Type</label>
            <select class="form-control form-control-sm" name="client[Client_type]" onchange="clienttype();" id="clientselect">
              <option value=""></option>
              <option value="tenant">Tenant</option>
              <option value="Ambulant">Ambulant</option>
              <option value="delivery">Delivery</option>
              <option value="parking">Parking</option>
            </select><br>
          </div>
          <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" name="client[OFirstname]">
          </div>
          <div class="form-group">
            <label for="">Middle Name</label>
            <input type="text" class="form-control" name="client[OMiddlename]">
          </div>
          <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="client[OLastname]">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="client[OAddress]">
          </div>
          <div class="form-group">
            <label for="">Contact Number</label>
            <input type="text" class="form-control" name="client[OContactNum]">
          </div>
        </div>
      </div>
  </div>
  <div class="col-4">
          <div class="span6" style="float: none; margin: 0 auto;">
            <div class="p-3">
              <h5>Occupant's Information</h5>
              <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label">Same as Owner's Information</label>
              </div>
              <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="client[OcFirstname]">
              </div>
              <div class="form-group">
                <label for="">Middle Name</label>
                <input type="text" class="form-control" name="client[OcMiddlename]">
              </div>
              <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="client[OcLastname]">
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="client[OcAddress]">
              </div>
              <div class="form-group">
                <label for="">Contact Number</label>
                <input type="text" class="form-control" name="client[OcContactNum]">
              </div>
            </div>
          </div>
  </div>
  <div class="col-4">
          <div class="span6" style="float: none; margin: 0 auto;">
              <div class="form-group" id="bussid">
                <label for="">Business ID</label>
                <input type="text" class="form-control" name="client[Buss_Id]">
              </div>

              <div class="form-group" id="bussname">
                <label for="">Business Name</label>
                <input type="text" class="form-control" name="client[Buss_Name]">
              </div>

              <div class="form-group" id="dateOc">
                <label for="">Date Occupied</label>
                <input type="Date" class="form-control" name="stall[Buss_Name]">
              </div>

              <div class="form-group" id="stallNum">
                 <label for="">Stall Number</label>
                 <input type="text" class="form-control" name="stall[Stall_Number]">
               </div>

               <div class="form-group" id="dailyfee">
                 <label for="">Daily Fee</label>
                 <input type="text" class="form-control" name="stall[Daily_fee]">
               </div>

               <div class="form-group" id="squaremeter">
                 <label for="">Square Meters</label>
                 <input type="text" class="form-control" name="stall[Sqaure_meters]">
               </div>

               <div class="form-group" id="floorlevel">
                 <label>Floor Level</label>
                 <select class="form-control form-control-sm" name="stall[Floor_level]">
                   <option value="Basement">Basement</option>
                   <option value="Ground">Ground Floor</option>
                   <option value="Second">Second Floor</option>
                   <option value="Third">Third Floor</option>
                   <option value="Fourth">Fourth Floor</option>
                 </select><br>
               </div>

               <div class="form-group">
                 <label>Section</label>
                 <select class="form-control form-control-sm" name="stall[Section]" >
                   <option value="Fish">Fish</option>
                   <option value="Meat">Meat</option>
                   <option value="Section1">Section 1</option>
                   <option value="Section2">Section 2</option>
                 </select><br>
              </div>


                <div class="form-group" id="location">
                  <label for="">Location</label>
                  <input type="text" class="form-control" name="stall[Sqaure_meters]">
                </div>

                <div class="form-group" id="locationNum">
                  <label for="">Location Number</label>
                  <input type="text" class="form-control" name="stall[Sqaure_meters]">
                </div>



              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Clear</button>
            </div>


  </div>
</form>
  </div>

    <!-- Dark Overlay element -->

    <div class="overlay"></div>
