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


<!-- 
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
              <input type="text" placeholder="0.00" value="0.00" class="form-control payment_details ntw inputmoney" name="amount_to_pay" id="payment_amount_to_pay2" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;" required>
          </div>
          <br>
          <button type="submit" class ="float-right stylish-color-dark btn text-white" id ="add_item_type">Add</button>
        </form>

        </div>

      </div>
    </div>
  </div> -->
  <!-- END OF MODAL -->



</div>

</div>
<div class="overlay"></div>












































<div id="TenantModalPay" data-backdrop="static" class="modal fade right"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <form id="payment_submit">
      <div class="modal-dialog modal-xl" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalPreviewLabel">Tenant Payment</h5>
            <button type="button" class="close" aria-label="Close" id = "close_modal_payment" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-5 pr-5 ">

          <!-- payment_type_hide -->

            <div class ="row">
              <div class = "col-lg-6" id ="">
                <div class="mb-2">
                  <label>Customer ID</label>
                  <input type="text" class="form-control payment_details" name="pay[customID]" id="payment_customer_id" readonly>
                </div>
              </div>

              <div class = "col-lg-6" id ="">
                <div class="mb-2">
                  <label>Stall number</label>
                  <input type="text" class="form-control payment_details" name="pay[stall_number]" id="payment_stall" readonly>
                </div>
              </div>

              <div class = "col-lg-12" id ="">
                <div class="mb-2">
                  <label>Name</label>
                  <input type="text" class="form-control payment_details" name="pay[payor]" id="payment_name" readonly>
                </div>
              </div>
            </div>

            <br>

            <div class ="row">
              <div class="col-lg-12">
                

                <div class="row">
                  <div class="col-lg-6 mt-3 h3 "> ITEMS </div>
                  <div class="col-lg-6">
                    <button id="addRow" class=" btn btn-outline-success waves-effect float-right" type="button" onclick="addNewRow()">ADD ITEM</button>
                    <!-- <button id="removeRow" class=" btn btn-outline-danger waves-effect btn-sm " type="button" disabled>remove</button> -->
                  </div>
                </div>


                <div class="table-responsive mb-3">
                  <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                      <td>No</td>
                      <td>Particulars</td>
                      <td>Date Effectivity</td>
                      <td>Price</td>
                      <td>Action</td>
                    </tr>
                    </thead>

                    <tbody id="tbodyParticulars"></tbody>
                  </table>
                </div>

             
              </div>



            <div class="col-lg-12 bg-info">
            <div class="row p-3 ml-3">
              <div class="ml-2 text-white">Mode of Payment</div>
              <div class="custom-control custom-radio ml-3">
                <input type="radio" class="custom-control-input" id="cashPayment" name="paymentCol" value="cash" checked>
                <label class="custom-control-label text-white" for="cashPayment">Cash</label>
              </div>

              <div class="custom-control custom-radio ml-3">
                <input type="radio" class="custom-control-input" id="chequePayment" name="paymentCol" value="bank" >
                <label class="custom-control-label text-white" for="chequePayment">Bank</label>
              </div>

              <div class="custom-control custom-radio ml-3">
                <input type="radio" class="custom-control-input" id="bankCashPayment" name="paymentCol" value="bankCash" >
                <label class="custom-control-label text-white" for="bankCashPayment">Bank/Cash</label>
              </div>
            </div>
            </div>



        <div class="col-lg-12">

            <div class=" row mt-3" >
                <div class="col-lg-12 mb-2">
                  <label>Amount To Pay</label>
                  <input type="text"  placeholder="0.00"  class="form-control text-right" name="pay[ttlAmt]" id="ttlAmt" readonly>
                </div>
            </div>

 
            <div class="cashCol bankCashCol row mt-3" >
                <div class="col-lg-12 mb-2">
                  <label>Cash tendered</label>
                  <input type="text"  placeholder="0.00"  class="form-control payment_details text-right money2" name="pay[cash_tendered]" id="payment_cash_tendered" onchange="getChange(this.value)">
                  <!-- <input type="text"  placeholder="0.00"  class="form-control payment_details inputmoney" name="cash_tendered" id="payment_cash_tendered" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;"> -->
                </div>
            </div>

            <div class="bankCol  bankCashCol mt-3" hidden>
                <div class="row mt-2">

                    <div class="col-lg-6 col-sm-12 mt-2">
                      <label>Cheque Number</label>
                      <input type="text" class="form-control payment_details" name="pay[cheque_number]" id="payment_cheque_number">
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                      <label>Cheque Amount </label>
                      <!-- <input type="text"  placeholder="0.00"  class="form-control payment_details inputmoney money2" name="pay[cheque_amount]" id="payment_cheque_amount"  onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;"> -->
                      <input type="text"  placeholder="0.00"  class="form-control payment_details  money2" name="pay[cheque_amount]" id="payment_cheque_amount">
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                      <label>Cheque Date </label>
                      <input type="date" class="form-control payment_details" name="pay[cheque_date]" id="payment_cheque_date">
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                      <label>Bank/Branch</label>
                      <input type="text" class="form-control payment_details" name="pay[bank_branch]" id="payment_bank_branch">
                    </div>

                    <div class="col-lg-12">
                      <button type="button" class ="float-right stylish-color-dark btn text-white" id = "add_cheque">Add</button>
                    </div>



                <div class="mb-2 col-lg-12 form-group mt-3">
                  <table class="table table-striped table-bordered p-2 table-sm" id="table_cheque">
                    <thead>
                      <tr>
                        <th class="border border-dark">Cheque no</th>
                        <th class="border border-dark inputmoney">Cheque Amount</th>
                        <th class="border border-dark">Cheque Date</th>
                        <th class="border border-dark">Bank Branch</th>
                        <th class="border border-dark">delete</th>
                      </tr>
                    </thead>
                    <tbody id="ttlChequeTbody">
                    </tbody>
                  </table>
                </div>


            <div class="col-lg-12 col-sm-12">
              <label>TOTAL CHEQUE AMOUNT</label>
              <p class="text-success p-2 float-right" value="0.00" placeholder="0.00"  id="payment_cheque_total"></p>
            </div>
           


            </div>
            </div>
        


               



            <div class="row mt-3">
                    <div class="col-lg-6 col-sm-12 ">
                      <label>Total amount given</label>
                      <input type="text" class="form-control payment_details ntw text-danger inputmoney" name="total_amount_given" id="total_amount_given" readonly />
                    </div>

                    <div class="col-lg-6 col-sm-12 mb-2">
                      <label>Change</label>
                      <input type="text" class="form-control payment_details ntw text-danger inputmoney" name="pay[change]" id="change" readonly />
                    </div>

                    <div class="col-lg-6 col-sm-12 mb-2">
                      <label>O.R</label>
                      <input type="text"  maxlength="7" class="form-control payment_details ntw text-danger inputmoney" name="pay[payment_or_number]" id="payment_or_number" required/>
                    </div>
            </div>

                
                <!-- end of row for details -->
                <input type="hidden" id = "ntwntw">
                <div class="col-lg-12">
                  <button type="submit"  class="btn btn-primary float-right allPaymentButton" id = "payment_submit_btn">Submit and print</button>
                </div>


                <input type="text" class="form-control" name="pay[no]" id="no" readonly />
                <input type="text" class="form-control" name="pay[particulars]" id="particulars" readonly />
                <input type="text" class="form-control" name="pay[date]" id="date" readonly />
                <input type="text" class="form-control" name="pay[price]" id="price" readonly />

        
            <!-- end row -->

          </div>
        </div>
      </div>
    </form>
  </div>








  
  <div id="add_Newitem_window" class="modal fade right shadow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalPreviewLabel">Add item</h5>
          <button type="button" class="close"  id="" onclick="closeModal('add_Newitem_window')">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="add_Newitem_form">
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
              <!-- <input type="text" placeholder="0.00" value="0.00" class="form-control payment_details ntw inputmoney money2" name="amount_to_pay" id="payment_amount_to_pay2" onkeypress="return isNumberKey(this, event);" ondrop="return false;" onpaste="return false;" oncontextmenu="return false;" required> -->
              <input type="text" placeholder="0.00" value="0.00" class="form-control text-right money2" name="amount_to_pay" id="payment_amount_to_pay2" onfocus="this.value=''" required>
          </div>
          <br>
          <button type="submit" class ="float-right stylish-color-dark btn text-white" id ="add_item_type">Add</button>
        </form>

        </div>

      </div>
    </div>
  </div>
  <!-- END OF MODAL -->








  <div id="rec" class="modal fade right shadow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header p-2">
          <button class = "btn btn-success btn-sm m-2" id="printbtn">Print Receipt</button>

          <button type="button"  id="close_modal_receipt2"  class="close" onclick="closeModal('rec')" >
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body p-0">

          <iframe src = "" id="frameasdas" height ="500" width = "100%">
          </iframe>

        </div>

      </div>
    </div>
  </div>
  <!-- END OF MODAL -->





