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
          <select class="form-control form-control-sm" name="transact[payment_type]" id="client_type">
            <option selected value="">Please Select</option>
            <option value="tenant">Tenant</option>
            <option value="ambulant">Ambulant</option>
          </select>
        </div>
      </div>

      <div class="row p-3">

        <div class="col-12">
          <table width="100%" class="table p-2 table-hover table-bordered shadow border border-dark" id="cert_table">
            <thead>
              <tr>
                <td class="border border-dark">transaction ID</td>
                <td class="border border-dark">Name</td>
                <td class="border border-dark">Address</td>
                <td id="changecolumn" class="border border-dark"></td>
                <td class="border border-dark">Print</td>
                <td class="border border-dark">Remove</td>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>



    <form id="certform">
      <div id="certmodal" data-backdrop="static" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

            <iframe id="iframe_preview_formgen" frameborder="0" marginwidth="0" marginheight="0" height="600" width="100%"></iframe>

            </div>
            <div class="modal-footer">

            </div>

          </div>
        </div>
      </div>
    </form>




  </div>
</div>




</div>
<div class="overlay"></div>






<div id="select_cert" data-backdrop="static" class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="submit" class="btn btn-primary" width="50">Remove effectivity</button> -->
        <h5 class="modal-title" id="exampleModalPreviewLabel">Generate Certification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="basecertform">
        <div class="mb-2 form-group" width="80">
          <label>Select type</label>
          <select class="form-control form-control-sm" name="cert[cert_type_select]" id="cert_type_select1">
            <option selected value="">Please Select</option>
            <option value="cease">Cease of operation</option>
            <option value="transfer">Certificate of transfer</option>
            <option value="operation">Certification of no operation</option>
            <option value="market">Market Certification</option>
          </select>
        </div>

        <input type="text" id="transaction_id" name="">
        <input type="text" id="sysuser" name="cert[sysuser]" value="<?php echo $this->session->userdata('user_fullname'); ?>">
        <input type="text" id="days" name="cert[days]">
        <input type="text" id="month" name="cert[month]">
        <input type="text" id="year" name="cert[year]">
        <input type="text" id="today" name="cert[today]">
        <input type="text" id="refdate" name="cert[refdate]">
        <input type="text" id="cert" name="cert[cert]">
        <input type="text" id="clientfield" name="cert[client]">

        <!-- stall fields -->
        <input type="text" id="stall" name="cert[stall]" placeholder="stall">
        <input type="text" id="flrlvl" name="cert[flrlvl]" placeholder="floor">
        <!-- ambulant fields -->
        <input type="text" id="location" name="cert[location]" placeholder="location">
        <input type="text" id="location_no" name="cert[location_no]" placeholder="location number">




      </form>

        <form id="ceaseform">

          <div class="form-group" id="aftercease">
            <label for="">Ceased operation Since:</label>
            <input type="date" class="form-control" name="cert[ceasedate]"  id="ceasedate" placeholder="mm/dd/yyyy">
          </div>



          <button type="submit" class="btn btn-primary float-right">Generate</button>

        </form>

        <form id="transferform">

          <div class="form-group" >
            <label for="">Transfer to:</label>
            <input type="text" class="form-control" name="cert[transfer_to]"  id="transfer_to">
          </div>

          <div class="form-group" id="aftertransfer">
            <label for="">Affidavit of Transfer of Rights dated:</label>
            <input type="date" class="form-control" name="cert[transfer_date]"  id="transfer_date" placeholder="mm/dd/yyyy">
          </div>

          <button type="submit" class="btn btn-primary float-right">Generate</button>

        </form>

        <form id="marketform">

          <button type="submit" class="btn btn-primary float-right">Generate</button>


        </form>

        <form id="operationform">


          <div class="form-group" id="afteroperation">
            <label for="">Pick date:</label>
            <input type="month" class="form-control" name="cert[operation_date1]"  id="operation_date1">
            <p1>to</p1>
            <input type="month" class="form-control" name="cert[operation_date2]"  id="operation_date2">
          </div>

          <button type="submit" class="btn btn-primary float-right">Generate</button>

        </form>


      </div>

    </div>
  </div>
</div>
