<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Client's Information</h5>

    <div class="card m-2">
      <div class="container">
        <form class="p-3" id="save_customer">
          <div class="row">
            <div class="col-6">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Firstname]"  id="fname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Middlename]" id="mname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Lastname]" id="lname"required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="customer[Owner_Address]" id="add" required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="customer[Owner_Contact_Num]" id="cont" required>
                  </div>



                </div>
              </div>

            </div>

            <div class="col-6" id="occupantfield">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <h5>Occupant's Information</h5>
                  <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="sameas">
                    <label class="form-check-label">Same as Owner's Information</label>
                  </div>
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="customer[Occu_Firstname]" id="ofname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="customer[Occu_Middlename]" id="omname" required>

                  </div>
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="customer[Occu_Lastname]" id="olname" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="customer[Occu_Address]" id="oadd" required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="customer[Occu_Contact_Num]" id="ocont" required>
                  </div>

                </div>

              </div>
            </div>





            <div class="row">
              <div class="col-6">

              </div>

              <div class="col-6" id="stall_fields2">

              </div>

            </div>

          </form>



        </div>
      </div>
    </div>
  </div>

</div>


<div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content p-3">
      <h5>Client Added</h5>
    </div>
  </div>
</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
