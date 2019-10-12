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

  <div class="container justify-content-center">
    <h5 class="card-header text-center  text-white bluegrads">Payment</h5>
    <div class="card m-3">
      <div class="">
        <div class="row p-3">
          <div class="col-6">
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
            <div class="mb-2">
              <label>Client Name</label>
              <input type="text" class="form-control" name="" id="ownerField" disabled>
            </div>
            <div class="mb-2">
              <label>Address</label>
              <input type="text" class="form-control" name="" id="addressField" disabled>
            </div>
            <div class="mb-2">
              <label>Area(sqm)</label>
              <input type="text" class="form-control" name="" id="areaField" disabled>
            </div>

            <div class="mb-2">
              <label>Daily fee</label>
              <input type="text" class="form-control" name="" id="daily_fee_field" disabled>
            </div>

            <div class="mb-2">
              <label>Debt</label>
              <input type="text" class="form-control" name="" id="debt_field" disabled readonly>
            </div>
            <div class="mb-2">
              <label>Last Payment Activity</label>
              <input type="timestamp_end" class="form-control" name="" id="last_pay" disabled readonly>
            </div>
            <div class="mb-2">
              <button type="" class="btn btn-secondary bg-dark" id="activatebtn">Add payment</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card m-3 " id="paymentcard">
        <h5 class="card-header text-center bg-dark text-white ">Payment Details</h5>
      <form id="transactform">
        <div class="row p-2">
          <div class="col-6">
            <div class="">
              <h5>Details</h5>
            </div>
            <div class="mb-2 form-group" id="stall_number">
              <!-- <label>Stall Number</label> -->
              <input type="text" class="form-control" name="transact[stall_number]" id="stall_number_field" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="transact[customer_id]" id="clientIdField" >
            </div>
            <div class="mb-2 form-group" id="">
              <label>Type of payment</label>
              <select class="form-control form-control-sm" name="transact[payment_type]" id="payTypeField" required="">
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
              <input type="text" class="form-control" name="transact[payor]" id="payorField" required>
            </div>
            <div class="mb-2 form-group" id="or">
              <label>O.R</label>
              <input type="text" class="form-control" name="transact[OR]" id="orField" required>
            </div>
            <div class="mb-2 form-group" id="amount">
              <label>Amount to be paid:</label>
              <input type="text" class="form-control" name="" id="amountToField" placeholder="0.00" required>
            </div>
            <div class="mb-2 form-group">
              <label>Cash tendered</label>
              <input type="text" class="form-control" name="transact[cash_tendered]" id="cashTendField" placeholder="0.00" required>
            </div>
            <!-- <div class="mb-2">
              <label>Change:</label>
              <input type="text" class="form-control" name="transact[]" id="change" placeholder="0.00" disabled>
            </div> -->
            <div class="mb-2">
              <label>Payment Effectivity</label>
              <input type="date" class="form-control" name="transact[payment_effect]" id="payEffectField" placeholder="0.00" required>
            </div>
            <div class="form-check mb-2" id="">
              <input type="checkbox" class="form-check-input" name="transact[ifCheque]" id="cbCheque">
              <label class="form-check-label">Cheque</label>
            </div>

            <div id="cheque">
              <div class="mb-2 mt-2 form-group"  id="cheque_amount">
                <label>Cheque Amount</label>
                <input type="text" class="form-control" name="transact[cheque_amount]" id="cheqAmountField" placeholder="0.00" >
              </div>

              <div class="mb-2 form-group" id="cheque_number">
                <label>Cheque number</label>
                <input type="text" class="form-control" name="transact[cheque_number]" id="cheqNumField" placeholder="" >
              </div>

              <div class="mb-2 form-group" id="bank">
                <label>Bank/Branch</label>
                <input type="text" class="form-control" name="transact[bank_branch]" id="bankBranchField" placeholder="" >
              </div>

              <div class="mb-2">
                <button type="button" class="btn btn-secondary bg-dark" id="add_cheque" >Add Cheque</button>
              </div>



              <div class="mb-2 form-group" >
                <table class="table table-striped table-bordered p-2" id="table_cheque">
                  <thead>
                    <tr>

                      <td>Cheque no</td>
                      <td>Cheque Amount</td>
                      <td>Bank Branch</td>
                      <td>delete</td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
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
                  <button type="Submit"  class="btn btn-primary mt-2"  >Submit</button>
                </div>
              </div>

            </div>

          </div>
        </div>
      </form>
    </div>
  </div>



<form id="newbton">
  <button type="newbton"  class="btn btn-primary mt-2"  >Submit</button>
</form>

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

  <div id="chequelimit" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content p-3">
        <h5>Cheque is limited to only 3</h5>
      </div>
    </div>
  </div>
</div>
<div class="overlay"></div>
