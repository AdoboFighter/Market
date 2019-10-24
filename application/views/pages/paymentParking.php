<div id="content">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <form id="parkpayment">
    <div class="container justify-content-center">
      <h5 class="card-header text-center  text-white bluegrads">Payment</h5>
      <div class="card m-3">
        <div class="row p-3">
          <div class="col-12">
            <table class="table table-striped table-bordered" id="ParkingTable">
              <thead>
                <tr>
                  <td>Customer ID</td>
                  <td>Driver_id</td>
                  <td>Lot no</td>
                  <td>name</td>
                  <td>Payment</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">
          <h5>Payment Successful</h5>
        </div>
      </div>
    </div>

    <div id="failedActivation" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">
          <h5>Select a client first!</h5>
        </div>
      </div>
    </div>


    <div  class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3">
          <h5>Payment Successful</h5>
        </div>
      </div>
    </div>



    <div id="AmbuPay" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
        <div class="modal-content p-2">
          <h5>Ambulant Payment</h5>

          <div class="row">
            <div class="col-6">



              <div class="mb-2">
                <label>customer ID</label>
                <input type="text" class="form-control" name="" id="cus_id" >
              </div>
              <div class="mb-2">
                <label>Driver ID</label>
                <input type="text" class="form-control" name="" id="driver_id"  >
              </div>

              <div class="mb-2">
                <label>Parking lot</label>
                <input type="text" class="form-control" name="" id="park_lot"  >
              </div>

              <div class="mb-2">
                <label>Name</label>
                <input type="text" class="form-control" name="" id="name" >
              </div>


            </div>
            <div class="col-6">
              <div class="mb-2 form-group" id="">
                <label>Type of payment</label>
                <select class="form-control form-control-sm" name="transact[payment_type]" id="" required="">
                  <option selected value="">Please Select</option>
                  <option value="4004">Annual Rental fee</option>
                  <option value="4005">Semi Annual Fee</option>
                  <option value="4006">Quarterly Annual Fee</option>
                  <option value="4007">Water Services Fee</option>
                  <option value="4008">Electrical Services Fee</option>
                  <option value="4009">Monthly Rental Fee</option>
                  <option value="4010">Weekly Rental Fee</option>
                  <option value="4011">Daily Market Fee</option>
                  <option value="4012">Privillage Market Fee</option>
                  <option value="4013">Others</option>
                  <option value="4014">Certification</option>
                  <option value="4015">Violation</option>
                </select>
              </div>
              <div class="mb-2">
                <label>O.R</label>
                <input type="text" class="form-control" name="" id="">
              </div>
              <div class="mb-2">
                <label>Amount to pay</label>
                <input type="text" class="form-control" name="" id="">
              </div>
              <div class="mb-2">
                <label>Cash tendered</label>
                <input type="text" class="form-control" name="" id="">
              </div>
              <div class="mb-2">
                <label>Payment Effectivity</label>
                <input type="date" class="form-control" name="" id="">
              </div>
              <div class="mb-2">
                <button type="Submit"  class="btn btn-primary"  >Submit and print</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>



</div>

<div class="overlay"></div>
