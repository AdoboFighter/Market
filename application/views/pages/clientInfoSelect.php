<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">select client type</h5>
    <br>
    <div class="card shadow">

        <div class="row p-2 m-5">
          <div class="col-6">
            
            <a href="<?php echo base_url().'pages/view/clientInformation' ?>" class="myButton">Tenant</a>
          </div>
          <div class="col-6">
            <a href="<?php echo base_url().'pages/view/clientInfoAmbu' ?>" class="myButton">Ambulant</a>
          </div>
        </div>
        <div class="row p-2 m-5">
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
