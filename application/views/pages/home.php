<div id="content">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn  btn-md ">
        <i class="fas fa-bars fa-2x" style="color: #f5f5f5;"></i>
      </button>
    </div>
  </nav>


  <div class="container my-1 py-1">

    <!-- Section: Block Content -->
    <section class="">

      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">



          <!-- Admin card -->
          <div id="userclick">
            <div class="card mt-3">

              <div class="">
                <i class="fas fa-user-alt fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                <div class="float-right text-left p-3">
                  <p class="text-uppercase text-muted mb-1"><small>User:</small></p>
                  <h4 class="font-weight-bold mb-0"><?php echo $this->session->userdata('user_fullname'); ?></h4>
                </div>
              </div>

              <div class="card-body pt-0">
                <!-- <div class="progress md-progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100"></div>
              </div>
              <p class="card-text">Better than last week (75%)</p> -->
            </div>

          </div>
        </div>
        <br>

        <!-- Admin card -->
        <div id="reloaddb">
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-redo-alt fa-lg success-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-left p-3">
                <h4 class="font-weight-bold mb-0">Reload</h4>
              </div>
            </div>

            <div class="card-body pt-0">
              <!-- <div class="progress md-progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
              aria-valuemax="100"></div>
            </div>
            <p class="card-text">Better than last week (75%)</p> -->
          </div>

        </div>
      </div>
      <br>



        <!-- Admin card -->
        <div class="row">
       <div class="col-md">
         <!-- Admin card -->
         <div id="ORcancelclick">
           <div class="card mt-3">

             <div class="">
               <i class="fas fa-ban fa-lg red z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
               <div class="float-right text-right p-3">
                 <!-- <p class="text-uppercase text-muted mb-1"><small>Cancel OR</small></p> -->
                 <h4 class="font-weight-bold mb-0">Cancel OR</h4>
               </div>
             </div>

             <div class="card-body pt-0">
               <!-- <div class="progress md-progress">
               <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
               aria-valuemax="100"></div>
             </div>
             <p class="card-text">Worse than last week (46%)</p> -->
           </div>

         </div>
       </div>

       </div>

       <div class="col-md">

         <div id="notesclick">
           <div class="card mt-3">
             <!-- <i class="fas fa-sticky-note"></i> -->
             <div class="">
               <i class="fas fa-sticky-note fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
               <div class="float-right text-right p-3">
                 <!-- <p class="text-uppercase text-muted mb-1"><small>Notes</small></p> -->
                 <h4 class="font-weight-bold mb-0">Notes</h4>
               </div>
             </div>

             <div class="card-body pt-0">
               <!-- <div class="progress md-progress">
               <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
               aria-valuemax="100"></div>
             </div>
             <p class="card-text">Better than last week (75%)</p> -->
           </div>

         </div>
       </div>

       </div>

     </div>
     <br>




  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-lg-4 col-md-6 mb-4">

    <!-- Admin card -->
    <div id="dateclick">
      <div class="card mt-3">

        <div class="">
          <i class="far fa-calendar-alt fa-lg teal z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
          <div class="float-right text-right p-3">
            <p class="text-uppercase text-muted mb-1"><small>Date</small></p>
            <h4 class="font-weight-bold mb-0" id="dateToday"></h4>
          </div>
        </div>

        <div class="card-body pt-0">
          <!-- <div class="progress md-progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
          aria-valuemax="100"></div>
        </div>
        <p class="card-text">Worse than last week (46%)</p> -->
      </div>

    </div>
  </div>
  <!-- Admin card -->
  <br>

  <!-- Admin card -->
  <div id="regambuclick">
    <div class="card mt-3">

      <div class="">
        <i class="fas fa-walking fa-lg brown z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
        <div class="float-right text-right p-3">
          <p class="text-uppercase text-muted mb-1"><small>Registered Ambulants</small></p>
          <h4 class="font-weight-bold mb-0" id="numambu"></h4>
        </div>
      </div>

      <div class="card-body pt-0">
        <!-- <div class="progress md-progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
        aria-valuemax="100"></div>
      </div>
      <p class="card-text">Worse than last week (46%)</p> -->
    </div>

  </div>
</div>

<!-- Admin card -->
<br>
<!-- Admin card -->
<div id="violationclick">
  <div class="card mt-3">

    <div class="">
      <i class="fas fa-ban fa-lg red z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase text-muted mb-1"><small>Violations</small></p>
        <h4 class="font-weight-bold mb-0" id="numvio"></h4>
      </div>
    </div>

    <div class="card-body pt-0">
      <!-- <div class="progress md-progress">
      <div class="progress-bar bg-danger" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0"
      aria-valuemax="100"></div>
    </div>
    <p class="card-text">Worse than last week (46%)</p> -->
  </div>

