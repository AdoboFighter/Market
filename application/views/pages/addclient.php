
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
    <form class="p-3" id="saveclient">
    <div class="row ">
      <div class="span6" style="float: none; margin: 0 auto;">
          <div class="p-3">
            <div class="form-group">
            <h5>Owner's Information</h5>
              <label>Client Type</label>
              <select class="form-control form-control-sm" name="client[Client_type]">
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



      <div class="span6" style="float: none; margin: 0 auto;">
      <div class="">
        <div class="form-group">
          <label for="">Stall Number</label>
          <input type="text" class="form-control" name="client[Stall_Number]">
        </div>

        <div class="form-group">
          <label for="">Business ID</label>
          <input type="text" class="form-control" name="client[Buss_Id]">
        </div>

        <div class="form-group">
          <label for="">Business Name</label>
          <input type="text" class="form-control" name="client[Buss_Name]">
        </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Clear</button>
      </div>
    </div>

    </div>


  </form>


  </div>
</div>



</div>
    <!-- Dark Overlay element -->

    <div class="overlay"></div>
