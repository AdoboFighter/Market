<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>


  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client List</h5>
  <br>
  <div class="container justify-content-center">
    <div class="card m-1 shadow">
      <div class="row p-3">
        <div class="col">
          <div class="form-group">
            <label>Search</label>
            <input class="form-control form-control-sm mr-3 w-75" type="text" id="search_cl_f" placeholder="Search (stall#, name, section, etc)"
            aria-label="Search">
            <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
          </div>
        </div>


        <div class="col">
          <div class="form-group">
            <label>Category</label>
            <select class="form-control form-control-sm" id="search_cl_s">
              <option selected value="">Please Select</option>
              <option value="customer_id">Customer ID</option>
              <option value="firstname">Company/Driver's Name</option>
              <option value="middlename">Plate number</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered shadow" id="DeliveryTable">
            <thead>
              <tr>
                <td class="border border-dark">Customer ID</td>
                <td class="border border-dark">Company/Driver's Name</td>
                <td class="border border-dark">Plate Number</td>
                <td class="border border-dark">Load Data</td>
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
  <br>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">
          <form id="updatecustomerinfo">
            <input type="hidden" id="customer_id" name="update[customer_id]">

            <div class="mb-2 form-group" id="">
              <label>Company/Driver's name:</label>
              <input type="input" class="form-control" name="update[delivery_fn]" id="del_fn" readonly>
            </div>

            <div class="mb-2 form-group" id="">
              <label>Plate Number:</label>
              <input type="input" class="form-control" name="update[delivery_mn]" id="del_mn" readonly>
            </div>

            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[delivery_cn]" id="del_cn" readonly>
            </div>
        </div>
        <br>
      </div>

      <div class="col-6 ">
        <div class="card col p-3">
          <div class="mb-2">
            <label>Delivery ID</label>
            <input type="text" class="form-control" name="update[delivery_id]" id="del_id" readonly>
          </div>
          <div class="row p-2">
            <div class="p-2">
              <button class="btn stylish-color-dark text-white" type="button" id="payhistbtn">Payment History</button>
            </div>
            <div class="p-2">
              <!-- <button class="btn btn-primary" type="submit">Update</button> -->
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>



  <div id="violationmodal" class="modal fade right" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalPreviewLabel">Tenant Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered shadow" id="pay_hist_tab" style="width:100%">
            <thead>
              <tr>
                <td class="border border-dark">OR#</td>
                <td class="border border-dark">Nature or payment</td>
                <td class="border border-dark">Amount</td>
                <td class="border border-dark">Date</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <!-- END OF MODAL -->

</div>



<div class="overlay"></div>
readonly
