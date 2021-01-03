<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <!-- <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url(); ?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button> -->
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Transactions</h5>

  <div class="container justify-content-center">
    <div class="card m-3 shadow">
      <div class="row p-3">
        <div class="col-4">
          <div class="mb-2 form-group font-weight-bold" id="">
            <label>Client Type:</label>
            <select class="form-control form-control-sm sort" name="client_type" id="client_type" required>
              <option selected value="">Please Select</option>
              <option value="ambulant">ambulant</option>
              <option value="delivery">delivery</option>
              <option value="tenant">tenant</option>
              <option value="parking">parking</option>
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="mb-2 form-group font-weight-bold sort" id="">
            <label>Date from:</label>
            <input type="date" class="form-control" name="date_from" id="date_from" required>
          </div>
        </div>
        <div class="col-4">
          <div class="mb-2 form-group font-weight-bold sort" id="">
            <label>Date to:</label>
            <input type="date" class="form-control" name="date_to" id="date_to" required>
          </div>
        </div>

      </div>
      <div class="row p-3">
        <div class="col-12">
          <table width="100%" class="table table-striped table-bordered shadow" id="tableNoStall">
            <thead>
              <tr>
                <td class="border border-dark">no</td>
                <td class="border border-dark">name</td>
                <td class="border border-dark">O.R</td>
                <td class="border border-dark">Amount</td>
                <td class="border border-dark">Nature of Payment</td>
                <td class="border border-dark">Date & Time</td>
                <td class="border border-dark">Fund</td>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row p-3">
        <div class="mb-2 p-3">
          <button type="button" class="btn stylish-color-dark text-white" id="genrep">Generate Transaction report</button>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="overlay"></div>
