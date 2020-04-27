<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>

  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Certification</h5>

  <div class="container justify-content-center ">
    <div class="card m-3 shadow">
      <div class="row p-3">
        <div class="col-12">
          <table class="table p-2 table-hover table-bordered shadow border border-dark" id="cert_table">
            <thead>
              <tr>
                <td class="border border-dark">transaction ID</td>
                <td class="border border-dark">Name</td>
                <td class="border border-dark">Address</td>
                <td class="border border-dark">Stall No.</td>
                <td class="border border-dark">Print</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>




    <div id="certmodal" data-backdrop="static" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalPreviewLabel">Certification</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="certform">
            <div class="modal-body">

              <div class="mb-2 form-group" width="80">
                <label>Select type</label>
                <select class="form-control form-control-sm" name="transact[payment_type]" id="location">
                  <option selected value="">Please Select</option>
                  <option value="PDF2fcertification">2f certification</option>
                  <option value="PDFwaterdistrict">Certification for water district</option>
                  <option value="PDFnoownership">Certification for no ownership and operation</option>
                  <option value="PDFqrtest">Test</option>
                </select>
              </div>
              <input type="text" id="transaction_id" name="cert[transaction_id]">
              <input type="text" id="todaynosl" name="cert[todaynosl]">
              <input type="text" id="ornumber" name="cert[ornumber]">
              <input type="text" id="refnum" name="cert[refnum]">
              <input type="text" id="cert" name="cert[cert]">
              <input type="text" id="fname" name="cert[fname]">
              <input type="text" id="mname" name="cert[mname]">
              <input type="text" id="lname" name="cert[lname]">
              <input type="text" id="address" name="cert[address]">
              <input type="text" id="natbus" name="cert[natbus]">
              <input type="text" id="stall" name="cert[stall]">
              <input type="text" id="flrlvl" name="cert[flrlvl]">
              <input type="text" id="sysuser" name="cert[sysuser]" value="<?php echo $this->session->userdata('user_fullname'); ?>">
              <input type="text" id="floor_level" name="cert[floor_level]">
              <input type="text" id="days" name="cert[days]">
              <input type="text" id="month" name="cert[month]">
              <input type="text" id="year" name="cert[year]">
              <input type="text" id="OR" name="cert[OR]">
              <input type="text" id="today" name="cert[today]">
              <input type="text" id="or_number" name="cert[or_number]">
              <input type="text" id="refdate" name="cert[refdate]">
              <input type="text" id="payment_amount" name="cert[payment_amount]">
              <input type="text" id="cert_type" name="cert[cert_type]">
              <iframe id="iframe_preview_formgen" frameborder="0" marginwidth="0" marginheight="0" height="600" width="100%"></iframe>


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" width="50">Remove effectivity</button>
            </div>

        </div>
      </div>
    </div>




  </div>
</div>




</div>
<div class="overlay"></div>
