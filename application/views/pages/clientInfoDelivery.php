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
          <table class="table table-striped table-bordered" id="DeliveryTable">
            <thead>
              <tr>
                <td>Customer ID</td>
                <td>Delivery ID</td>
                <td>name</td>
                <td>Payment</td>
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
            <input type="input" class="form-control" name="update[delivery_fn]" id="del_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="update[delivery_mn]" id="del_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="update[delivery_ln]" id="del_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="update[delivery_add]" id="del_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="update[delivery_cn]" id="del_cn" required>
          </div>
        </div>
      </div>

      <div class="col-6 ">

        <div class="card col p-3">
          <div class="mb-2">
            <label>Delivery ID</label>
            <input type="text" class="form-control" name="update[delivery_id]" id="del_id"  readonly>
          </div>
        </div>

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
