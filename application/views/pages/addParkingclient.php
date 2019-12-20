<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Add parking client</h5>
    <br>
    <div class="card m-2 shadow">
      <div class="container">
        <form class="p-3" id="savePark" name="savePark">
          <div class="row">
            <div class="col">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="span6" style="float: none; margin: 0 auto;">
                  <div class="row">
                    <div class="col-12 form-group">
                      <table class="table p-2 table-hover table-bordered shadow border border-dark" id="add_vio_tab" >
                        <thead>
                          <tr>
                            <td class="border border-dark" >No</td>
                            <td class="border border-dark" >Name</td>
                            <td class="border border-dark" >Stall No.</td>
                            <td class="border border-dark" >Address</td>
                            <td class="border border-dark" >Occupant</td>
                            <td class="border border-dark" >load data</td>
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






            <div id="violationmodal" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Add Parking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <input type="hidden" class="form-control" name="customer[tenant_id]" id="tenant_id">
                        <input type="hidden" class="form-control" name="customer[customer_id]" id="customer_id">
                        <div class="form-group">
                          <h5 class="font-weight-bold">Details</h5>
                          <label for="">Lot No</label>
                          <input type="text" class="form-control" name="customer[lot_no]" id="lot_no">
                        </div>
                        <div class="form-group text-right">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
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
  <br>
  <br>

</div>



</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
