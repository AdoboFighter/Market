
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
            <select class="form-control form-control-sm" name="client[Client_type]" onchange="clienttype();" id="clientselect" required="">
              <option selected value="">Please Select</option>
              <option value="tenant">Tenant</option>
              <option value="Ambulant">Ambulant</option>
              <option value="delivery">Delivery</option>
              <option value="parking">Parking</option>
            </select><br>
          </div>
          <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" name="client[OFirstname]" id="client[OFirstname]"  required="">
          </div>

          <div class="form-group">
            <label for="">Middle Name</label>
            <input type="text" class="form-control" name="client[OMiddlename]" required="">

          </div>
          <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="client[OLastname]"required="">

          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="client[OAddress]"required="">

          </div>
          <div class="form-group">
            <label for="">Contact Number</label>
            <input type="text" class="form-control" name="client[OContactNum]"required="">

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
                <input type="text" class="form-control" name="client[OcFirstname]"required="">

              </div>
              <div class="form-group">
                <label for="">Middle Name</label>
                <input type="text" class="form-control" name="client[OcMiddlename]"required="">

              </div>
              <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="client[OcLastname]"required="">

              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="client[OcAddress]"required="">

              </div>
              <div class="form-group">
                <label for="">Contact Number</label>
                <input type="text" class="form-control" name="client[OcContactNum]"required="">

              </div>
            </div>
          </div>
  </div>
  <div class="col-4">
          <div class="span6 p-3" style="float: none; margin: 0 auto;">

               <div class="form-group">
                 <label>Section</label>
                 <select class="form-control form-control-sm" name="client[section]" required="">
                   <option selected value="">Please Select</option>
                   <option value="Fish">Fish</option>
                   <option value="Meat">Meat</option>
                   <option value="Section1">Section 1</option>
                   <option value="Section2">Section 2</option>
                 </select><br>
                 <span id="section_error" class="text-danger"></span>
              </div>

              <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Clear</button>
            </div>


  </div>

</form>

<form name="ambulantform" id="ambulantform" class="p-3">
  <h5>Ambulant Information</h5>
  <div class="form-group" id="location">
    <label for="">Location</label>
    <input type="text" class="form-control" id="amlocation" name="ambulant[Location]">
    <span id="" class="text-danger"></span>
  </div>

  <div class="form-group" id="locationNum">
    <label for="">Location Number</label>
    <input type="text" class="form-control" id="amnum" name="ambulant[Location_num]">
    <span id="" class="text-danger"></span>
  </div>

</form>

<form name="stallform" id="stallform" class="p-3">
  <h5>Stall Information</h5>
  <div class="form-group" id="bussid">
    <label for="">Business ID</label>
    <input type="text" class="form-control" id="stallf_buss_id" name="stall[Buss_Id]">
    <span id="" class="text-danger"></span>
  </div>

  <div class="form-group" id="bussname">
    <label for="">Business Name</label>
    <input type="text" class="form-control" id="stallf_buss_name" name="stall[Buss_Name]">
    <span id="" class="text-danger"></span>
  </div>

  <div class="form-group" id="dateOc">
    <label for="">Date Occupied</label>
    <input type="Date" class="form-control" id="stallf_date_ocu" name="stall[date_Oc]">
    <span id="" class="text-danger"></span>
  </div>

  <div class="form-group" id="stallNum">
     <label for="">Stall Number</label>
     <input type="text" class="form-control" id="stallf_num"name="stall[Stall_Number]">
     <span id="" class="text-danger"></span>
   </div>

   <div class="form-group" id="dailyfee">
     <label for="">Daily Fee</label>
     <input type="text" class="form-control" id="stallf_daily_fee" name="stall[Daily_fee]">
     <span id="" class="text-danger"></span>
   </div>

   <div class="form-group" id="squaremeter">
     <label for="">Square Meters</label>
     <input type="text" class="form-control" id="stall_sqr_m" name="stall[Sqaure_meters]">
     <span id="" class="text-danger"></span>
   </div>

   <div class="form-group" id="floorlevel">
     <label>Floor Level</label>
     <select class="form-control form-control-sm" id="stall_flr_lvl" name="stall[Floor_level]">
       <option value=""></option>
       <option value="Basement">Basement</option>
       <option value="Ground">Ground Floor</option>
       <option value="Second">Second Floor</option>
       <option value="Third">Third Floor</option>
       <option value="Fourth">Fourth Floor</option>
     </select><br>
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

    <!-- Dark Overlay element -->

    <div class="overlay"></div>
