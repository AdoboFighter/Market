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
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Stall Owner List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="violationform">
        <div class="card shadow">
          <div class="row p-3">
            <div class="col-12">
              <table class="table table-striped table-bordered"id="add_vio_tab" >
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




        <div id="violationmodal" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPreviewLabel">Add Violation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <h5 class="font-weight-bold">Details</h5>
                      <label for="">Stall No</label>
                      <input type="text" class="form-control" name="" id="stall_num_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Stall ID</label>
                      <input type="text" class="form-control" name="violation[stall_id_f]" id="stall_id_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Owner </label>
                      <input type="text" class="form-control" name="violation[name]" id="owner_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Address</label>
                      <input type="text" class="form-control" name="" id="address_f" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Occupant</label>
                      <input type="text" class="form-control" name="" id="occu_f" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="p-3">
                      <h5 class="font-weight-bold">Violation Details</h5>
                      <div class="form-group">
                        <label for="">Date Occured </label>
                        <input type="Date" class="form-control" name="violation[date]">
                      </div>
                      <div class="form-group">
                        <label for="">Violation Details</label>
                        <textarea class="form-control" rows="3" name="violation[desc]"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Add Violation</button>
                      <button type="reset" class="btn stylish-color-dark text-white">Clear</button>
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





<div class="overlay"></div>
