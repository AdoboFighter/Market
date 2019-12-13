<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Certification</h5>
  <br>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="certform">
        <div class="card shadow">
          <div class="row p-3">
            <div class="col-12">
              <table class="table table-striped table-bordered"id="cert_table" >
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


        <div id="violationmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >

        <div id="violationmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >

       
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<div id="certmodal" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >

<div class="modal-dialog modal-xl modal-dialog-centered mw-100 w-75">
    <div class="modal-content p-2">
      <h5>Certification</h5>
      <div class="mb-2 form-group" width="80">
        <label>Type of payment</label>
        <select class="form-control form-control-sm" name="transact[payment_type]" id="location" onchange="setIframeSource()" required>
          <option selected value="">Please Select</option>
          <option value="<?php echo base_url().'pages/view/PDF2fcertification' ?>">2f certification</option>
          <option value="<?php echo base_url().'pages/view/PDFnoonwership' ?>">Certification for water district</option>
          <option value="<?php echo base_url().'pages/view/PDFwaterdistrict' ?>">Certification for no ownership and operation</option>
        </select>
      </div>


      <iframe id="myIframe" src="<?php echo base_url().'pages/view/PDF2fcertification' ?>" frameborder="0" marginwidth="0" marginheight="0"  height="600"></iframe>
       <input type="hidden" id="fname" name="cert[fname]" >
       <input type="hidden" id="mname" name="cert[mname]" >
       <input type="hidden" id="lname" name="cert[lname]" >
       <input type="hidden" id="address" name="cert[address]">

      <!-- <iframe id="myIframe" src="<?php echo base_url().'pages/view/PDF2fcertification' ?>" frameborder="0" marginwidth="0" marginheight="0"  height="600"></iframe>

      <iframe id="iframe_preview_formgen"  frameborder="0" marginwidth="0" marginheight="0"  height="600"></iframe> -->



      <br>
      <div>
        <button type="submit" class="btn btn-primary" width="50" >Print & Save</button>
      </div>


    </div>

</div>
<div class="overlay"></div>
