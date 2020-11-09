<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>


  <div class="container my-1 py-1">

    <!-- Section: Block Content -->
    <section class="">

      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

          <!-- Admin card -->
          <div id="userclick">
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-user-alt fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-left text-left p-3">
                <p class="text-uppercase text-muted mb-1"><small>User:</small></p>
                <h4 class="font-weight-bold mb-0"><?php echo $this->session->userdata('user_fullname'); ?></h4>
              </div>
            </div>

            <div class="card-body pt-0">
              <!-- <div class="progress md-progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
              aria-valuemax="100"></div>
            </div>
            <p class="card-text">Better than last week (75%)</p> -->
          </div>

        </div>
        </div>
        <!-- Admin card -->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">

        <!-- Admin card -->
        <div id="dateclick">
        <div class="card mt-3">

          <div class="">
            <i class="far fa-calendar-alt fa-lg teal z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
            <div class="float-right text-right p-3">
              <p class="text-uppercase text-muted mb-1"><small>Date</small></p>
              <h4 class="font-weight-bold mb-0" id="dateToday"></h4>
            </div>
          </div>

          <div class="card-body pt-0">
            <!-- <div class="progress md-progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <p class="card-text">Worse than last week (46%)</p> -->
        </div>

      </div>
    </div>
      <!-- Admin card -->
      <br>

      <!-- Admin card -->
      <div id="regambuclick">
      <div class="card mt-3">

        <div class="">
          <i class="fas fa-walking fa-lg brown z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
          <div class="float-right text-right p-3">
            <p class="text-uppercase text-muted mb-1"><small>Registered Ambulants</small></p>
            <h4 class="font-weight-bold mb-0" id="numambu"></h4>
          </div>
        </div>

        <div class="card-body pt-0">
          <!-- <div class="progress md-progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
          aria-valuemax="100"></div>
        </div>
        <p class="card-text">Worse than last week (46%)</p> -->
      </div>

    </div>
    </div>

    <!-- Admin card -->
    <br>
    <!-- Admin card -->
    <div id="violationclick">
    <div class="card mt-3">

      <div class="">
        <i class="fas fa-ban fa-lg red z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
        <div class="float-right text-right p-3">
          <p class="text-uppercase text-muted mb-1"><small>Violations</small></p>
          <h4 class="font-weight-bold mb-0" id="numvio"></h4>
        </div>
      </div>

      <div class="card-body pt-0">
        <!-- <div class="progress md-progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
        aria-valuemax="100"></div>
      </div>
      <p class="card-text">Worse than last week (46%)</p> -->
    </div>

  </div>
  </div>

  <!-- Admin card -->

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-4 col-md-6 mb-4">

  <!-- Admin card -->
  <div id="stallspaidclick">
  <div class="card mt-3">

    <div class="">
      <i class="fas fa-store fa-lg purple z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase text-muted mb-1"><small>Stalls paid</small></p>
        <h4 class="font-weight-bold mb-0" id="stallspaid"></h4>
      </div>
    </div>

    <div class="card-body pt-0">
      <!-- <div class="progress md-progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="31" aria-valuemin="0"
      aria-valuemax="100"></div>
    </div>
    <p class="card-text">Better than last week (31%)</p> -->
  </div>

</div>
</div>
<!-- Admin card -->
<br>
<!-- Admin card -->
<div id="transtodayclick">
<div class="card mt-3">

  <div class="">
    <i class="fas fa-cash-register fa-lg blue z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
    <div class="float-right text-right p-3">
      <p class="text-uppercase text-muted mb-1"><small>Transactions Today</small></p>
      <h4 class="font-weight-bold mb-0" id="numoftrans"></h4>
    </div>
  </div>

  <div class="card-body pt-0">

</div>
</div>
</div>


<!-- Admin card -->
<br>
<!-- Admin card -->
<div id="debtclick">
  <div class="card mt-3">

    <div>
      <i class="fas fa-money-bill-alt fa-lg green z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase text-muted mb-1"><small>Users with debt</small></p>
        <h4 class="font-weight-bold mb-0" id="debtstat"></h4>
      </div>
    </div>


    <div class="card-body pt-0">

  </div>

</div>
</div>

<!-- Admin card -->

</div>
<!--Grid column-->
</div>
<!--Grid row-->

</section>
<!--Section: Content-->


</div>

<!-- Dark Overlay element -->
</div>
<div class="overlay"></div>


<div id="userdetailsmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">System User</h5>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="mb-2">
            <label>System User</label>
            <input type="text" class="form-control"  value="<?php echo $this->session->userdata('user_fullname'); ?>"readonly>
          </div>

          <div class="mb-2">
            <label>Username</label>
            <input type="text" class="form-control"  value="<?php echo $this->session->userdata('username'); ?>"readonly>
          </div>

          <div class="mb-2">
            <label>Position</label>
            <input type="text" class="form-control"  value="<?php echo $this->session->userdata('position'); ?>"readonly>
          </div>

          <div class="mb-2">
            <label>User Level</label>
            <input type="text" class="form-control"  value="<?php echo $this->session->userdata('user_level'); ?>"readonly>
          </div>





      </div>

    </div>
  </div>
</div>
