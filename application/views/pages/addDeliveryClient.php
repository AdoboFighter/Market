<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">Add Delivery Unit</h5>
    <br>
    <div class="card m-2 shadow">
      <div class="container">
        <form class="p-3" id="saveDelivery">
          <div class="row">
            <div class="col-12">
              <div class="span6" style="float: none; margin: 0 auto;">
                <div class="p-3">
                  <div class="form-group">
                    <label for="">Company/Driver's Name</label>
                    <input type="text" class="form-control" name="customer[Owner_Firstname]"   required>
                  </div>
                  <div class="form-group">
                    <label for="">Plate Number</label>
                    <input type="text" class="form-control" name="customer[plate_no]"  required>
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="customer[Owner_Contact_Num]"  required>
                  </div>
                  <div class="text-right">
                    <button type="reset" class="btn stylish-color-dark text-white btn-center" onclick="clear();">Clear</button>
                    <button type="submit" name="submit_client" id="submit_client" class="btn btn-primary">Submit</button>

                </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- Dark Overlay element -->

<div class="overlay"></div>
