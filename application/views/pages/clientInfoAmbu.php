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
          <table class="table table-striped table-bordered" id="AmbulantTable">
            <thead>
              <tr>
                <td>Customer ID</td>
                <td>name</td>
                <td>Location</td>
                <td>Location Number</td>
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
  <div class="container justify-content-center" id="sect2">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">

          <form id = "updatecustomerinfo">
            <input type="hidden" id = "customer_id" name = "update[customer_id]">
            <input type="hidden" id = "ambulant_id" name = "update[ambulant_id]">
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[ambulant_fn]" id="ambulant_fn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[ambulant_mn]" id="ambulant_mn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[ambulant_ln]" id="ambulant_ln" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[ambulant_add]" id="ambulant_add" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[ambulant_cn]" id="ambulant_cn" required>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Nature of Business:</label>
              <input type="input" class="form-control" name="update[nature_of_business]" id="nature_of_business" required>
            </div>
          </div>
        </div>

        <div class="col-6 ">
          <div class="card col p-3">
            <div class="mb-2">
              <label>Location</label>
              <input type="text" class="form-control" name="update[location]" id="location">
            </div>

            <div class="mb-2">
              <label>Location number</label>
              <input type="text" class="form-control" name="update[location_num]" id="Location_num">
            </div>


            <div class="p-2">
              <button class ="btn btn-secondary" type="button" id="payhistbtn">Payment History</button>
              <button class = "btn btn-primary" type="submit">Update</button>
            </div>
          </div>


        </div>

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
