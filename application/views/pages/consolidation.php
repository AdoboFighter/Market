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
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Consolidation</h5>

  <div class="container justify-content-center">
    <div class="card m-3">
      <div class="row p-3">
        <div class="col-3">
          <div class="mb-2 form-group" id="">
            <label class="font-weight-bold">Collector:</label>
            <select class="form-control form-control-sm" name="" id="collector_name" required>
              <option selected value="" id = "collector">Please Select</option>
             
            </select>
          </div>
        </div>
        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold" id="">
            <label>Date from:</label>
            <input type="date" class="form-control" name="date_from" id="date_from" required>
          </div>
        </div>
        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold" id="">
            <label>Date to:</label>
            <input type="date" class="form-control" name="date_to" id="date_to" required>
          </div>
        </div>
        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold" id="">
            <label>Client Type:</label>
            <select class="form-control form-control-sm" name="client_type" id="client_type" required>
              <option selected value="">Please Select</option>
              <option value="ambulant">ambulant</option>
              <option value="delivery">delivery</option>
              <option value="tenant">tenant</option>
              <option value="parking">parking</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered" id="tablecon">
            <thead>
              <tr>
                <td>no</td>
                <td>name</td>
                <td>O.R</td>
                <td>Amount</td>
                <td>Nature of Payment</td>
                <td>Date & Time</td>
                <td>Fund</td>
                <td>collector</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row p-3">
        <div class="mb-2 p-3">
          <button type="button" class="btn btn-secondary bg-dark btn-lg" id = "genrep">Generate POS report</button>
        </div>
      </div>
    </div>
  </div>


</div>

<div class="overlay"></div>
