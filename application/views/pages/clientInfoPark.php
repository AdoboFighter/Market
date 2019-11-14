<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client List</h5>
  <div class="container justify-content-center">
    <div class="card m-1">
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered" id="parkTable">
            <thead>
              <tr>
                <td>Customer ID</td>
                <td>Driver ID</td>
                <td>Lot number</td>
                <td>Name</td>
                <td>Load Data</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row p-3">
      </div>
    </div>
  </div>
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client Information</h5>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">

        <form id = "updatecustomerinfo">
        <input type="hidden" id = "customer_id" name = "update[customer_id]">
          <div class="mb-2 form-group" id="">
            <label>First name:</label>
            <input type="input" class="form-control" name="update[park_fn]" id="park_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="update[park_mn]" id="park_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="update[park_ln]" id="park_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="update[park_add]" id="park_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="update[park_cn]" id="park_cn" required>
          </div>
        </div>
      </div>
      <div class="col-6 ">

        <div class="card col p-3">
          <div class="mb-2">
            <label>Driver ID</label>
            <input type="text" class="form-control" name="update[park_id]" id="driver_id" readonly >
          </div>

          <div class="mb-2">
            <label>Parking lot</label>
            <input type="text" class="form-control" name="update[park_lot]" id="park_lot">
          </div>
        </div>
        <br>
        <button class = "btn btn-primary" type = "submit">Update</button>

        </form>
        <div class="card col p-3 mt-2">
          <h5 class="font-weight-bold">Payment History</h5>
          <table class="table table-striped table-bordered" id="pay_hist_tab">
            <thead>
              <tr>
                <td>OR#</td>
                <td>Nature or payment</td>
                <td>Amount</td>
                <td>Date</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>

<div class="overlay"></div>
