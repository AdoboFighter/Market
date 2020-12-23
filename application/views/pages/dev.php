<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->

  <div class="container justify-content-center">
      <h5 class="card-header text-center text-white bluegrads container justify-content-center">Consolidation</h5>
      <br>
    <div class="card m-3 shadow">
      <div class="row">
        <div class="col-lg-6 mt-3 h3 "> add </div>
        <div class="col-lg-6">
          <button id="addRow" class=" btn btn-outline-success waves-effect float-right" type="button" onclick="addNewRow()">ADD ITEM</button>
          <!-- <button id="removeRow" class=" btn btn-outline-danger waves-effect btn-sm " type="button" disabled>remove</button> -->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 mt-3 h3 "> remove </div>
        <div class="col-lg-6">
          <button id="removeRow" class=" btn btn-outline-success waves-effect float-right" type="button" onclick="addNewRow()">ADD ITEM</button>
          <!-- <button id="removeRow" class=" btn btn-outline-danger waves-effect btn-sm " type="button" disabled>remove</button> -->
        </div>
      </div>

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
          <table width="100%" class="table table-striped table-bordered shadow" id="tablecon">
            <thead class="">
              <tr>
                <td class="border border-dark">no</td>
                <td class="border border-dark">name</td>
                <td class="border border-dark">O.R</td>
                <td class="border border-dark">Amount</td>
                <td class="border border-dark">Nature of Payment</td>
                <td class="border border-dark">Date & Time</td>
                <td class="border border-dark">Fund</td>
                <td class="border border-dark">collector</td>
                <!-- <td class="border border-dark">stall_number</td> -->
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row p-3">
        <div class="mb-2 p-3">
          <button type="button" class="btn stylish-color-dark text-white" id = "genrep">Generate POS report</button>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>


</div>
<div class="overlay"></div>
