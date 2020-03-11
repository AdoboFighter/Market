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
          <div class="form-inline">
            <!-- <input type="text" class="form-control" id="search_cl_f" placeholder="search"> -->
            <input class="form-control form-control-sm mr-3 w-75" type="text" id="search_cl_f" placeholder="Search (stall#, name, section, etc)"
            aria-label="Search">
                  <i class="fas fa-search" aria-hidden="true"></i>
          </div>
        </div>
      </div>

      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered shadow" id="AmbulantTable">
            <thead>
              <tr>
                <td class="border border-dark">Customer ID</td>
                <td class="border border-dark">name</td>
                <td class="border border-dark">Location</td>
                <td class="border border-dark">Location Number</td>
                <td class="border border-dark">Payment</td>
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
    <br>
  </div>
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">Client Information</h5>
  <br>
  <br>
  <div class="container justify-content-center" id="sect2">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 shadow">
          <h5 class="font-weight-bold">Ambulant's Information</h5>
          <form id="updatecustomerinfo">
            <input type="hidden" id="customer_id" name="update[customer_id]">
            <input type="hidden" id="ambulant_id" name="update[ambulant_id]">
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[ambulant_fn]" id="ambulant_fn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[ambulant_mn]" id="ambulant_mn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[ambulant_ln]" id="ambulant_ln" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[ambulant_add]" id="ambulant_add" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[ambulant_cn]" id="ambulant_cn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Nature of Business:</label>
              <input type="input" class="form-control" name="update[nature_of_business]" id="nature_of_business" readonly>
            </div>
        </div>
        <br>

      </div>

      <div class="col-6">
        <div class="card col p-3 shadow">
          <h5 class="font-weight-bold">Ambulant unit Information</h5>
          <div class="mb-2">
            <label>Location</label>
            <input type="text" class="form-control" name="update[location]" id="location"readonly>
          </div>
          <div class="mb-2">
            <label>Location number</label>
            <input type="text" class="form-control" name="update[location_num]" id="Location_num"readonly>
          </div>
          <div class="p-2">
            <button class="btn stylish-color-dark text-white" type="button" id="payhistbtn">Payment History</button>
            <!-- <button class="btn btn-primary" type="submit">Update</button> -->
          </div>
        </div>
      </div>



      <div id="violationmodal" class="modal fade right" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalPreviewLabel">Payment History</h5>
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
  </div>
</div>


</div>

<div class="overlay"></div>
