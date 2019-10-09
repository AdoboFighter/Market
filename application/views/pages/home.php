
   <!-- Page Content  -->
   <div id="content">

     <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
         <div class="container-fluid bluegrads">
             <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
               <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
               E-Market
             </button>
         </div>
     </nav>



<!-- pagecontents dito mo lagay  -->
<h5 class="card-header text-center  text-white bluegrads">Test Debt</h5>
<div class="card m-3">
  <div class="">
    <div class="row p-3">
      <div class="col-6">
        <table class="table table-striped table-bordered" id="tableNoStall">
          <thead>
            <tr>
              <td>no</td>
              <td>name</td>
              <td>address</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="mb-2">
          <h5>Details</h5>
        </div>
        <div class="mb-2">
          <label>Client Name</label>
          <input type="text" class="form-control" name="" id="ownerField" disabled>
        </div>
        <div class="mb-2">
          <label>Address</label>
          <input type="text" class="form-control" name="" id="addressField" disabled>
        </div>
        <div class="mb-2">
          <label>Area(sqm)</label>
          <input type="text" class="form-control" name="" id="areaField" disabled>
        </div>

        <div class="mb-2">
          <label>Daily fee</label>
          <input type="text" class="form-control" name="" id="daily_fee_field" disabled>
        </div>

        <div class="mb-2">
          <label>Debt</label>
          <input type="text" class="form-control" name="" id="debt_field" disabled readonly>
        </div>
        <div class="mb-2">
          <label>Last Payment Activity</label>
          <input type="timestamp_end" class="form-control" name="" id="last_pay" disabled readonly>
        </div>


        <div class="mb-2">
          <button type="" class="btn btn-secondary bg-dark" id="activatebtn" onclick="diffdates();">Calculate debt</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="overlay"></div>
