<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark transparentnav noshadnav">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>

      <h1 class="text-center transparentnav noshadnav" id="dateToday"></h1>

    </div>
  </nav>


  <!-- pagecontents dito mo lagay  -->

  <div class="container content-center ">



    <div class="card transparentnav noshadnav" >
      <div class="row">
        <div class="col-3">
          <h2>FLOOR 1</h2>
          <br>
          <div class="row">
            <div class="col-4">
              <i class="fas fa-walking fa-4x  blue-text"></i>
            </div>
            <div class="col">
              <h5>Registered Ambulants:<h5 id="numambu" class="text-success"></h5></h5>
            </div>
          </div>
          <br>
          <br>

          <div class="row">
            <div class="col-4">
              <i class="fas fa-store fa-4x blue-text"></i>
            </div>
            <div class="col">
              <h5>Registered Tenants:<h5 id="numstall" class="text-success"></h5></h5>

            </div>
          </div>
          <br>
          <br>

          <div class="row">
            <div class="col-4">
              <i class="fas fa-hand-holding-usd fa-4x blue-text"></i>
            </div>
            <div class="col">
              <h5>Transactions:<h5 id="numAllTrans" class="text-success"></h5> </h5>
            </div>
          </div>


        </div>

        <div class="col-9">
          <div id="map" style=" height: 500px;" class="shadow">
          </div>
        </div>
      </div>
    </div>

  </div>




</div>

<div class="modal  fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="stallhead"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="getStallfloorsubmit">

        <table class="table p-2 table-hover table-bordered shadow border border-dark" id="stall_floor_info" >
          <thead>
            <tr>
              <td class="border border-dark" >Registered Stall #</td>
              <td class="border border-dark" >Name</td>
              <td class="border border-dark" >Payment</td>
              <td class="border border-dark" >Client Info</td>
            </tr>
          </thead>
          <tbody >
          </tbody>
        </table>

      </form>
    </div>

  </div>
</div>
</div>


<div class="modal  fade" id="client_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="stallhead_pay"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="updatecustomerinfo">
        <div class="container justify-content-center">
          <h5 class="font-weight-bold">Stall Information</h5>
          <div class="row p-3">

            <div class="col-6">
              <div class="form-group">
                <label>Section</label>
                <select class="form-control form-control-sm" name="update[section]" id="Section">
                  <option selected value="">Please Select</option>
                  <option value="Fish">Fish</option>
                  <option value="Meat">Meat</option>
                  <option value="Section1">Section 1</option>
                  <option value="Section2">Section 2</option>
                </select><br>
              </div>
              <div class="form-group" id="floorlevel">
                <label>Floor Level</label>
                <select class="form-control form-control-sm" id="stall_flr_lvl" name="update[floor_level]">
                  <option value=""></option>
                  <option value="Basement">Basement</option>
                  <option value="Ground">Ground Floor</option>
                  <option value="Second">Second Floor</option>
                  <option value="Third">Third Floor</option>
                  <option value="Fourth">Fourth Floor</option>
                </select><br>
              </div>
              <div class=" form-group" id="">
                <label>Business name:</label>
                <input type="input" class="form-control" name="update[business_name]" id="business_name" required>
              </div>
              <div class=" form-group" id="">
                <label>Business ID:</label>
                <input type="input" class="form-control" name="update[business_id]" id="business_id" required>
              </div>
            </div>

            <div class="col-6">
              <div class=" form-group">
                <label>Nature of Business:</label>
                <input type="input" class="form-control" name="update[nature_or_business]" id="nature_or_business" required>
              </div>
              <div class=" form-group">
                <label>Stall No:</label>
                <input type="input" class="form-control" name="update[stall_number]" id="stall_number" required>
              </div>
              <div class=" form-group">
                <label>Area(sqm):</label>
                <input type="input" class="form-control" name="update[area]" id="area" required>
              </div>
              <div class=" form-group">
                <label>Daily Fee:</label>
                <input type="input" class="form-control" name="update[daily_fee]" id="daily_fee" required>
              </div>
            </div>
          </div>

          <br>
          <div class="row mt-2">

            <div class="col-6 ">

              <h5 class="font-weight-bold">Owner's Information</h5>
              <input type="hidden" id = "customer_id" name = "update[customer_id]">
              <input type="hidden" id = "stall_id" name = "update[stall_id]">
              <div class="mb-2 form-group" id="">
                <label>First name:</label>
                <input type="input" class="form-control" name="update[owner_fn]" id="owner_fn" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Middile name:</label>
                <input type="input" class="form-control" name="update[owner_mn]" id="owner_mn" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Last name:</label>
                <input type="input" class="form-control" name="update[owner_ln]" id="owner_ln" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Address:</label>
                <input type="input" class="form-control" name="update[owner_add]" id="owner_add" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Contact Number:</label>
                <input type="input" class="form-control" name="update[owner_cn]" id="owner_cn" required>
              </div>
            </div>




            <div class="col-6 ">

              <h5 class="font-weight-bold">Occupant's Information</h5>
              <div class="mb-2 form-group" id="">
                <label>First name:</label>
                <input type="input" class="form-control" name="update[occu_fn]" id="occu_fn" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Middile name:</label>
                <input type="input" class="form-control" name="update[occu_mn]" id="occu_mn" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Last name:</label>
                <input type="input" class="form-control" name="update[occu_ln]" id="occu_ln" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Address:</label>
                <input type="input" class="form-control" name="update[occu_add]" id="occu_add" required>
              </div>
              <div class="mb-2 form-group" id="">
                <label>Contact Number:</label>
                <input type="input" class="form-control" name="update[occu_cn]" id="occu_cn" required>
              </div>
              <div class="row p-2">
                <div class="p-2">
                  <button class ="btn stylish-color-dark text-white" type="button" id="payhistbtn">Payment History</button>
                </div>
                <div class="p-2">
                  <button class = "btn btn-primary" type="submit">Update</button>
                </div>
              </div>

              <br>
              <br>

              <!-- END OF MODAL -->
            </div>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>
</div>









</div>

<div class="overlay"></div>
