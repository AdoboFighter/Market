<div id="content">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->

  <div class="card m-3">
    <div class="">
      <h5 class="card-header text-center bg-primary text-white">Payment</h5>
      <div class="row p-3">
        <div class="col-6">
          <div class="row mb-2">

          </div>

          <table class="table table-striped table-bordered" id="tableNoStall">
            <thead>
              <tr>
                <td>no</td>
                <td>name</td>
                <td>address</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
        </div>
        <div class="col-6">
          <div class="mb-2">
            <h5>Details</h5>
          </div>

          <!-- <div class="mb-2">
          <label>Specify</label>
          <input type="text" class="form-control" name="" id="" >
        </div> -->

        <div class="">
          <input type="text" class="form-control" name="" id="clientIdField" disabled>
        </div>

        <div class="mb-2">
          <label>Client Name</label>
          <input type="text" class="form-control" name="" id="ownerField" disabled>
        </div>

        <div class="mb-2">
          <label>Address</label>
          <input type="text" class="form-control" name="" id="addressField" disabled>
        </div>


        <div class="mb-2">
          <label>Stall Number</label>
          <input type="text" class="form-control" name="" id="stall_num" disabled>
        </div>

        <div class="mb-2">
          <label>Area(sqm)</label>
          <input type="text" class="form-control" name="" id="areaField" disabled>
        </div>

        <div class="mb-2">
          <label>Debt</label>
          <input type="text" class="form-control" name="" id="" disabled>
        </div>

        <div class="mb-2">
          <label>Last Payment Activity</label>
          <input type="text" class="form-control" name="" id="" disabled>
        </div>

        <div class="mb-2">
          <button type="" class="btn btn-secondary" id="activatebtn">activate payment details</button>
        </div>

      </div>
    </div>
  </div>

</div>

<div class="card m-3 " id="paymentcard">
  <h5 class="card-header text-center bg-secondary text-white">Payment Details</h5>
  <form id="transactform" name="transactform">
    <div class="row p-2">
      <div class="col-6">
        <div class="">
          <h5>Details</h5>
        </div>

        <div class="mb-2 form-group" id="">
          <label>Type of payment</label>
          <select class="form-control form-control-sm" name="transact[payTypeField]" id="payTypeField" required="">
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

        <div class="mb-2 form-group" id="payor">
          <label>Payor</label>
          <input type="text" class="form-control" name="transact[payorField]" id="payorField" required>
        </div>

        <div class="mb-2 form-group" id="or">
          <label>O.R</label>
          <input type="text" class="form-control" name="transact[orField]" id="orField" required>
        </div>



        <div class="mb-2 form-group" id="amount">
          <label>Amount to be paid:</label>
          <input type="text" class="form-control" name="transact[amountToField]" id="amountToField" placeholder="0.00" required>
        </div>

        <div class="mb-2 form-group" id="payamount">
          <label>Cash tendered</label>
          <input type="text" class="form-control" name="transact[cashTendField]" id="cashTendField" placeholder="0.00" required>
        </div>




        <div class="mb-2">
          <label>Change:</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="0.00" disabled>
        </div>

        <div class="mb-2">
          <label>Payment Effectivity</label>
          <input type="date" class="form-control" name="transact[payEffectField]" id="payEffectField" placeholder="0.00" required>
        </div>

        <div class="form-check mb-2" id="">
          <input type="checkbox" class="form-check-input" id="cbCheque">
          <label class="form-check-label">Cheque</label>
        </div>


      </div>
      <div class="col-6">
        <div class="">
          <h5>Particulars</h5>
        </div>

        <div class="mb-2">
          <div class="row mt-2">
            <div class="col">
              <label>Particulars</label>
              <input type="text" class="form-control" name="" id="" >
            </div>

            <div class="col">
              <label>Price</label>
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>

          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>

          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
            </div>
            <div class="col">
              <input type="text" class="form-control" name="" id="" >
              <button type="submit"  class="btn btn-primary mt-2">Submit</button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </form>

  <div id="cheque">
    <form id="chequeform" name="chequeform">
      <div class="mb-2 mt-2">
        <label>Cheque Amount</label>
        <input type="text" class="form-control" name="cheque[cheqAmountField]" id="cheqAmountField" placeholder="0.00" >
      </div>

      <div class="mb-2">
        <label>Cheque number</label>
        <input type="text" class="form-control" name="cheque[cheqNumField]" id="cheqNumField" placeholder="" >
      </div>

      <div class="mb-2">
        <label>Bank/Branch</label>
        <input type="text" class="form-control" name="cheque[bankBranchField]" id="bankBranchField" placeholder="" >
      </div>

      <div class="mb-2">
        <table class="table table-striped table-bordered p-2">
          <thead>
            <tr>
              <td>Cheque no</td>
              <td>Cheque Amount</td>
              <td>Bank Branch</td>
              <td>Date</td>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </form>
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

<div class="overlay"></div>
