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
          <table class="table table-striped table-bordered" id="client_table">
            <thead>
              <tr>
                <td class="border border-dark">no</td>
                <td class="border border-dark">Stall no.</td>
                <td class="border border-dark">Area(sqm)</td>
                <td class="border border-dark">Daily fee</td>
                <td class="border border-dark">Owner's name</td>
                <td class="border border-dark">Occupant's name</td>
                <td class="border border-dark">load data</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <form id="updatecustomerinfo">
    <h5 class="card-header text-center text-white bluegrads container justify-content-center" id="sect2">Client Information</h5>
    <br>
    <div class="container justify-content-center">
      <div class="card m-1 shadow p-3">
        <h5 class="font-weight-bold">Stall Information</h5>
        <div class="row p-3">

          <div class="col-6">
            <div class="form-group">
              <label>Section</label>
              <input type="input" class="form-control" name="update[business_name]" id="Section" readonly>
            </div>
            <div class="form-group" id="floorlevel">
              <label>Floor Level</label>
              <input type="input" class="form-control" name="update[business_name]" id="stall_flr_lvl" readonly>
            </div>
            <div class=" form-group" id="">
              <label>Business name:</label>
              <input type="input" class="form-control" name="update[business_name]" id="business_name" readonly>
            </div>
            <div class=" form-group" id="">
              <label>Business ID:</label>
              <input type="input" class="form-control" name="update[business_id]" id="business_id" readonly>
            </div>
          </div>

          <div class="col-6">
            <div class=" form-group">
              <label>Nature of Business:</label>
              <input type="input" class="form-control" name="update[nature_or_business]" id="nature_or_business" readonly>
            </div>
            <div class=" form-group" >
              <label>Stall No:</label>
              <input type="input" class="form-control" name="update[stall_number]" id="stall_number" readonly>
            </div>
            <div class=" form-group" >
              <label>Area(sqm):</label>
              <input type="input" class="form-control" name="update[area]" id="area" readonly>
            </div>
            <div class=" form-group">
              <label>Daily Fee:</label>
              <input type="input" class="form-control" name="update[daily_fee]" id="daily_fee" readonly>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row mt-2">
        <div class="col-6">
          <div class="card col p-3 shadow">
            <h5 class="font-weight-bold">Tenant's Information</h5>
            <input type="hidden" id="customer_id" name="update[customer_id]">
            <input type="hidden" id="stall_id" name="update[stall_id]">
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[owner_fn]" id="owner_fn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[owner_mn]" id="owner_mn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[owner_ln]" id="owner_ln" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[owner_add]" id="owner_add" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[owner_cn]" id="owner_cn" readonly>
            </div>
          </div>
        </div>

        <div class="col-6 ">
          <div class="card col p-3 shadow">
            <h5 class="font-weight-bold">Occupant's Information</h5>
            <div class="mb-2 form-group" id="">
              <label>First name:</label>
              <input type="input" class="form-control" name="update[occu_fn]" id="occu_fn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="update[occu_mn]" id="occu_mn" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="update[occu_ln]" id="occu_ln" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="update[occu_add]" id="occu_add" readonly>
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="update[occu_cn]" id="occu_cn" readonly>
            </div>
            <div class="row p-2">
              <div class="p-2">
                <button class="btn stylish-color-dark text-white" type="button" id="payhistbtn">Payment History</button>
              </div>
              <!-- <div class="p-2">
                <button class="btn btn-primary" type="submit">Update</button>
              </div> -->
            </div>
          </div>
          <br>
          <br>



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
      </div>
    </div>

  </form>


</div>

<div class="overlay"></div>
