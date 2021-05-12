<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->

  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center mb-2">
    <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">
      <i class="fas fa-search"></i>
    </button>
    Transaction History</h5>
  <div class="container justify-content-center">
    <div class="card m-3 shadow">
      <div class="row p-3">
        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold" id="">
            <div class="mb-2 form-group font-weight-bold sort" id="">
              <label>Unit no:</label>
              <p id="unit_no"></p>
            </div>

          </div>
        </div>

        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold" id="">
            <div class="mb-2 form-group font-weight-bold sort" id="">
              <label>Name:</label>
              <p id="name"></p>
            </div>

          </div>
        </div>

        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold sort" id="">
            <label>Date from:</label>
            <input type="date" class="form-control" name="date_from" id="date_from" required>
          </div>
        </div>
        <div class="col-3">
          <div class="mb-2 form-group font-weight-bold sort" id="">
            <label>Date to:</label>
            <input type="date" class="form-control" name="date_to" id="date_to" required>
          </div>
        </div>

      </div>
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered shadow" id="">
            <thead>
              <tr>
                <td class="border border-dark">no</td>
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



<div id="searchmodal" class="modal fade right" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tenant search</h5>
        <a href="<?php echo base_url() . 'pages/view/home' ?>">
          <button type="button" class="btn btn-primary">
            To home
          </button>
        </a>
      </div>
      <div class="modal-body">
        <div class="">
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



          <div class="col-12">
            <table width="100%" class="table table-striped table-bordered shadow" id="tableNoStall">
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
                  <td class="border border-dark" scope="col">Load data</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <br>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>







<div class="overlay"></div>
