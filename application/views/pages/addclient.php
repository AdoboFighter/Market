
<div id="content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-secondary btn-light">
                  <p class="text-dark"><img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" alt="Test" width="40" height="40"> SPC E-Market</p>
                </button>
            </div>
        </nav>

    <div class="card p-1">
      <h5 class="card-header">Client's Information</h5>
    <div class="row p-4">
        <div class="">
            <form class="p-3" id="saveclient">
            <h5>Owner's Information</h5>
            Client Type:
              <select name="client[Client_type]" >
                <option value="tenant">Tenant</option>
                <option value="Ambulant">Ambulant</option>
                <option value="delivery">Delivery</option>
                <option value="parking">Parking</option>
              </select><br>
                first name:<br>
                <input type="text" name="client[OFirstname]"><br>
                Last name:<br>
                <input type="text" name="client[OMiddlename]"><br>
                Middle name:<br>
                <input type="text" name="client[OLastname]"><br>
                address:<br>
                <input type="text" name="client[OAddress]"><br>
                Contact Number:<br>
                <input type="text" name="client[OContactNum]"><br>
        </div>

        <div class="p-3">
            <h5>Occupant's Information</h5>
            <input type="checkbox">
            Same as Owner's Information<br><br>
            First name:<br>
            <input type="text" name="client[OcFirstname]"><br>
            Middle name:<br>
            <input type="text" name="client[OcMiddlename]"><br>
            Last name:<br>
            <input type="text" name="client[Oclastname]"><br>
            address:<br>
            <input type="text" name="client[OcAddress]"><br>
            Contact Number:<br>
            <input type="text" name="client[OcContactNum]"><br>
      </div>

      <div class="">
          Stall Number:<br>
          <input type="text" name="client[Stall_Number]"><br>
          Business Id:<br>
          <input type="text" name="client[Buss_Id]"><br>
          Business Name:<br>
          <input type="text" name="client[Buss_Name]"><br>
          <button type="submit" class="">Save</button>
          <button type="reset" class="">Clear</button>
      </div>
    </div>
  </form>


  </div>
</div>
    <!-- Dark Overlay element -->

    <div class="overlay"></div>
