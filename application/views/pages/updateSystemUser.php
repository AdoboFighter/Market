<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

<form id="updateuser" name="updateuser">
  <h5 class="card-header text-center text-white bluegrads container justify-content-center">User List</h5>
  <br>
  <div class="container justify-content-center">
    <div class="card m-1 shadow">
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

    </div>
    <br>
  </div>
  <h5 class="card-header text-center text-white bluegrads container justify-content-center" id="sect2">User Information</h5>
  <br>
  <div class="container justify-content-center">
    <div class="row mt-2">
      <div class="col-6">
        <div class="card col p-3 shadow">
          <div class="mb-2 form-group" id="">
            <label>user ID:</label>
            <input type="input" class="form-control" name="upsys[usr_id]" id="usr_id" readonly>
          </div>

          <div class="mb-2 form-group" id="">
            <label>First name:</label>
            <input type="input" class="form-control" name="upsys[usr_fn]" id="usr_fn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Middile name:</label>
            <input type="input" class="form-control" name="upsys[usr_mn]" id="usr_mn" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Last name:</label>
            <input type="input" class="form-control" name="upsys[usr_ln]" id="usr_ln" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Address:</label>
            <input type="input" class="form-control" name="upsys[usr_add]" id="usr_add" required>
          </div>
          <div class="mb-2 form-group" id="">
            <label>Contact Number:</label>
            <input type="input" class="form-control" name="upsys[usr_cn]" id="usr_cn" required>
          </div>
        </div>
        <br>
        <br>
      </div>
      <div class="col-6 ">
        <div class="card col p-3 shadow">
          <div class="mb-2">
            <label>Username</label>
            <input type="text" class="form-control" name="upsys[usr_un]" id="usr_un"  >
          </div>

          <div class="mb-2">
            <label>Password</label>
            <input type="text" class="form-control" name="upsys[usr_pass]" id="usr_pass"  >
          </div>

          <div class="mb-2">
            <label>position</label>
            <input type="text" class="form-control" name="upsys[usr_position]" id="usr_position"  >
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

          <div class="">
            <button type="Submit"  class="btn btn-primary mt-2">Update</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</form>

<div id="success" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content p-3">
      <h5>System user information updated </h5>
    </div>
  </div>
</div>


<div class="overlay"></div>
