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
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">Add Violation</h5>

  <div class="container justify-content-center">

    <!-- <div class="card m-3"> -->
    <div class="card-body">
      <form id="violationform">
        <div class="span6" style="float: none; margin: 0 auto;">
          <div class="row">
            <div class="col-12 form-group">
              <table class="table p-2"id="add_vio_tab" >
                <thead>
                  <tr>
                    <td class="font-weight-bold" >No</td>
                    <td class="font-weight-bold" >Name</td>
                    <td class="font-weight-bold" >Stall No.</td>
                    <td class="font-weight-bold" >Address</td>
                    <td class="font-weight-bold" >Occupant</td>
                    <td class="font-weight-bold" >load data</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

            <div class="col-6 form-group">


              <div class="form-group">
                <h5 class="font-weight-bold">Details</h5>
                <label for="">Stall No</label>
                <input type="text" class="form-control" name="" id="stall_num_f">
              </div>

              <div class="form-group">
                <label for="">Stall ID</label>
                <input type="text" class="form-control" name="violation[stall_id_f]" id="stall_id_f">
              </div>

              <div class="form-group">
                <label for="">Owner </label>
                <input type="text" class="form-control" name="violation[name]" id="owner_f">
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="" id="address_f">
              </div>
              <div class="form-group">
                <label for="">Occupant</label>
                <input type="text" class="form-control" name="" id="occu_f">
              </div>
            </div>
            <div class="col-6">
              <div class="p-3">
                <h5 class="font-weight-bold">Violation Details</h5>
                <div class="form-group">
                  <label for="">Date Occured </label>
                  <input type="Date" class="form-control" name="violation[date]">
                </div>

                <div class="form-group">
                  <label for="">Violation Details</label>
                  <textarea class="form-control" rows="3" name="violation[date]"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Violation</button>
                <button type="reset" class="btn btn-secondary bg-dark">Clear</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center">View Violation</h5>
  <div class="card m-3">
    <div class="card-body">
      <form class="p-3" id="saveclient">
        <div class="span6" style="float: none; margin: 0 auto;">
          <div class="row">

            <div class="col form-group">
              <table class="table p-2"id="view_vio_tab" >
                <thead>
                  <tr>

                    <td class="font-weight-bold" >stall No.</td>
                    <td class="font-weight-bold" >Name</td>
                    <td class="font-weight-bold" >Violation</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="col-6">
            <div class="p-3">
            <h5>Violation Details</h5>

            <div class="form-group">
            <label for="">Violation Details</label>
            <textarea class="form-control" rows="5"></textarea>
          </div>

          <button type="submit" class="btn btn-danger">Remove Violation</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div> -->



</div>




</div>
<div class="overlay"></div>
