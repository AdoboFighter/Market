<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Certification</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="certform">
        <div class="span6" style="float: none; margin: 0 auto;">
          <div class="row">
            <div class="col-12 form-group">
              <table class="table p-2"id="cert_table" >
                <thead>
                  <tr>
                    <td class="font-weight-bold" >transaction ID</td>
                    <td class="font-weight-bold" >Name</td>
                    <td class="font-weight-bold" >Address</td>
                    <td class="font-weight-bold" >Stall No.</td>
                    <td class="font-weight-bold" >Print</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div id="certmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
            <div class="modal-content p-2">
              <h5>Certification</h5>
              <div class="mb-2 form-group" width="80">
                <label>Type of payment</label>
                <select class="form-control form-control-sm" name="transact[payment_type]" id="location" >
                  <option selected value="">Please Select</option>
                  <option value="PDF2fcertification">2f certification</option>
                  <option value="PDFnoonwership">Certification for water district</option>
                  <option value="PDFwaterdistrict">Certification for no ownership and operation</option>
                </select>
              </div>
              <input type="hidden" id="transaction_id" name="cert[transaction_id]">
              <input type="hidden" id="cert" name="cert[cert]">
              <input type="hidden" id="fname" name="cert[fname]" >
              <input type="hidden" id="mname" name="cert[mname]" >
              <input type="hidden" id="lname" name="cert[lname]" >
              <input type="hidden" id="address" name="cert[address]">
              <input type="hidden" id="natbus" name="cert[natbus]">
              <input type="hidden" id="stall" name="cert[stall]">
              <input type="hidden" id="flrlvl" name="cert[flrlvl]">
              <input type="hidden" id="sysuser" name="cert[sysuser]" value="<?php echo $this->session->userdata('user_fullname');?>">
              <input type="hidden" id="floor_level" name="cert[floor_level]">
              <input type="hidden" id="days" name="cert[days]">
              <input type="hidden" id="month" name="cert[month]">
              <input type="hidden" id="year" name="cert[year]">
              <input type="hidden" id="OR" name="cert[OR]">
              <input type="hidden" id="today" name="cert[today]">
              <input type="hidden" id="or_number" name="cert[or_number]">
              <input type="hidden" id="payment_amount" name="cert[payment_amount]">
              <iframe id="iframe_preview_formgen"  frameborder="0" marginwidth="0" marginheight="0"  height="600"></iframe>
              <br>
              <div>
                <button type="submit" class="btn btn-primary" width="50" >Remove effectivity</button>
              </div>


            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>




</div>
<div class="overlay"></div>
