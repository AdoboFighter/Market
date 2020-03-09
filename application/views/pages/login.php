<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>E-Market</title>
	<!-- MDB icon -->
	<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/mdb/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/mdb/css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/mdb/css/style.css">
</head>

<!-- Inline CSS of Log In -->
<style>
   html,
    body {
        font-family: "Poppins", sans-serif;
        z-index: 1;
        overflow-x: hidden;
    }
    .vl{
      border-left: 3px solid #494949;
      height: 500px;
    }
    .spc{
      width: 100%;
      height: auto;
    }

    .headlogin {
      align-items: center;
      text-align: center;
    }

    .login {
      font-size: large;
    }

  #main {
    position: relative;
    z-index: 0;

  }
  #drop {
  position: absolute;
  z-index: 1;

  }

  body{
    width: auto;
    height: auto;
    background-color: white;
  }

  body::after {
      content: "";
      background: url("/assets/images/Telegram.jpg");
      background-repeat: no-repeat;
      opacity: 0.5;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: absolute;
      z-index: -1;
    }
    .spc {
      width: 100%;
      height: auto;
    }
    a {
        color: #92badd;
        display: inline-block;
        text-decoration: none;
        font-weight: 400;
    }

    h2 {
        text-align: center;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
        margin: 40px 8px 10px 8px;
        color: #cccccc;
    }
    /* STRUCTURE */
    .title
    {
      position: absolute;
      margin-left: 15%;
    }
    .wrapper {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        min-height: 70%;
    }

    #formContent {
        -webkit-border-radius: 5px 5px 5px 5px;
        background-color: white;
        width: 90%;
        max-width: 450px;
        position: relative;
        padding: 0px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.8);
        box-shadow: 0 40px 60px 0 rgba(0, 0, 0, 0.5);
        text-align: center;
        z-index: 2;
    }

    #formFooter {
        background-color: #000000;
        border-top: 1px solid #000000;
        padding: 25px;
        text-align: center;
        -webkit-border-radius: 0 0 10px 10px;
        border-radius: 0 0 10px 10px;
    }
    /* TABS */

    h2.inactive {
        color: #cccccc;
    }

    h2.active {
        color: #0d0d0d;
        border-bottom: 2px solid #5fbae9;
    }



    /* ANIMATIONS */
    /* Simple CSS3 Fade-in-down Animation */

    .fadeInDown {
       animation-delay: 2s;
        -webkit-animation-name: fadeInLeft;
        animation-name: fadeInLeft;
        -webkit-animation-duration: 2s;
        animation-duration: 2s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
    @keyframes fadeInLeft {
   0% {
      opacity: 0;
        -webkit-transform: translateX(100%);
   }
   100% {
      opacity: 1;
      transform: translateX(0);
   }
}

    @-webkit-keyframes fadeInDown {
        0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }
    /* Simple CSS3 Fade-in Animation */

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @-moz-keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .fadeIn {
        opacity: 0;
        -webkit-animation: fadeIn ease-in 1;
        -moz-animation: fadeIn ease-in 1;
        animation: fadeIn ease-in 1;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        -webkit-animation-duration: .5s;
        -moz-animation-duration: 1s;
        animation-duration: 1s;
    }

    .fadeIn.first {
        -webkit-animation-delay: 0.4s;
        -moz-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }

    .fadeIn.second {
        -webkit-animation-delay: 0.6s;
        -moz-animation-delay: 0.6s;
        animation-delay: 0.6s;
    }

    .fadeIn.third {
        -webkit-animation-delay: 0.8s;
        -moz-animation-delay: 0.8s;
        animation-delay: 0.8s;
    }

    .fadeIn.fourth {
        -webkit-animation-delay: 1s;
        -moz-animation-delay: 1s;
        animation-delay: 1s;
    }
    /* Simple CSS3 Fade-in Animation */

    .underlineHover:after {
        display: block;
        left: 0;
        bottom: -10px;
        width: 0;
        height: 2px;
        background-color: #56baed;
        content: "";
        transition: width 0.2s;
    }

    .underlineHover:hover {
        color: #0d0d0d;
    }

    .underlineHover:hover:after {
        width: 100%;
    }
    /* OTHERS */

    *:focus {
        outline: none;
    }

    #icon {
        width: 80%;
        height: 12%;
    }
    /* clock */

    p {
        margin: 0;
        padding: 0;
    }

    #clock {
        font-family: 'Share Tech Mono', monospace;
        color: #000000;
        text-align: center;
        position: absolute;
        left: 90%;
        top: 90%;
        transform: translate(-50%, -50%);
        color: #000000;
        /* text-shadow: 0 0 20px rgba(10, 175, 230, 1), 0 0 20px rgba(10, 175, 230, 0); */
    }

    .time {
        letter-spacing: 0.05em;
        font-size: 50px;
        padding: 5px 0;
    }

    .date {
        letter-spacing: 0.1em;
        font-size: 18px;
    }

    .text {
        letter-spacing: 0.1em;
        font-size: 12px;
        padding: 20px 0 0;
    }
</style>
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/global.js"></script>
  <script src="assets/clientjs/login.js"></script>
  <script src="/assets/js/sweetalert2@9.js"></script>
  </head>
	<!-- start log in here -->

	<div id="main" class="container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 p-5 pl-0">
					<img class="spc fadeIn first" src="<?php echo base_url();?>assets/images/SPCLOGO2.png" alt="">
				</div>

				<div class="col-sm-12 col-lg-6 p-5 spcdiv">
					<div class="vl mt-4">
						<h1 class="display-3 fadeIn first pl-0 p-5 title" style="margin-top:8rem;">
							E-Market
						</h1>
						<div id="drop" class="wrapper fadeInDown">
							<div id="formContent">
								<form id="login_account">
									<div class="bg-primary z-depth-1 rounded-top px-5 py-2 headlogin">
                  <div class="row">
                      <div class="col-lg-5"><img class=" fadeIn second" src="<?php echo base_url() . 'assets/images/electronicmarketsystem.png' ?>" height="85px" alt="">
                        </<img>
                      </div>
                      <div class="col-lg-7 text-left">
                        <p class="text-white mt-3 emarket" style="font-size:35px; font-weight:5000">E-MARKET</p>
                      </div>
                    </div>
									</div>
									<div class="container col-10 mb-4 py-3 ">
										<div class="md-form mt-4">
											<input required type="text" id="login" name="login[username]" class="form-control ">
											<label for="login" class=""><i class="fa fa-user fa-lg text-light" aria-hidden="true"></i> Username</label>
										</div>
										<div class="md-form">
											<input required type="password" id="password" name="login[password]" class="form-control ">
											<label for="password" class=""><i class="fa fa-lock fa-lg text-light" aria-hidden="true"></i>
												Password</label>
										</div>
										<div class="">
											<button class="btn btn-rounded btn-primary"
												style=" border-radius: 25px; width: 200px;">
												<p class="text-light login">Login
											</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>



</body>

<script src="/assets/js/jquery-3.2.1.min.js"></script> <!-- Popper.JS -->
<script src="/assets/js/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

<!--  Data Table -->
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . 'assets/global.js' ?> "></script>
<script src="/assets/js/sweetalert2@9.js"></script>
<script src="/assets/clientjs/login.js"></script>

<!-- jQuery -->
<script type="text/javascript" src="/assets/mdb/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/assets/mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/assets/mdb/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/assets/mdb/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

</body>

</html>
