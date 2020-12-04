<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Stall Owner List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">

      <div class="card shadow">
        <div class="row p-2">
          <div class="col">
            <div class="row p-2">

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
                    <option value="firstname,' ',middlename,' ',lastname">Tenant's name</option>
                    <option value="aofirstname,' ',aomiddlename,' ',aolastname">Occupant's name</option>
                    <option value="unit_no">Stall number</option>
                    <option value="Section">Section</option>
                    <option value="nature_or_business">Nature of business</option>
                    <option value="sqm">Area(sqm)</option>
                    <option value="dailyfee">Daily fee</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col-12">
            <table width="100%" class="table table-striped table-bordered" id="add_vio_tab">
              <thead>
                <tr>
                  <td class="border border-dark">Customer ID</td>
                  <td class="border border-dark">Stall no.</td>
                  <td class="border border-dark">Section</td>
                  <td class="border border-dark">Nature of business</td>
                  <td class="border border-dark">Area(sqm)</td>
                  <td class="border border-dark">Daily fee</td>
                  <td class="border border-dark">Tenant's name</td>
                  <td class="border border-dark">Occupant's name</td>
                  <td class="border border-dark" scope="col">To pay</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>




      <div id="violationmodal" data-backdrop="static" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <form id="violationform">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPreviewLabel">Add Violation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <h5 class="font-weight-bold">Details</h5>
                      <label for="">Stall No</label>
                      <input type="text" class="form-control" name="" id="stall_num_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Stall ID</label>
                      <input type="text" class="form-control" name="violation[stall_id_f]" id="stall_id_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Tenant </label>
                      <input type="text" class="form-control" name="violation[name]" id="owner_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Address</label>
                      <input type="text" class="form-control" name="" id="address_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Occupant</label>
                      <input type="text" class="form-control" name="" id="occu_f" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="p-3">
                      <h5 class="font-weight-bold">Violation Details</h5>
                      <div class="form-group">
                        <label for="">Date Occured </label>
                        <input type="Date" class="form-control" name="violation[date]" required>
                      </div>
                      <div class="form-group">
                        <label for="">Violation Details</label>
                        <textarea class="form-control" rows="3" name="violation[desc]" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Add Violation</button>
                      <button type="reset" class="btn stylish-color-dark text-white">Clear</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </form>
      </div>



    </div>
  </div>
</div>





<div class="overlay"></div>
