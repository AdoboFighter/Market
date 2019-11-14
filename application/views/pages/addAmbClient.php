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
    <h5 class="card-header text-center bg-primary text-white bluegrads">Add Ambulant Unit</h5>

    <div class="card m-2">
      <div class="container">
        <form class="p-3" id="saveAmb" name="savePark">
          <div class="row">
            <div class="col-6">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">

                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Firstname]"   required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Middlename]"  required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Lastname]" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="customer[Owner_Address]"  required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="customer[Owner_Contact_Num]"  required>
                  </div>

                  <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary bg-dark" onclick="clear();">Clear</button>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="">Location</label>
                <input type="text" class="form-control" id="amlocation" name="customer[Location]">
                <span id="" class="text-danger"></span>
              </div>
              <div class="form-group">
                <label for="">Location Number</label>
                <input type="text" class="form-control" id="amnum" name="customer[Location_num]">
                <span id="" class="text-danger"></span>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
