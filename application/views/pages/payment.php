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
    <h5 class="card-header text-center text-white bluegrads">Payment</h5>
    <br>
    <div class="card m-3 shadow">
      <div class="">
        <div class="row p-3">

          <div class="col">
            <div class="form-group">
              <label>Search</label>
              <input class="form-control form-control-sm mr-3 w-75" type="text" id="search_cl_f" placeholder="Search (stall#, name, section, etc)"
              aria-label="Search">
              <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label>Category</label>
              <select class="form-control form-control-sm" id="search_cl_s">
                <option selected value="">Please Select</option>
                <option value="customer_id">Customer ID</option>
                <option value="firstname,' ',middlename,' ',lastname">Tenant's name</option>
                <option value="aofirstname,' ',aomiddlename,' ',aolastname">Occupant's name</option>
                <option value="unit_no">Stall number</option>
                <option value="Section">Section</option>
                <option value="nature_or_business">Nature of business</option>
                <option value="sqm">Area(sqm)</option>
                <option value="dailyfee">Daily fee</option>
              </select>
            </div>
          </div>
        </div>



        <div class="col-12">
          <table class="table table-striped table-bordered shadow" id="tableNoStall">
            <thead>
              <tr>
                <td class="border border-dark">Customer ID</td>
                <td class="border border-dark">Stall no.</td>
                <td class="border border-dark">Section</td>
                <td class="border border-dark">Nature of business</td>
                <td class="border border-dark">Area(sqm)</td>
                <td class="border border-dark">Daily fee</td>
                <td class="border border-dark">Tenant's name</td>
                <td class="border border-dark">Occupant's name</td>
                <td class="border border-dark" scope="col">To pay</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <br>
        </div>

      </div>
    </div>
  </div>
  <br>
  <br>


  <div id="TenantPay" data-backdrop="static" class="modal fade right"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <form id="payment_submit">
      <div class="modal-dialog modal-fluid" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalPreviewLabel">Tenant Payment</h5>
            <button type="button" class="close" aria-label="Close" id = "close_modal_payment">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class ="row">
              <div class = "col-4" id ="payment_type_hide">
                <div class="mb-2">
                  <label>Customer ID</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_customer_id" readonly>
                </div>
              </div>

              <div class = "col-4" id ="payment_type_hide">
                <div class="mb-2">
                  <label>Stall number</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_stall" readonly>
                </div>
              </div>

              <div class = "col-4" id ="payment_type_hide">
                <div class="mb-2">
                  <label>Name</label>
                  <input type="text" class="form-control payment_details" name="" id="payment_name" readonly>
                </div>
              </div>
            </div>

            <br>

            <div class ="row">
              <div class="col-6">

                <!-- paymentDet ID -->
                <!-- customer details -->
                <!-- customer details -->


                <!-- particulars -->
                <!-- <h5>Particulars</h5> -->
                <!-- <div class="row">
                  <div class="col">
                    <button type="button" class ="float-left stylish-color-dark btn text-white" id ="add_item">Add item</button>
                  </div>
                </div> -->

                <div class="row mt-2">
                  <div class="col">
                    <div class="mb-2">
                      <label>O.R</label>
                      <input type="text" maxlength="7" class="form-control payment_details" name="" id="payment_or_number" required>
                    </div>
                  </div>
                </div>




                <div class="row mt-3">
                  <div class="col">
                    <label>Particulars</label>
                    <input type="text" class="form-control payment_details" name="part1text" id="part1text" >
                  </div>

                  <div class="col">
                    <label>Date Effectivity</label>
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity1" >
                  </div>

                  <div class="col">
                    <label>Price</label>
                    <input type="text"  value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part1num" id="part1num" value = "0"  onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>

                  <div class="col">
                    <br>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm" id="add_row1">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm" id="del_row1">-</button>
                    </div>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part2text" id="part2text" >
                  </div>

                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part2num" id="part2num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>

                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>

                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part3text" id="part3text" >
                  </div>

                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part3num" id="part3num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>

                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part4text" id="part4text" >
                  </div>

                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part4num" id="part4num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>
                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>

                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part5text" id="part5text" >
                  </div>


                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part5num" id="part5num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>
                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>

                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part6text" id="part6text" >
                  </div>

                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part6num" id="part6num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>

                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col">
                    <input type="text" class="form-control payment_details" name="part7text" id="part7text" >
                  </div>

                  <div class="col">
                    <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
                  </div>

                  <div class="col">
                    <input type="text" decimal="2" step="0.25" value="0.00"  placeholder="0.00"  class="form-control partnum payment_details ntw inputmoney" name="part7num" id="part7num" value = "0" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                  </div>
                  <div class="col">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class=" btn btn-outline-success waves-effect btn-sm">+</button>
                      &nbsp
                      <button type="button" class=" btn btn-outline-danger waves-effect btn-sm">-</button>
                    </div>
                  </div>

                </div>

                <!-- particulars end -->
              </div>

              <div class="col-6" id = "">
                <div class="mb-2">
                  <label>Cash tendered</label>
                  <input type="text"  placeholder="0.00"  class="form-control payment_details inputmoney" name="cash_tendered" id="payment_cash_tendered" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                </div>
                <br>
                <!-- chequeDetails id -->
                <div class="row mt-2">
                  <div class="col-6">
                    <div class="col">
                      <label>Cheque Number</label>
                      <input type="text" class="form-control payment_details" name="transact[cheque_number]" id="payment_cheque_number">
                    </div>

                    <div class="col">
                      <label>Cheque Amount </label>
                      <input type="text"  placeholder="0.00"  class="form-control payment_details inputmoney" name="transact[cheque_amount]" id="payment_cheque_amount"  onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;">
                    </div>

                    <div class="col">
                      <br>
                      <label>Total cheque amount</label>
                      <p class="text-success p-2" value="0.00" placeholder="0.00"  id="payment_cheque_total"></p>
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
                    <button type="button" class ="float-right stylish-color-dark btn text-white" id = "add_cheque">Add</button>
                  </div>
                </div>
                <br>


                <div class="mb-2 form-group">
                  <table class="table table-striped table-bordered p-2" id="table_cheque">
                    <thead>
                      <tr>
                        <th class="border border-dark">Cheque no</th>
                        <th class="border border-dark inputmoney">Cheque Amount</th>
                        <th class="border border-dark">Cheque Date</th>
                        <th class="border border-dark">Bank Branch</th>
                        <th class="border border-dark">delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <br>
                <div class="row mt-2">
                  <div class="col">
                    <label>Total amount given</label>
                    <input type="text" class="form-control payment_details ntw text-danger inputmoney" name="total_amount_given" id="total_amount_given" readonly>
                    <div></div>
                  </div>

                </div>

                <div class="row mt-2">
                  <div class="col" id = "demo">
                    <label>Total</label>
                    <input type="text" placeholder="0.00" class="form-control payment_details ntw text-danger inputmoney" name="total" id="total" readonly>
                    <div></div>
                  </div>

                  <div class="col">
                    <label>Change</label>
                    <input type="text" class="form-control payment_details ntw text-danger inputmoney" name="change" id="change" readonly>
                  </div>
                </div>
                <br>

                <!-- end of row for details -->
                <input type="hidden" id = "ntwntw">
                <div class="">
                  <button type="submit"  class="btn btn-primary float-right allPaymentButton" id = "payment_submit_btn">Submit and print</button>
                </div>
              </div>
            </div>

            <br>
            <br>
            <!-- end row -->
          </div>

        </div>
      </div>
    </form>
  </div>
  <!-- END OF MODAL -->

  <div id="print" class="modal fade right" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  aria-label="Close" id="close_modal_receipt">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id ="printrec">
            <h3 class = "text-center">Do you want to Print Receipt?</h3>
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


  <div id="rec" class="modal fade right shadow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class = "btn btn-primary" id="printbtn">Back</button>
          <button class = "btn btn-success " id="printbtn">Print Receipt</button>

          <button type="button" class="close"  aria-label="Close" id="close_modal_receipt2">
            <span aria-hidden="true">&times;</span>
          </button>


        </div>
        <div class="modal-body">

          <iframe src = "" id="frameasdas" height ="800" width = "100%">
          </iframe>

        </div>

      </div>
    </div>
  </div>
  <!-- END OF MODAL -->


  <div id="add_item_window" class="modal fade right shadow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalPreviewLabel">Add item</h5>
          <button type="button" class="close"  aria-label="Close" data-dismiss="modal" id="close_modal_receipt2">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add_item_form">
          <div class="mb-2">
            <input type="hidden" name="" id="what_row" required>
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
          </div>

          <div class="mb-2">
            <label>Payment Effectivity</label>
            <input type="date" class="form-control payment_details" name="" id="payment_effectivity" required>
          </div>

          <div class="mb-2">
            <label>Amount to pay</label>
            <input type="text" placeholder="0.00" value="0.00" class="form-control payment_details ntw inputmoney" name="amount_to_pay" id="payment_amount_to_pay" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;" required>
          </div>
          <br>
          <button type="submit" class ="float-right stylish-color-dark btn text-white" id ="add_item_type">Add</button>
        </form>

        </div>

      </div>
    </div>
  </div>
  <!-- END OF MODAL -->



</div>

</div>
<div class="overlay"></div>