</div>
</div>

<!-- Admin card -->

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-4 col-md-6 mb-4">

  <!-- Admin card -->
  <div id="stallspaidclick">
    <div class="card mt-3">

      <div class="">
        <i class="fas fa-store fa-lg purple z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
        <div class="float-right text-right p-3">
          <p class="text-uppercase text-muted mb-1"><small>Stalls paid</small></p>
          <h4 class="font-weight-bold mb-0" id="stallspaid"></h4>
        </div>
      </div>

      <div class="card-body pt-0">
        <!-- <div class="progress md-progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="31" aria-valuemin="0"
        aria-valuemax="100"></div>
      </div>
      <p class="card-text">Better than last week (31%)</p> -->
    </div>

  </div>
</div>
<!-- Admin card -->
<br>
<!-- Admin card -->
<div id="transtodayclick">
  <div class="card mt-3">

    <div class="">
      <i class="fas fa-cash-register fa-lg blue z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase text-muted mb-1"><small>Transactions Today</small></p>
        <h4 class="font-weight-bold mb-0" id="numoftrans"></h4>
      </div>
    </div>

    <div class="card-body pt-0">

    </div>
  </div>
</div>


<!-- Admin card -->
<br>
<!-- Admin card -->
<div id="debtclick">
  <div class="card mt-3">

    <div>
      <i class="fas fa-money-bill-alt fa-lg green z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase text-muted mb-1"><small>Users with debt</small></p>
        <h4 class="font-weight-bold mb-0" id="debtstat"></h4>
      </div>
    </div>


    <div class="card-body pt-0">

    </div>

  </div>
</div>

<!-- Admin card -->

</div>
<!--Grid column-->
</div>
<!--Grid row-->

</section>
<!--Section: Content-->


</div>

<!-- Dark Overlay element -->
</div>
<div class="overlay"></div>


<div id="userdetailsmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">System User</h5>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="mb-2">
          <label>System User</label>
          <input type="text" class="form-control"  value="<?php echo $this->session->userdata('user_fullname'); ?>"readonly>
        </div>

        <div class="mb-2">
          <label>Username</label>
          <input type="text" class="form-control"  value="<?php echo $this->session->userdata('username'); ?>"readonly>
        </div>

        <div class="mb-2">
          <label>Position</label>
          <input type="text" class="form-control"  value="<?php echo $this->session->userdata('position'); ?>"readonly>
        </div>

        <div class="mb-2">
          <label>User Level</label>
          <input type="text" class="form-control"  value="<?php echo $this->session->userdata('user_type'); ?>"readonly>
        </div>

      </div>

    </div>
  </div>
</div>

<div id="regambuclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Registered Ambulants</h5>
        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="ambulantreload();">
          <i class="fas fa-redo"></i>
        </a>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table width="100%" class="table table-striped table-bordered shadow" id="ambutablehome">
          <thead>
            <tr>
              <td class="border border-dark">Customer ID</td>
              <td class="border border-dark">Full Name</td>
              <td class="border border-dark">Location</td>
              <td class="border border-dark">Location Number</td>
              <td class="border border-dark">Nature of business</td>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<div id="violationclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Violations</h5>
        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="violationreload();">
          <i class="fas fa-redo"></i>
        </a>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <table width="100%" class="table table-striped table-bordered" id="getviolationtable">
          <thead>
            <tr>
              <td class="border border-dark">Customer ID</td>
              <td class="border border-dark">description</td>
              <td class="border border-dark">date occurred</td>
              <td class="border border-dark">status</td>
              <td class="border border-dark">name</td>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>


      </div>

    </div>
  </div>
</div>

