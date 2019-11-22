<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Add parking client</h5>

    <div class="card m-2">
      <div class="container">
        <form class="p-3" id="savePark" name="savePark">
          <div class="row">
            <div class="col">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="span6" style="float: none; margin: 0 auto;">
                  <div class="row">
                    <div class="col-12 form-group">
                      <table class="table p-2"id="add_vio_tab" >
                        <thead>
                          <tr>
                            <td class="font-weight-bold" >No</td>
                            <td class="font-weight-bold" >Name</td>
                            <td class="font-weight-bold" >Stall No.</td>
                            <td class="font-weight-bold" >Address</td>
                            <td class="font-weight-bold" >Occupant</td>
                            <td class="font-weight-bold" >load data</td>
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




            <div id="violationmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
              <div class="modal-dialog modal-xl modal-dialog-centered ">
                <div class="modal-content p-2">
                  <div class="row">
                    <div class="col">
                        <input type="hidden" class="form-control" name="customer[tenant_id]" id="tenant_id">
                        <input type="hidden" class="form-control" name="customer[customer_id]" id="customer_id">
                      <div class="form-group">
                        <h5 class="font-weight-bold">Details</h5>
                        <label for="">Lot No</label>
                        <input type="text" class="form-control" name="customer[lot_no]" id="lot_no">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
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



</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
