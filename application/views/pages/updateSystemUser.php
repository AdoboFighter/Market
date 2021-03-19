<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>


  <h5 class="card-header text-center text-white bluegrads container justify-content-center">User List</h5>
  <br>
  <div class="container justify-content-center">
    <div class="card m-1 shadow">
      <div class="row p-3">
        <div class="col">
          <div class="form-group">
            <label>Search</label>
            <input class="form-control form-control-sm mr-3 w-75" type="text" id="search_cl_f" placeholder="Search (stall#, name, section, etc)"
            aria-label="Search">
            <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
          </div>
        </div>


        <div class="col">
          <div class="form-group">
            <label>Category</label>
            <select class="form-control form-control-sm" id="search_cl_s">
              <option selected value="">Please Select</option>
              <option value="user_id">User ID</option>
              <option value="usr_firstname,' ',usr_middlename,' ',usr_lastname">Name</option>
              <option value="user_type">User Type</option>
              <option value="usr_address">address</option>
              <option value="position">position</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row p-3">
        <div class="col-12">
          <table width="100%" class="table table-striped table-bordered" id="sys_table">
            <thead>
              <tr>
                <td class="border border-dark">User ID</td>
                <td class="border border-dark">name</td>
                <td class="border border-dark">User Level</td>
                <td class="border border-dark">address</td>
                <td class="border border-dark">Position</td>
                <td class="border border-dark">Load</td>
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

          <form id="updateuser">
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
              <input type="input" class="form-control" name="upsys[usr_fn]" id="usr_fn" >
            </div>
            <div class="mb-2 form-group" id="">
              <label>Middile name:</label>
              <input type="input" class="form-control" name="upsys[usr_mn]" id="usr_mn" >
            </div>
            <div class="mb-2 form-group" id="">
              <label>Last name:</label>
              <input type="input" class="form-control" name="upsys[usr_ln]" id="usr_ln" >
            </div>
            <div class="mb-2 form-group" id="">
              <label>Address:</label>
              <input type="input" class="form-control" name="upsys[usr_add]" id="usr_add" >
            </div>
            <div class="mb-2 form-group" id="">
              <label>Contact Number:</label>
              <input type="input" class="form-control" name="upsys[usr_cn]" id="usr_cn" >
            </div>
          </div>
          <br>
          <br>
        </div>
        <div class="col-6 ">
          <div class="card col p-3 shadow">
            <div class="mb-2">
              <label>Username</label>
              <input type="text" class="form-control" name="upsys[usr_un]" id="usr_un">
            </div>



          <div class="mb-2">
            <label>position</label>
            <input type="text" class="form-control" name="upsys[usr_position]" id="usr_position">
          </div>

          <div class="mb-2">
            <label>User Level</label>
            <select class="form-control form-control-sm" name="upsys[user_lvl]" id="user_lvl" >
              <option selected value="">Please Select</option>
              <option value="0">Admin</option>
              <option value="1">Consolidating Officer</option>
              <option value="2">Collecting Officer</option>
            </select>
          </div>

          <div class="">
            <button type="Submit" class="btn btn-primary mt-2">Update</button>
            <button type="button" class="btn btn-primary mt-2" onclick="changepassshow()">Change password</button>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
      </form>




<div class="modal fade" id="changepassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

        <form id="passform">
          <div class="mb-2">
            <!-- <label>Username</label> -->
            <input type="text" class="form-control" name="pass[user_id_change]" id="user_id_change" hidden>
          </div>

          <div class="mb-2">
            <label>Password</label>
            <input type="password" class="form-control" name="pass[password_change]" id="password_change">
          </div>

          <button type="submit" class="btn btn-primary text-white">Confirm</button>
        </form>

    </div>

  </div>
</div>
</div>





<div class="overlay"></div>
