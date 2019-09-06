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
  <form id="transact" name="transact">
  <div class="">
    <h5 class="card-header text-center bg-primary text-white">Payment</h5>
    <div class="row p-3">

      <div class="col-5">
        <div class="row mb-2">
          <div class="col">
            <label>Search</label>
            <input type="text" class="form-control" name="" id="" placeholder="">
          </div>

          <div class="col">
            <label>Client type</label>
            <select class="form-control form-control-sm" name="transact[]" onchange="clienttypepay();" id="clientselect" required="">
              <option selected value="">Please Select</option>
              <option value="tenant">Tenant</option>
              <option value="Ambulant">Ambulant</option>
              <option value="delivery">Delivery</option>
              <option value="parking">Parking</option>
            </select>
          </div>

        </div>



        <table class="table table-striped table-bordered" id="tableNoStall">
          <tr>
            <td>no</td>
            <td>name</td>
            <td>address</td>
          </tr>
        </table>

        <table class="table table-striped table-bordered" id="tableTenant">
          <tr>
            <td>no</td>
            <td>name</td>
            <td>address</td>
            <td>Stall Number</td>
          </tr>
        </table>

        <div class="mb-2">
          <h5>Details</h5>
        </div>

        <div class="mb-2">
          <label>Type of payment</label>
          <select class="form-control form-control-sm" name="transact[]" id="" required="">
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
          <label>Specify</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Owner</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Address</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Payor</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Stall Number</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Area(sqm)</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Debt</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <label>Last Payment Activity</label>
          <input type="text" class="form-control" name="" id="" >
        </div>

        <div class="mb-2">
          <button type="" class="btn btn-secondary">activate payment details</button>
        </div>

      </div>

      <div class="col-4">

        <div class="">
          <h5>Details</h5>
        </div>

        <div class="mb-2">
          <label>O.R</label>
          <input type="text" class="form-control" name="transact[]" id="" >
        </div>

        <div class="mb-2">
          <label>Nature of payment</label>
          <input type="text" class="form-control" name="transact[]" id="" >
        </div>

        <div class="mb-2">
          <label>Amount to be paid:</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="0.00">
        </div>

        <div class="mb-2">
          <label>Cash tendered</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="0.00">
        </div>

        <div class="form-check mb-2">
          <input type="checkbox" class="form-check-input">
          <label class="form-check-label">Cheque</label>
        </div>

        <div class="mb-2 mt-2">
          <label>Cheque Amount</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="0.00">
        </div>

        <div class="mb-2">
          <label>Cheque number</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="">
        </div>

        <div class="mb-2">
          <label>Bank/Branch</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="">
        </div>

        <div class="mb-2">
          <label>Change:</label>
          <input type="text" class="form-control" name="transact[]" id="" placeholder="0.00">
        </div>

        <div class="mb-2">
          <label>Payment Effectivity</label>
          <input type="date" class="form-control" name="transact[]" id="" placeholder="0.00">
        </div>

        <div class="mb-2">
          <table class="table table-striped table-bordered p-2">
            <tr>
              <td>Cheque no</td>
              <td>Cheque Amount</td>
              <td>Bank Branch</td>
              <td>Date</td>
            </tr>
          </table>
        </div>

      </div>

      <div class="col-3">
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



  </div>
</form>





</div>

<div class="overlay"></div>
