<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>


  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Add Ambulant Vendor</h5>
    <br>
    <div class="card m-2 shadow border border-light">
      <div class="container">
        <form class="p-3" id="saveAmb" name="savePark">
          <div class="row">
            <div class="col-6">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Firstname]" required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Middlename]" required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Lastname]" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="customer[Owner_Address]" required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="customer[Owner_Contact_Num]" required>
                  </div>


                </div>
              </div>
            </div>
            <div class="col-6" style="margin-top: 15px;">
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

              <div class="form-group text-right">
                <button type="reset" class="btn stylish-color-dark text-white" onclick="clear();">Clear</button>
                <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>

              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>

</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
