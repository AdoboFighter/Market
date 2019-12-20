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
  <h5 class="card-header text-center bg-primary text-white bluegrads container justify-content-center mb-2">Violation List</h5>
  <div class="container justify-content-center ">
    <div class="card-body">
      <form id="violationform" name="violationform">
        <div class="card shadow">
          <div class="row p-3">
            <div class="col-12">
              <table class="table table-striped table-bordered shadow" id="getviolationtable" >
                <thead>
                  <tr>
                    <td class="border border-dark" >description</td>
                    <td class="border border-dark" >date occurred</td>
                    <td class="border border-dark" >status</td>
                    <td class="border border-dark" >name</td>
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
