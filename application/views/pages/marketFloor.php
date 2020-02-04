<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark transparentnav noshadnav">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
      <h1 class="text-center transparentnav noshadnav" id="dateToday"></h1>
    </div>
  </nav>
  <!-- pagecontents dito mo lagay  -->

  <div class="container content-center ">
    <div class="card transparentnav noshadnav" >
      <div class="row">
        <div class="col-3">
          <h2>FLOOR 1</h2>
          <br>
          <div class="row">
            <div class="col-4">
              <i class="fas fa-walking fa-4x  blue-text"></i>
            </div>
            <div class="col">
              <h5>Registered Ambulants:<h5 id="numambu" class="text-success"></h5></h5>
            </div>
          </div>
          <br>
          <br>

          <div class="row">
            <div class="col-4">
              <i class="fas fa-store fa-4x blue-text"></i>
            </div>
            <div class="col">
              <h5>Registered Tenants:<h5 id="numstall" class="text-success"></h5></h5>

            </div>
          </div>
          <br>
          <br>

          <div class="row">
            <div class="col-4">
              <i class="fas fa-hand-holding-usd fa-4x blue-text"></i>
            </div>
            <div class="col">
              <h5>Transactions:<h5 id="numAllTrans" class="text-success"></h5> </h5>
            </div>
          </div>


        </div>

        <div class="col-9">
          <div id="map" style=" height: 500px;" class="shadow">
          </div>
        </div>
      </div>
    </div>

  </div>

</div>



<div class="modal  fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stallhead"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="getStallfloorsubmit">

          <table class="table p-2 table-hover table-bordered shadow border border-dark" id="stall_floor_info" >
            <thead>
              <tr>
                <td class="border border-dark" >Registered Stall #</td>
                <td class="border border-dark" >Name</td>
                <td class="border border-dark" >Payment</td>
                <td class="border border-dark" >Client Info</td>
              </tr>
            </thead>
            <tbody >
            </tbody>
          </table>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- END OF MODAL -->

<div class="modal fade" id="client_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stallhead_pay"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updatecustomerinfo">
          <div class="container justify-content-center">
            <h5 class="font-weight-bold">Stall Information</h5>
            <div class="row p-3">

              <div class="col-6">
                <div class="form-group">
                  <label>Section</label>
                  <select class="form-control form-control-sm" name="update[section]" id="Section">
                    <option selected value="">Please Select</option>
                    <option value="Fish">Fish</option>
                    <option value="Meat">Meat</option>
                    <option value="Section1">Section 1</option>
                    <option value="Section2">Section 2</option>
                  </select><br>
                </div>
                <div class="form-group" id="floorlevel">
                  <label>Floor Level</label>
                  <select class="form-control form-control-sm" id="stall_flr_lvl" name="update[floor_level]">
                    <option value=""></option>
                    <option value="Basement">Basement</option>
                    <option value="Ground">Ground Floor</option>
                    <option value="Second">Second Floor</option>
                    <option value="Third">Third Floor</option>
                    <option value="Fourth">Fourth Floor</option>
                  </select><br>
                </div>
                <div class=" form-group" id="">
                  <label>Business name:</label>
                  <input type="input" class="form-control" name="update[business_name]" id="business_name" required>
                </div>
                <div class=" form-group" id="">
                  <label>Business ID:</label>
                  <input type="input" class="form-control" name="update[business_id]" id="business_id" required>
                </div>
              </div>

              <div class="col-6">
                <div class=" form-group">
                  <label>Nature of Business:</label>
                  <input type="input" class="form-control" name="update[nature_or_business]" id="nature_or_business" required>
                </div>
                <div class=" form-group">
                  <label>Stall No:</label>
                  <input type="input" class="form-control" name="update[stall_number]" id="stall_number" required>
                </div>
                <div class=" form-group">
                  <label>Area(sqm):</label>
                  <input type="input" class="form-control" name="update[area]" id="area" required>
                </div>
                <div class=" form-group">
                  <label>Daily Fee:</label>
                  <input type="input" class="form-control" name="update[daily_fee]" id="daily_fee" required>
                </div>
              </div>
            </div>

            <br>
            <div class="row mt-2">

              <div class="col-6 ">

                <h5 class="font-weight-bold">Owner's Information</h5>
                <input type="hidden" id = "customer_id" name = "update[customer_id]">
                <input type="hidden" id = "stall_id" name = "update[stall_id]">
                <div class="mb-2 form-group" id="">
                  <label>First name:</label>
                  <input type="input" class="form-control" name="update[owner_fn]" id="owner_fn" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Middile name:</label>
                  <input type="input" class="form-control" name="update[owner_mn]" id="owner_mn" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Last name:</label>
                  <input type="input" class="form-control" name="update[owner_ln]" id="owner_ln" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Address:</label>
                  <input type="input" class="form-control" name="update[owner_add]" id="owner_add" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Contact Number:</label>
                  <input type="input" class="form-control" name="update[owner_cn]" id="owner_cn" required>
                </div>
              </div>




              <div class="col-6 ">
                <h5 class="font-weight-bold">Occupant's Information</h5>
                <div class="mb-2 form-group" id="">
                  <label>First name:</label>
                  <input type="input" class="form-control" name="update[occu_fn]" id="occu_fn" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Middile name:</label>
                  <input type="input" class="form-control" name="update[occu_mn]" id="occu_mn" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Last name:</label>
                  <input type="input" class="form-control" name="update[occu_ln]" id="occu_ln" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Address:</label>
                  <input type="input" class="form-control" name="update[occu_add]" id="occu_add" required>
                </div>
                <div class="mb-2 form-group" id="">
                  <label>Contact Number:</label>
                  <input type="input" class="form-control" name="update[occu_cn]" id="occu_cn" required>
                </div>
                <div class="row p-2">
                  <div class="p-2">
                    <button class ="btn stylish-color-dark text-white" type="button" id="payhistbtn">Payment History</button>
                  </div>
                  <div class="p-2">
                    <button class = "btn btn-primary" type="submit">Update</button>
                  </div>
                </div>

                <br>
                <br>
              </div>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- END OF MODAL -->

