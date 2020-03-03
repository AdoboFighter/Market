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
          <!-- Admin card -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="far fa-calendar-alt fa-lg teal z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <!-- <p class="text-uppercase text-muted mb-1"><small>Registered Ambulants</small></p> -->
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

          <!-- Admin card -->
          <br>

          <!-- Admin card -->
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

          <!-- Admin card -->
          <br>
          <!-- Admin card -->
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

          <!-- Admin card -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-store fa-lg purple z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <p class="text-uppercase text-muted mb-1"><small>Stalls paid</small></p>
                <h4 class="font-weight-bold mb-0">0</h4>
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
          <!-- Admin card -->
          <br>
          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-cash-register fa-lg blue z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <p class="text-uppercase text-muted mb-1"><small>Transactions Today</small></p>
                <h4 class="font-weight-bold mb-0" id="numoftrans"></h4>
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
          <!-- Admin card -->
          <br>
          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-money-bill-alt fa-lg green z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <p class="text-uppercase text-muted mb-1"><small>Users with debt</small></p>
                <h4 class="font-weight-bold mb-0">0</h4>
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