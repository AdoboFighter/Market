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

          <tbody></tbody>

        </table>




      </div>

      <div class="col-6">
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
          <input type="text" class="form-control" name="" id="ownerField" disabled>
        </div>

        <div class="mb-2">
          <label>Address</label>
          <input type="text" class="form-control" name="" id="addressField" disabled>
        </div>

        <div class="mb-2">
          <label>Payor</label>
          <input type="text" class="form-control" name="" id="" >
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
</form>

<div class="card m-3" id="paymentcard">
<form id="transact" name="transact">
<h5 class="card-header text-center bg-secondary text-white">Payment Details</h5>
</form>
</div>



</div>

<div class="overlay"></div>