<div id="TenantPay" data-backdrop="static" class="modal fade right"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Tenant Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class ="row">
          <div class = "col-12">
            <select name="payment_type" id="payment_type" class = "form-control">
              <option value="">Select Payment Type</option>
              <option value="cash">Cash</option>
              <option value="cheque">Cheque</option>
              <option value="cashandcheque">Cash and cheque</option>
            </select>
          </div>
        </div><br>

        <div class = "row" id = "paymentDet">
          <!-- paymentDet ID -->

          <!-- customer details -->
          <div class ="col-6">

            <div class="mb-2">

              <input type="text" class="form-control payment_details" name="" id="payment_customer_id" hidden>
            </div>
            <div class="mb-2">

              <input type="text" class="form-control payment_details" name="" id="payment_tenant_id" hidden>
            </div>
            <div class="mb-2">
              <label>Name</label>
              <input type="text" class="form-control payment_details" name="" id="payment_name" readonly>
            </div>

            <!-- particulars -->


            <h5>Particulars</h5>
            <div class="col-6">
              <input type="checkbox" name="sub_total" id = "sub_total" class = "ntw" value=""> &nbsp;<strong>Sub Total</strong> <br>
            </div>
            <div class="row mt-2">
              <div class="col">
                <label>Particulars</label>
                <input type="text" class="form-control payment_details" name="part1text" id="part1text" >
              </div>

              <div class="col">
                <label>Price</label>
                <input type="number" class="form-control partnum payment_details ntw" name="part1num" id="part1num" value = "0" >
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part2text" id="part2text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part2num" id="part2num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part3text" id="part3text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part3num" id="part3num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part4text" id="part4text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part4num" id="part4num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part5text" id="part5text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part5num" id="part5num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part6text" id="part6text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part6num" id="part6num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col">
                <input type="text" class="form-control payment_details" name="part7text" id="part7text" >
              </div>
              <div class="col">
                <input type="number" class="form-control partnum payment_details ntw" name="part7num" id="part7num" value = "0">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col" id = "demo">
                <label>Total</label>
                <input type="text" class="form-control payment_details ntw text-danger" name="total" id="total" readonly>
                <div></div>
              </div>
            </div>




            <!-- particulars end -->

          </div>
          <!-- customer details -->
          <div class ="col-6">

            <label>Type of payment</label>
            <select class="form-control form-control-sm payment_details" name="payment_type_of_payment" id="payment_type_of_payment" required>
              <option selected value="">Please Select</option>
              <option value="4004">Annual Rental fee</option>
              <option value="4005">Semi Annual Fee</option>
              <option value="4006">Quarterly Annual Fee</option>
              <option value="4007">Water Services Fee</option>
              <option value="4008">Electrical Services Fee</option>
              <option value="4009">Monthly Rental Fee</option>
              <option value="4010">Weekly Rental Fee</option>
              <option value="4011">Daily Market Fee</option>
              <option value="4012">Privillage Market Fee</option>
              <option value="4014">Others</option>
              <option value="4015">Certification</option>
            </select>

            <div class="mb-2">
              <label>O.R</label>
              <input type="text" class="form-control payment_details" name="" id="payment_or_number">
            </div>


            <div class="mb-2">
              <label>Amount to pay</label>
              <input type="text" class="form-control payment_details ntw" name="amount_to_pay" id="payment_amount_to_pay" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
            </div>

            <div class="mb-2">
              <label>Cash tendered</label>
              <input type="text" class="form-control payment_details" name="cash_tendered" id="payment_cash_tendered" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
            </div>


            <div class="mb-2">
              <label>Payment Effectivity</label>
              <input type="date" class="form-control payment_details" name="" id="payment_effectivity">
            </div>


            <!-- end of row for details -->
            <input type="hidden" id = "ntwntw">
            <div class="mb-2">
              <button type="Submit"  class="btn btn-primary float-left allPaymentButton" id = "payment_submit">Submit and print</button>
            </div>
          </div>
        </div>
        <!-- end row -->
        <br>

        <div id = "chequeDetails">
          <div class="row">
            <div class="col-6">
              <div class="col">
                <label>Cheque Number</label>
                <input type="text" class="form-control payment_details" name="transact[cheque_number]" id="payment_cheque_number">
              </div>

              <div class="col">
                <label>Cheque Amount </label>
                <input type="text" class="form-control payment_details" name="transact[cheque_amount]" id="payment_cheque_amount"  onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
              </div>
            </div>
            <div class="col-6">

              <div class="col">
                <label>Cheque Date </label>
                <input type="date" class="form-control payment_details" name="transact[cheque_date]" id="payment_cheque_date">
              </div>

              <div class="col">
                <label>Bank/Branch</label>
                <input type="text" class="form-control payment_details" name="transact[bank_branch]" id="payment_bank_branch">
              </div>
              <br>
              <button class ="float-right stylish-color-dark btn text-white" id = "add_cheque">Add</button>
            </div>
          </div>
          <br>


          <div class="mb-2 form-group" >
            <table class="table table-striped table-bordered p-2 shadow" id="table_cheque">
              <thead>
                <tr>
                  <th class="border border-dark">Cheque no</th>
                  <th class="border border-dark">Cheque Amount</th>
                  <th class="border border-dark">Cheque Date</th>
                  <th class="border border-dark">Bank Branch</th>
                  <th class="border border-dark">delete</th>
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
</div>
<!-- END OF MODAL -->

<div id="print" class="modal fade right" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id ="printrec">

          <h3 class = "text-center">Do you want to Print Receipt?</h3>
          <!-- <input type="text" id ="payer">
          <input type="text" id ="totalprint">
          <input type="text" id ="cashcheck"> -->
          <div class = "text-center">
            <button class = "btn btn-success"type ="submit" value = "yes"> Print Receipt</button>
            <button class = "btn btn-danger" type ="button" value ="no" id="pintmodalclose">Close</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- END OF MODAL -->

<div id="violationmodal" class="modal fade right"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Tenant Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered shadow" id="pay_hist_tab" style="width:100%">
          <thead>
            <tr>
              <td class="border border-dark">OR#</td>
              <td class="border border-dark">Nature or payment</td>
              <td class="border border-dark">Amount</td>
              <td class="border border-dark">Date</td>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<!-- END OF MODAL -->















</div>

<div class="overlay"></div>
