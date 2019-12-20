<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client List</h5>
  <br>
  <div class="container justify-content-center">
    <div class="card m-1 shadow">
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered" id="parkTable">
            <thead>
              <tr>
                <td>Customer ID</td>
                <td>Lot number</td>
                <td>Tenant's Name</td>
                <td>Load Data</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
  </div>
  <h5 class="card-header text-center text-white bluegrads container justify-content-center" id="sect2">Client Information</h5>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">
          <form id = "updatecustomerinfo">
            <input type="hidden" id = "customer_id" name = "update[customer_id]">
            <input type="hidden" id = "driver_id" name = "update[driver_id]">
            <div class="mb-2 form-group" id="">
              <label>Tenant's name:</label>
              <input type="input" class="form-control"  id="name">
            </div>
            <div class="mb-2 form-group" id="">
              <label>Stall Number:</label>
              <input type="input" class="form-control"  id="stall">
            </div>
          </div>
          <br>
          <br>
        </div>

        <div class="col-6 ">
          <div class="card col p-3 shadow">
            <div class="mb-2">
              <label>Parking lot</label>
              <input type="text" class="form-control" name="update[park_lot]" id="park_lot">
            </div>
            <div class="row mb-2">
              <div class="p-2">
                <button class = "btn btn-secondary" type="button" id="payhistbtn">Payment History</button>
              </div>
                <div class="p-2">
                <button class = "btn btn-primary" type="submit" >Update</button>
              </div>
            </div>
          </div>
          <br>
        </form>




        <div id="violationmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
            <div class="modal-content p-2">
              <h5>Payment History</h5>
              <table class="table table-striped table-bordered " id="pay_hist_tab" style="width:100%">
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
  </div>


</div>

<div class="overlay"></div>
