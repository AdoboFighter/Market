<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn white btn-sm ">
        <img src="<?php echo base_url();?>assets/images/electronicmarketsystem.png" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>




  <!-- pagecontents dito mo lagay  -->

  <div class="container justify-content-center">
    <h5 class="card-header text-center bg-primary text-white bluegrads">System User</h5>
    <br>
    <div class="card m-3 shadow">
      <form name="saveSysUser" id="saveSysUser">
        <div class="row p-3">
          <div class="col-4">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" class="form-control" name="sysUser[firstname]"  required>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label for="">Middle Name</label>
              <input type="text" class="form-control" name="sysUser[middlename]"   required>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label for="">last Name</label>
              <input type="text" class="form-control" name="sysUser[lastname]"   required>
            </div>
          </div>
        </div>

        <div class="row m-5">
          <div class="col">
            <label for="">Username</label>
            <input type="text" class="form-control" name="sysUser[username]"  required>
          </div>

          <div class="col">
            <label>User Level</label>
            <select class="form-control form-control-sm" name="sysUser[user_lvl]"  id="clientselect" required>
              <option selected value="">Please Select</option>
              <option value="0">Admin</option>
              <option value="1">Collecting Officer</option>
              <option value="2">Consolidating Officer</option>
            </select>
          </div>

        </div>

        <div class="row m-5">
          <div class="col">
            <label for="">Position/Title</label>
            <input type="text" class="form-control" name="sysUser[position]" required>
          </div>
        </div>


        <div class="row m-5">
          <div class="col">
            <label for="">Password</label>
            <input type="password" class="form-control" name="sysUser[password]" id="pass1" required>
          </div>
        </div>

        <div class="row m-5">
          <div class="col">
            <label for="">Confirm Password</label>

            <input type="password" class="form-control" name="sysUser[password2]" id="pass2" required="">

          </div>
        </div>

        <div class="row m-5">
          <div class="col">
            <label for="">Address</label>
            <input type="text" class="form-control" name="sysUser[address]" required>
          </div>
        </div>

        <div class="row m-5">
          <div class="col">
            <label for="">Contact Number</label>
            <input type="text" class="form-control" name="sysUser[contact_num]" required>
          </div>
        </div>

        <div class="row m-5">
          <div class="col">
            <button type="submit" name="submit_sysuser" id="submit_sysuser" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
          </div>
        </div>
      </form>


    </div>
    <br>
    <br>

  </div>
</div>
<div class="overlay"></div>
