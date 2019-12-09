<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>E-Market</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- bootstrap cdn js -->

  <!-- Our Custom CSS -->
  <style>

  /*
  DEMO STYLE
  */



  @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }
  #locationfields {
    display:none;
  }
  html {
    scroll-behavior: smooth;
  }

  #table-wrapper {
    position:relative;
  }
  #table-scroll {
    height:300px;
    overflow:auto;
    margin-top:20px;
  }
  #table-wrapper table {
    width:100%;

  }
  #table-wrapper table * {
    background:yellow;
    color:black;
  }
  #table-wrapper table thead th .text {
    position:absolute;
    top:-20px;
    z-index:2;
    height:20px;
    width:35%;
    border:1px solid red;
  }

}
.divTable{
  display: table;
  width: 100%;
}
.divTableRow {
  display: table-row;
}
.divTableHeading {
  background-color: #EEE;
  display: table-header-group;
}
.divTableCell, .divTableHead {

  display: table-cell;
  padding: 3px 10px;
}
.divTableHeading {
  background-color: #EEE;
  display: table-header-group;
  font-weight: bold;
}
.divTableFoot {
  background-color: #EEE;
  display: table-footer-group;
  font-weight: bold;
}
.divTableBody {
  display: table-row-group;
}



body {
  font-family: 'Poppins', sans-serif;
  background: #fafafa;

}

p {
  font-family: 'Poppins', sans-serif;
  font-size: 1.1em;
  font-weight: 300;
  line-height: 1.7em;
  color: #999;
}

a,
a:hover,
a:focus {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

.navbar {
  padding: 15px 10px;
  background: #fff;
  border: none;
  border-radius: 0;
  margin-bottom: 40px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
  box-shadow: none;
  outline: none !important;
  border: none;
}

.line {
  width: 100%;
  height: 1px;
  border-bottom: 1px dashed #ddd;
  margin: 40px 0;
}
/*
DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
  font-family: 'Poppins', sans-serif;
  background: #fafafa;
}

p {
  font-family: 'Poppins', sans-serif;
  font-size: 1.1em;
  font-weight: 300;
  line-height: 1.7em;
  color: #999;
}

a,
a:hover,
a:focus {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

.navbar {
  padding: 15px 10px;
  background: #fff;
  border: none;
  border-radius: 0;
  margin-bottom: 40px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
  box-shadow: none;
  outline: none !important;
  border: none;
}

.line {
  width: 100%;
  height: 1px;
  border-bottom: 1px dashed #ddd;
  margin: 40px 0;
}

/* ---------------------------------------------------
SIDEBAR STYLE
----------------------------------------------------- */

#sidebar {
  width: 250px;
  position: fixed;
  top: 0;
  left: -250px;
  height: 100vh;
  z-index: 999;
  background: #fff;
  color: #fff;
  transition: all 0.3s;
  overflow-y: scroll;
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

#sidebar.active {
  left: 0;
}

#dismiss {
  width: 35px;
  height: 35px;
  line-height: 35px;
  text-align: center;
  background: #fff;
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}

#dismiss:hover {
  background: #fff;
  color: #fff;
}

.overlay {
  display: none;
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  z-index: 998;
  opacity: 0;
  transition: all 0.5s ease-in-out;
}
.overlay.active {
  display: block;
  opacity: 1;
}

#sidebar .sidebar-header {
  padding: 20px;
  /* background: #2F80ED; */
}

#sidebar ul.components {
  padding: 20px 0;
  background: #fff;
}

#sidebar ul p {
  color: #000;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 1.1em;
  display: block;
}

#sidebar ul li a:hover {
  background-color: #045de9;
  background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
  color: #000;
  background: #fff;
}

a[data-toggle="collapse"] {
  position: relative;
}

.dropdown-toggle::after {
  display: block;
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
}

ul ul a {
  font-size: 0.9em !important;
  padding-left: 30px !important;
  background: #fff;
}

ul.CTAs {
  padding: 20px;
}

ul.CTAs a {
  text-align: center;
  font-size: 0.9em !important;
  display: block;
  border-radius: 5px;
  margin-bottom: 5px;
}

a.download {
  background: #fff;
  color: #7386D5;
}

