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
    <h5 class="card-header text-center bg-primary text-white bluegrads">select client type</h5>
    <div class="card m-2">
      <div class="container">
        <form class="p-3">
          <div class="row">
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url().'pages/view/clientInformation' ?>" class="myButton">Tenant</a>
            </div>
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url().'pages/view/clientInfoAmbu' ?>" class="myButton">Ambulant</a>
            </div>
          </div>
          <div class="row">
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url().'pages/view/clientInfoDelivery' ?>" class="myButton">delivery</a>
            </div>
            <div class="col-6 p-3 mt-2">
              <a href="<?php echo base_url().'pages/view/clientInfoPark' ?>" class="myButton">parking</a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

</div>


<div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content p-3">
      <h5>Client Added</h5>
    </div>
  </div>
</div>

<div class="overlay"></div>
