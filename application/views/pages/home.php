
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
<h5 class="card-header text-center  text-white bluegrads">Test cheque</h5>
<div class="card m-3">
  <div id="cheque">
    <div class="mb-2 mt-2 form-group"  id="cheque_amount">
      <label>Cheque Amount</label>
      <input type="text" class="form-control" name="transact[cheque_amount]" id="cheqAmountField" placeholder="0.00" >
    </div>

    <div class="mb-2 form-group" id="cheque_number">
      <label>Cheque number</label>
      <input type="text" class="form-control" name="transact[cheque_number]" id="cheqNumField" placeholder="" >
    </div>

    <div class="mb-2 form-group" id="bank">
      <label>Bank/Branch</label>
      <input type="text" class="form-control" name="transact[bank_branch]" id="bankBranchField" placeholder="" >
    </div>

    <div class="mb-2">
      <button type="button" class="btn btn-secondary bg-dark" id="add_cheque" onclick="">Add Cheque</button>
    </div>

    <div class="mb-2 form-group" >
      <table class="table table-striped table-bordered p-2" id="table_cheque">
        <thead>
          <tr>
            <td> no</td>
            <td>Cheque no</td>
            <td>Cheque Amount</td>
            <td>Bank Branch</td>

          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

</div>
</div>

<div class="overlay"></div>
