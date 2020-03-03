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
    <div class="card shadow">
      <div class="row p-5">
        <div class="col-6 text-center">
          <a href="" class="btn-floating btn-lg purple-gradient">
            <i class="fas fa-store fa-10x"></i>
            <br>
            <label>Tenant</label>
          </a>
        </div>
        <div class="col-6">
          <a href="<?php echo base_url().'pages/view/clientInfoAmbu' ?>" class="myButton">Ambulant</a>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <a href="<?php echo base_url().'pages/view/clientInfoDelivery' ?>" class="myButton">delivery</a>
        </div>
        <div class="col-6">
          <a href="<?php echo base_url().'pages/view/clientInfoPark' ?>" class="myButton">parking</a>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>

<div class="overlay"></div>
