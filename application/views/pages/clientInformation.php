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
          <table class="table table-striped table-bordered" id="client_table">
            <thead>
              <tr>
                <td>no</td>
                <td>Stall no.</td>
                <td>Area(sqm)</td>
                <td>Daily fee</td>
                <td>Owner's name</td>
                <td>Occupant's name</td>
                <td>load data</td>
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
  <h5 class="card-header text-center text-white bluegrads container justify-content-center" id="sect2">Client Information</h5>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">
          <h5 class="font-weight-bold">Owner's Information</h5>
          <form id = "updatecustomerinfo">

            <input type="hidden" id = "customer_id" name = "update[customer_id]">
            <input type="hidden" id = "stall_id" name = "update[stall_id]">
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[owner_fn]" id="owner_fn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[owner_mn]" id="owner_mn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[owner_ln]" id="owner_ln" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[owner_add]" id="owner_add" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[owner_cn]" id="owner_cn" required>
            </div>
          </div>
          <div class="card col p-3 mt-2">
            <h5 class="font-weight-bold">Stall Information</h5>
            <div class="mb-2 form-group" id="">
              <label>Stall No:</label>
              <input type="input" class="form-control" name="update[stall_number]" id="stall_number" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Area(sqm):</label>
              <input type="input" class="form-control" name="update[area]" id="area" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Daily Fee:</label>
              <input type="input" class="form-control" name="update[daily_fee]" id="daily_fee" required>
            </div>
          </div>
          <br>
        </div>
        <div class="col-6 ">
          <div class="card col p-3">
            <h5 class="font-weight-bold">Occupant's Information</h5>
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[occu_fn]" id="occu_fn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[occu_mn]" id="occu_mn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[occu_ln]" id="occu_ln" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[occu_add]" id="occu_add" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[occu_cn]" id="occu_cn" required>
            </div>
            <div class="row p-2">
              <div class="p-2">
                <button class = "btn btn-primary" type = "button">Payment History</button>
              </div>
              <div class="p-2">
                <button class = "btn btn-primary" type = "submit">Update</button>
              </div>


            </div>

          </div>
          <br>




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
