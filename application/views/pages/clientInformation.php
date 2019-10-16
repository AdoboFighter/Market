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
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client Information</h5>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">
          <h5 class="font-weight-bold">Owner's Information</h5>
          <div class="mb-2 form-group" id="">
            <label>First name:</label>
            <input type="input" class="form-control" name="" id="owner_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="" id="owner_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="" id="owner_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="" id="owner_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="" id="owner_cn" required>
          </div>
        </div>
        <div class="card col p-3 mt-2">
          <h5 class="font-weight-bold">Stall Information</h5>
          <div class="mb-2 form-group" id="">
            <label>Stall No:</label>
            <input type="input" class="form-control" name="" id="stall_number" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Area(sqm):</label>
            <input type="input" class="form-control" name="" id="area" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Daily Fee:</label>
            <input type="input" class="form-control" name="" id="daily_fee" required>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card col p-3">
          <h5 class="font-weight-bold">Occupant's Information</h5>
          <div class="mb-2 form-group" id="">
            <label>First name:</label>
            <input type="input" class="form-control" name="" id="occu_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="" id="occu_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="" id="occu_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="" id="occu_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="" id="occu_cn" required>
          </div>
        </div>
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
