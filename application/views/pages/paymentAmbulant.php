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

  <div class="container justify-content-center">
    <h5 class="card-header text-center  text-white bluegrads">Payment</h5>
    <div class="card m-3">
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered" id="AmbulantTable">
            <thead>
              <tr>
                <td>ID</td>
                <td>name</td>
                <td>Location</td>
                <td>Location Number</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content p-3">
        <h5>Payment Successful</h5>
      </div>
    </div>
  </div>

  <div id="failedActivation" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content p-3">
        <h5>Select a client first!</h5>
      </div>
    </div>
  </div>

</div>

<div class="overlay"></div>
