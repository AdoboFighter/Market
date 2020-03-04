<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">select client type</h5>
    <br>
    <div class="card m-2 shadow">
      <div class="container">
        <form class="p-3">
          <div class="row">
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url() . 'pages/view/addViolation' ?>" class="myButton">Add Violation</a>
            </div>
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url() . 'pages/view/removeViolation' ?>" class="myButton">Resolve Violation</a>
            </div>
          </div>
          <div class="row">
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url() . 'pages/view/resolveViolation' ?>" class="myButton">Resolved Violations</a>
            </div>
          </div>
      </div>
    </div>
    <br>
    <br>
    </form>
  </div>
</div>
</div>

</div>


<div class="overlay"></div>