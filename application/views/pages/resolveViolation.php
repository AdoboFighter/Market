<div id="content">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bluegrads">
    <div class="container-fluid ">
      <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm ">
        <img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="40" height="40">
        E-Market
      </button>
    </div>
  </nav>

  <!-- pagecontents dito mo lagay  -->
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center mb-2">Violation List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="violationform" name="violationform">
        <div class="card shadow">
          <div class="row p-3">
            <div class="col-12">
              <table class="table table-striped table-bordered" id="getviolationtable" >
                <thead>
                  <tr>
                    <td class="font-weight-bold" >description</td>
                    <td class="font-weight-bold" >date occurred</td>
                    <td class="font-weight-bold" >status</td>
                    <td class="font-weight-bold" >name</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
        <br>


      </form>
    </div>
  </div>
</div>







<div class="overlay"></div>
