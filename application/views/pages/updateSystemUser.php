<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>


  <h5 class="card-header text-center text-white bluegrads container justify-content-center">User List</h5>
  <div class="container justify-content-center">
    <div class="card m-1">
      <div class="row p-3">
        <div class="col-12">
          <table class="table table-striped table-bordered" id="sys_table">
            <thead>
              <tr>
                <td>User ID</td>
                <td>name</td>
                <td>User Level</td>
                <td>address</td>
                <td>Position</td>
                <td>Load</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row p-3">
      </div>
    </div>
  </div>
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">User Information</h5>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 ">
          <div class="mb-2 form-group" id="">
            <label>user ID:</label>
            <input type="input" class="form-control" name="u" id="usr_id" required>
          </div>

          <div class="mb-2 form-group" id="">
            <label>First name:</label>
            <input type="input" class="form-control" name="upsys[]" id="usr_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="upsys[]" id="usr_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="upsys[]" id="usr_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="upsys[]" id="usr_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="upsys[]" id="usr_cn" required>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card col p-3">
          <div class="mb-2">
            <label>Username</label>
            <input type="text" class="form-control" name="upsys[]" id="usr_un"  >
          </div>

          <div class="mb-2">
            <label>Password</label>
            <input type="text" class="form-control" name="upsys[]" id="usr_pass"  >
          </div>

          <div class="mb-2">
            <label>position</label>
            <input type="text" class="form-control" name="upsys[]" id="usr_position"  >
          </div>

          <div class="mb-2">
            <label>User Level</label>
            <select class="form-control form-control-sm" name="upsys[user_lvl]"  id="user_lvl" required="">
              <option selected value="">Please Select</option>
              <option value="0">Admin</option>
              <option value="1">Collecting Officer</option>
              <option value="2">Consolidating Officer</option>
            </select>
          </div>

          <div class="col">
            <button type="Submit"  class="btn btn-primary mt-2">Update</button>
          </div>


        </div>


      </div>
    </div>
  </div>


</div>

<div class="overlay"></div>