a.article,
a.article:hover {
  background: #6d7fcc !important;
  color: #fff !important;
}

/* ---------------------------------------------------
CONTENT STYLE
----------------------------------------------------- */

#content {
  width: 100%;
  min-height: 100vh;
  transition: all 0.3s;
  position: absolute;
  top: 0;
  right: 0;
  background-color: #d9d9d9;
  background-image: linear-gradient(315deg, #d9d9d9 0%, #f6f2f2 74%);

}
.bluegrads{
  background-color: #045de9;
  background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);
}

.cardbg{
  background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);
}

.secondaryCard{
  background-image: linear-gradient(to right, #d7d2cc 0%, #304352 100%);
}

.marqueeTest {
  font-size: 5em;
}

.whitegrad{
  background-color: #f6f6f6;
  background-image: linear-gradient(315deg, #f6f6f6 0%, #e9e9e9 74%);
}

.zucc{
  background-color: #d9d9d9;
  background-image: linear-gradient(315deg, #d9d9d9 0%, #f6f2f2 74%);
}


.myButton {
  box-shadow:inset 0px 1px 0px 0px #bee2f9;
  background-color:transparent;
  border:4px solid #3866a3;
  display:inline-block;
  cursor:pointer;
  color:#14396a;
  font-family:Arial;
  font-size:40px;
  font-weight:bold;
  padding:32px 76px;
  text-decoration:none;
  text-shadow:0px 1px 0px #7cacde;
  height: 200px;
  width: 400px;
}
.myButton:hover {
  background-color:transparent;
}
.myButton:active {
  position:relative;
  top:1px;
}

.blackgrad{
  background-color: #29539b;
  background-image: linear-gradient(315deg, #29539b 0%, #1e3b70 74%);
}
#my_centered_buttons { display: flex; justify-content: center; }

/* @media (min-width: 768px) {
.modal-xl {
width: 90%;
max-width:1200px;
}
}
*/





</style>

<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">

      <!-- <div id="dismiss">
      <i class="fas fa-arrow-left"></i>
    </div> -->

    <div class="sidebar-header bg-white">
      <h3 class="text-dark"><img src="<?php echo base_url();?>assets/images/LOGOSANPABLO.jpg" width="60" height="60"> E-Market</h3>
    </div>

    <ul class="list-unstyled components text-dark">
      <p class="">System User: <?php echo $this->session->userdata('user_fullname');?></p>

      <li class="">
        <a href="#homeSubmenu" data-toggle="collapse" class="dropdown-toggle">Add Client</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            <a href="<?php echo base_url().'pages/view/addclient' ?>">Tenant</a>
          </li>
          <li>
            <a href="<?php echo base_url().'pages/view/addAmbClient' ?>">Ambulant</a>
          </li>
          <li>
            <a href="<?php echo base_url().'pages/view/addDeliveryClient' ?>">delivery</a>
          </li>
          <li>
            <a href="<?php echo base_url().'pages/view/addParkingclient' ?>">parking</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?php echo base_url().'pages/view/violationSelect' ?>">Violation</a>
      </li>

      <li>
        <a href="<?php echo base_url().'pages/view/paymentSelect' ?>">Payment</a>
      </li>



      <!-- <li>
      <a href="<?php echo base_url().'pages/view/nonStallPayment' ?>">non stall Payment</a>
    </li> -->

    <li>
      <a href="<?php echo base_url().'pages/view/certification' ?>">Certification</a>
    </li>
    <li>
      <a href="<?php echo base_url().'pages/view/marketFloor' ?>">Market Floor</a>
    </li>

    <li>
      <a href="<?php echo base_url().'pages/view/consolidation' ?>">Consolidation</a>
    </li>


    <li>
      <a href="<?php echo base_url().'pages/view/viewTransactions' ?>">View Transaction</a>
    </li>

    <li>
      <a href="<?php echo base_url().'pages/view/clientInfoSelect' ?>">Client Information</a>
    </li>

    <li>
      <a href="<?php echo base_url().'pages/view/selectSystemUser' ?>">Add System User</a>
    </li>
    <!-- change design -->
    <li>
      <a href="<?php echo base_url().'pages/logout_acc' ?>">Log out</a>
    </li>
  </ul>
</nav>
