<html>
<head>
<title>Market System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/simple-sidebar.css">
<script  src=" <?php echo base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

   <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</head>


<style media="screen">


.wrapper {
  display: block;
}

#sidebar {
  min-width: 250px;
  max-width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  /* top layer */
  z-index: 9999;
}

.overlay {
  display: none;
  position: fixed;
  /* full screen */
  width: 100vw;
  height: 100vh;
  /* transparent black */
  background: rgba(0, 0, 0, 0.7);
  /* middle layer, i.e. appears below the sidebar */
  z-index: 998;
  opacity: 0;
  /* animate the transition */
  transition: all 0.5s ease-in-out;
}
/* display .overlay when it has the .active class */
.overlay.active {
  display: block;
  opacity: 1;
}

#dismiss {
  width: 35px;
  height: 35px;
  position: absolute;
  /* top right corner of the sidebar */
  top: 10px;
  right: 10px;
}
</style>
<body>

  <div class="wrapper">
      <!-- Sidebar -->
      <nav id="sidebar">

          <div id="dismiss">
              <i class="fas fa-arrow-left"></i>
          </div>

          <div class="sidebar-header">
              <h3>Bootstrap Sidebar</h3>
          </div>

          <ul class="list-unstyled components">
              <p>Dummy Heading</p>
              <li class="active">
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                      <li>
                          <a href="#">Home 1</a>
                      </li>
                      <li>
                          <a href="#">Home 2</a>
                      </li>
                      <li>
                          <a href="#">Home 3</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#">About</a>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                      <li>
                          <a href="#">Page 1</a>
                      </li>
                      <li>
                          <a href="#">Page 2</a>
                      </li>
                      <li>
                          <a href="#">Page 3</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#">Portfolio</a>
              </li>
              <li>
                  <a href="#">Contact</a>
              </li>
          </ul>
      </nav>

      <!-- Page Content -->
      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                      <i class="fas fa-align-left"></i>
                      <span>Toggle Sidebar</span>
                  </button>
              </div>
          </nav>
      </div>
      <!-- Dark Overlay element -->
      <div class="overlay"></div>
  </div>