<div id="stallspaidclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Paid Stalls</h5>
        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="paidstallsreload();">
          <i class="fas fa-redo"></i>
        </a>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table width="100%" class="table table-sm table-bordered text-center" id="stallpaidtable">
          <thead >
            <tr>
              <!-- <td class="border border-dark">Customer ID</td> -->
              <td class="border border-dark">Name</td>
              <td class="border border-dark">Unit No.</td>
              <td class="border border-dark">O.R</td>
              <td class="border border-dark">Amount</td>
              <td class="border border-dark">Payment Type</td>
              <td class="border border-dark">Effectivity</td>
              <td class="border border-dark">Date & Time</td>
            </tr>
          </thead>

          <tbody id="tbodyParticulars"></tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<div id="transtodayclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Transactions Today</h5>
        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="transactionsreload();">
          <i class="fas fa-redo"></i>
        </a>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table width="100%" class="table table-sm table-bordered text-center" id="transtodaytable">
          <thead >
            <tr>
              <!-- <td class="border border-dark">Customer ID</td> -->
              <td class="border border-dark">Name</td>
              <td class="border border-dark">O.R</td>
              <td class="border border-dark">Amount</td>
              <td class="border border-dark">Payment Type</td>
              <td class="border border-dark">Effectivity</td>
              <td class="border border-dark">Date & Time</td>
              <td class="border border-dark">Cancel Status</td>
            </tr>
          </thead>

          <tbody id="tbodyParticulars"></tbody>
        </table>

      </div>

    </div>
  </div>
</div>




<div id="debtclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <br>
        <h5 class="modal-title" id="exampleModalPreviewLabel">Market fee status</h5>
        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="debttablereload();">
          <i class="fas fa-redo"></i>
        </a>

        <button type="button " class="close"  id="" data-dismiss="modal" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table width="100%" class="table table-sm table-bordered text-center" id="debttable">
          <thead >
            <tr>
              <td class="border border-dark">Name</td>
              <td class="border border-dark">Stall Number</td>
              <td class="border border-dark">O.R</td>
              <td class="border border-dark">Amount</td>
              <td class="border border-dark">Payment Type</td>
              <td class="border border-dark">Effectivity</td>
              <td class="border border-dark">STATUS</td>
              <td class="border border-dark">Pay</td>
            </tr>
          </thead>

          <tbody id="tbodyParticulars"></tbody>
        </table>

      </div>

    </div>
  </div>
</div>


<div id="notesclickmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Notes</h5>

        <a class="btn btn-primary ml-3" style="background-color: #3b5998;" href="#!" role="button" onclick="notesreload();">
          <i class="fas fa-redo"></i>
        </a>

        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <h5>Stall list</h5> -->
        <table width="100%" class="table table-sm table-bordered text-center" id="notestable">
          <thead >
            <tr>
              <td class="border border-dark">ID</td>
              <td class="border border-dark">Name</td>
              <td class="border border-dark">Stall Number</td>
              <td class="border border-dark">View Notes</td>
              <td class="border border-dark">Add new notes</td>
            </tr>
          </thead>

          <tbody id="tbodyParticulars"></tbody>
        </table>

      </div>

    </div>
  </div>
</div>

<div id="notesaddmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notesmodaldynamic"></h5>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="noteaddform">
          <div class="p-2">
            <!-- <h5 class="font-weight-bold">Note Details</h5> -->
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" name="note[title]" id="note_title" required>
            </div>
            <div class="form-group">
              <label for="">Date</label>
              <input type="Date" class="form-control" name="note[date]" id="note_date"required>
            </div>
            <div class="form-group">
              <label for="">Note Details</label>
              <textarea class="form-control" rows="3" name="note[desc]" id="note_desc"required></textarea>
            </div>

            <input type="text" class="form-control" name="note[note_id_fk]" id="note_id_fk" required hidden >
            <input type="text" class="form-control" name="note[note_id]" id="note_id" hidden >

            <button type="submit" class="btn btn-primary">Save</button>
            <!-- <button type="reset" class="btn stylish-color-dark text-white">Clear</button> -->
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div id="notesviewmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="namednote"></h5>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <table width="100%" class="table table-sm table-bordered text-center" id="viewnotestable">
          <thead >
            <tr>
              <!-- <td class="border border-dark">ID</td> -->
              <td width="40%" class="border border-dark">title</td>
              <td class="border border-dark">Date Added</td>
              <td class="border border-dark">View Note</td>
              <td class="border border-dark">Delete</td>
            </tr>
          </thead>

          <tbody id="tbodyParticulars"></tbody>
        </table>


      </div>

    </div>
  </div>
</div>

<div id="ORcancelmodal" class="modal fade right shadow" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true" style="overflow:auto" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Cancel OR</h5>
        <button type="button" class="close"  id="" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="cancelorform">

          <div class="form-group">
            <label for="">OR number</label>
            <input type="text" class="form-control" name="cancel[ORnum_f]" id="ORnum_f"required>
          </div>
          <div class="form-group">
            <label for="">Remarks</label>
            <textarea class="form-control" rows="4" name="cancel[remarks_f]" id="remarks_f"required></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Cancel OR</button>
        </form>

          </div>

        </div>
      </div>
    </div>
