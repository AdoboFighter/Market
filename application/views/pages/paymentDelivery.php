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
      <h5 class="card-header text-center  text-white bluegrads">Payment</h5>
      <div class="card m-3">
        <div class="row p-3">
          <div class="col-12">
            <table class="table table-striped table-bordered" id="DeliveryTable">
              <thead>
                <tr>
                  <td>Customer ID</td>
                  <td>Delivery ID</td>
                  <td>name</td>
                  <td>Payment</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">
          <h5>Payment Successful</h5>
        </div>
      </div>
    </div>

    <div id="failedActivation" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">
          <h5>Select a client first!</h5>
        </div>
      </div>
    </div>


    <div  class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3">
          <h5>Payment Successful</h5>
        </div>
      </div>
    </div>



    <div id="deliveryPay" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
        <div class="modal-content p-2">
          <h5>Tenant Payment</h5>
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
                  <label>customer ID</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_customer_id" >
                </div>
                <div class="mb-2">
                  <label>Tenant ID</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_delivery_id"  >
                </div>
                <div class="mb-2">
                  <label>Name</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_name" >
                </div>

                <!-- particulars -->


                  <h5>Particulars</h5>
                    <div class="col-6">
                      <input type="checkbox" name="sub_total" id = "sub_total" value=""> &nbsp;<strong>Sub Total</strong> <br>
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
                    <div class="col" id= "demo">
                      <input type="text" class="form-control payment_details ntw" name="total" id="total">
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
                    <option value="4013">Others</option>
                    <option value="4014">Certification</option>
                  </select>

                  <div class="mb-2">
                <label>O.R</label>
                <input type="text" class="form-control payment_details" name="" id="payment_or_number">
              </div>


              <div class="mb-2">
                <label>Amount to pay</label>
                <input type="text" class="form-control payment_details ntw" name="amount_to_pay " id="payment_amount_to_pay">
              </div>

              <div class="mb-2">
                <label>Cash tendered</label>
                <input type="text" class="form-control payment_details" name="cash_tendered" id="payment_cash_tendered">
              </div>


              <div class="mb-2">
                <label>Payment Effectivity</label>
                <input type="date" class="form-control payment_details" name="" id="payment_effectivity">
              </div>

              <div class="row" id = "chequeDetails">

              <div class="col-12">
                <h5> Cheque Details</h5>
                  <div class="col">
                    <label>Cheque Number</label>
                    <input type="text" class="form-control payment_details" name="transact[cheque_number]" id="payment_cheque_number">
                  </div>

                  <div class="col">
                    <label>Cheque Amount </label>
                    <input type="number" class="form-control payment_details" name="transact[cheque_amount]" id="payment_cheque_amount">
                  </div>

                  <div class="col">
                    <label>Cheque Date </label>
                    <input type="date" class="form-control payment_details" name="transact[cheque_date]" id="payment_cheque_date">
                  </div>

                  <div class="col">
                    <label>Bank/Branch</label>
                    <input type="text" class="form-control payment_details" name="transact[bank_branch]" id="payment_bank_branch">
                  </div>
                  <br>
                  <button class ="float-right btn btn-danger" id = "add_cheque">Add</button>
                </div>

                <div class="mb-2 form-group" >
                  <table class="table table-striped table-bordered p-2" id="table_cheque">
                    <thead>
                      <tr>
                      <th>Cheque no</th>
                        <th>Cheque Amount</th>
                        <th>Cheque Date</th>
                        <th>Bank Branch</th>
                        <th>delete</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>


                </div>


             </div>
        <!-- end of row for details -->

        <input type="hidden" id = "ntwntw">
        <div class="mb-2">
                <button type="Submit"  class="btn btn-primary float-left allPaymentButton" id = "payment_submit_button">Submit and print</button>
              </div>

              </div>


          </div>
          <!-- end row -->
          <br>

          </div>
        </div>
      </div>
      <!-- END OF MODAL -->

      <div id="rec" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
          <div class="modal-content p-2">
            <iframe src = "" id="frameasdas" height ="1000" width = "">


            </iframe>


            <button class = "btn btn-success">Print Receipt</button>
          </div>
        </div>
      </div>



</div>

<div class="overlay"></div>
