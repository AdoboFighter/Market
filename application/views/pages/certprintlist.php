<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Certification</h5>

  <div class="container justify-content-center ">
    <div class="card m-3 shadow">
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
              <option value="transaction_id">transaction ID</option>
              <option value="firstname,' ',middlename,' ',lastname">Tenant's Name</option>
              <option value="payment_datetime">Date of payment</option>
              <option value="cert_type">Type of certificate</option>
              <option value="reference_num">Reference number</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row p-3">
        <div class="col-12">
          <table class="table p-2 table-hover table-bordered shadow border border-dark" id="cert_table">
            <thead>
              <tr>
                <td class="border border-dark">transaction ID</td>
                <td class="border border-dark">Tenant's Name</td>
                <td class="border border-dark">Date of payment</td>
                <td class="border border-dark">Type of certificate</td>
                <td class="border border-dark">Reference number</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>




</div>
<div class="overlay"></div>
