<html>
<head>
<title>Market System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<body>

</head>
<body>

  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
      <button class="w3-bar-item w3-button w3-large"
      onclick="w3_close()"> E Market System</button>
    <a href="<?php echo base_url(); ?>" class="w3-bar-item w3-button">System User: </a>
    <a href="<?php echo base_url(); ?>addclient" class="w3-bar-item w3-button">Add Client</a>
    <a href="<?php echo base_url(); ?>addViolation" class="w3-bar-item w3-button">Add Violation</a>
    <a href="<?php echo base_url(); ?>payment" class="w3-bar-item w3-button">Payment</a>
    <a href="<?php echo base_url(); ?>certification" class="w3-bar-item w3-button">Certification</a>
    <a href="<?php echo base_url(); ?>marketFloor" class="w3-bar-item w3-button">Market Floor</a>
    <a href="<?php echo base_url(); ?>consolidation" class="w3-bar-item w3-button">Consolidation</a>
    <a href="<?php echo base_url(); ?>viewViolation" class="w3-bar-item w3-button">View Violation</a>
    <a href="<?php echo base_url(); ?>viewTransactions" class="w3-bar-item w3-button">View Transaction</a>
    <a href="<?php echo base_url(); ?>clientInformation" class="w3-bar-item w3-button">Client Information</a>
    <a href="<?php echo base_url(); ?>addNewSystemUser" class="w3-bar-item w3-button">Add System User</a>
  </div>

  <div id="main">
  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
    </div>
  </div>

  </div>


  <script>
  function w3_open() {
    document.getElementById("main").style.marginLeft = "25%";
    document.getElementById("mySidebar").style.width = "25%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
  }
  function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
  }
  </script>
