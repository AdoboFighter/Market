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
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center mb-2">Violation List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="violationform" name="violationform">
        <div class="card shadow">
          <div class="row p-3">
            <div class="col-12">
              <table class="table table-striped table-bordered" id="getviolationtable" >
                <thead>
                  <tr>
                    <td class="border border-dark" >description</td>
                    <td class="border border-dark" >date occurred</td>
                    <td class="border border-dark" >status</td>
                    <td class="border border-dark" >name</td>
                    <td class="border border-dark" >Resolve</td>
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
                <h5 class="modal-title" id="exampleModalPreviewLabel">Resolve Violation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <h5 class="font-weight-bold">Payment Details</h5>
                    <div class="form-group">
                      <label for="">Violation ID</label>
                      <input type="text" class="form-control" name="violation[violation_id_f]" id="vio" readonly>
                      <input type="text" class="form-control" name="violation[customer_id]" id="cust" hidden>
                      <input type="text" class="form-control" name="violation[stall_id_f]" id="stall_id_f" hidden>
                    </div>

                    <div class="form-group">
                      <label for="">Stall No</label>
                      <input type="text" class="form-control" name="" id="stall_num_f" readonly>
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
                    <br>
                    <div class="mb-2 form-group" id="or">
                      <label>O.R</label>
                      <input type="text" class="form-control" name="violation[OR]" id="orField" required>
                    </div>
                    <div class="mb-2 form-group" id="amount">
                      <label>Amount to be paid:</label>
                      <input type="text" class="form-control" name="" id="amountToField" placeholder="0.00" required>
                    </div>
                    <div class="mb-2 form-group">
                      <label>Cash tendered</label>
                      <input type="text" class="form-control" name="violation[cash_tendered]" id="cashTendField" placeholder="0.00" required>
                    </div>
                    <div class="mb-2">
                      <label>Payment Effectivity</label>
                      <input type="date" class="form-control" name="violation[payment_effect]" id="payEffectField" placeholder="0.00" required>
                    </div>
                    <div class="mb-2 form-group text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
