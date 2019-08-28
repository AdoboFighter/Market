<div id="content">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
            <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
            E-Market
          </button>
      </div>
  </nav>


<!-- pagecontents dito mo lagay  -->

<div class="container justify-content-center">
  <div class="card">
    <h5 class="card-header text-center bg-primary text-white ">Add Violation</h5>

  <div class="card-body">
  <form class="p-3" id="saveclient">
    <div class="span6" style="float: none; margin: 0 auto;">
        <div class="row">

          <div class="col-6 form-group">
            <div class="form-group">
              <label for="">Search</label>
              <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
           
            </div>

            <div id="result"></div>



             <div class="form-group">
               <h5 class="font-weight-bold">Details</h5>
               <label for="">Stall No</label>
               <input type="text" class="form-control" name="client[Buss_Name]">
             </div>

             <div class="form-group">
               <label for="">Owner </label>
               <input type="text" class="form-control" name="client[Buss_Name]">
             </div>

             <div class="form-group">
               <label for="">Address</label>
               <input type="text" class="form-control" name="client[Buss_Name]">
             </div>

             <div class="form-group">
               <label for="">Occupant</label>
               <input type="text" class="form-control" name="client[Buss_Name]">
             </div>

           </div>

           <div class="col-6">
            <div class="p-3">
              <h5 class="font-weight-bold">Violation Details</h5>
              <div class="form-group">
                <label for="">Date Occured </label>
                <input type="Date" class="form-control" name="client[OcFirstname]">
              </div>

              <div class="form-group">
                  <label for="">Violation Details</label>
                  <textarea class="form-control" rows="3"></textarea>
              </div>

                <button type="submit" class="btn btn-primary">Add Violation</button>
                <button type="submit" class="btn btn-secondary">View Violation</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
            </div>





      </div>
      </div>







  </form>
  </div>





</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center bg-primary text-white">View Violation</h5>

<div class="card-body">
<form class="p-3" id="saveclient">
  <div class="span6" style="float: none; margin: 0 auto;">
      <div class="row">

        <div class="col-6 form-group">
          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="form-control" name="">
          </div>

          <table class="table p-2" >
            <thead>
             <tr>
               <td class="font-weight-bold" >No</td>
               <td class="font-weight-bold" >Name</td>
               <td class="font-weight-bold" >Address</td>
               <td class="font-weight-bold" >Stall No.</td>
             </tr>
           </thead>

             <tr>
               <td>-</td>
               <td>-</td>
               <td>-</td>
               <td>-</td>
             </tr>
             <tr>
               <td>-</td>
               <td>-</td>
               <td>-</td>
               <td>-</td>
             </tr>
             <tr>
               <td>-</td>
               <td>-</td>
               <td>-</td>
               <td>-</td>
             </tr>
             <tr>
               <td>-</td>
               <td>-</td>
               <td>-</td>
               <td>-</td>
             </tr>
             <tr>
               <td>-</td>
               <td>-</td>
               <td>-</td>
               <td>-</td>
             </tr>
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







</form>
</div>





</div>

</div>




</div>
    <div class="overlay"></div>
