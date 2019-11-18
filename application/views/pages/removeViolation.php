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
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center mb-2">Violation List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="violationform" name="violationform">
        <div class="span6" style="float: none; margin: 0 auto;">
          <div class="row">

            <div class="col-12">
              <table class="table p-2" id="getviolationtable" >
                <thead>
                  <tr>
                    <td class="font-weight-bold" >description</td>
                    <td class="font-weight-bold" >date occurred</td>
                    <td class="font-weight-bold" >status</td>
                    <td class="font-weight-bold" >name</td>
                    <td class="font-weight-bold" >Resolve</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div id="violationmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
            <div class="modal-content p-2">
              <h5 class="font-weight-bold">Resolve Violation</h5>
              <div class="row">
                <div class="col-6">
                  <h5 >Details</h5>
                  <div class="form-group">
                    <label for="">Violation ID</label>
                    <input type="text" class="form-control" name="violation[violation_id_f]" id="vio" readonly>
                  </div>

                  <div class="form-group">
                    <label for="">customer ID</label>
                    <input type="text" class="form-control" name="violation[customer_id]" id="cust" readonly>
                  </div>
                  <div class="form-group">
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
                  <div class="mb-2">
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



<div class="overlay"></div>
