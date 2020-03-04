<html>

<head>
  <title>E-market</title>
  <style>
    /* BASIC */

    body {
      font-family: "Poppins", sans-serif;
      z-index: 1;
      overflow-x: hidden;
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

    .headlogin {
      align-items: center;
      text-align: center;
    }

    .login {
      font-size: large;
    }

    .emarket {
      font-size: 35px;
      text-align: left;
      font-weight: 500;
    }

    .vl {
      border-left: 3px solid #428bca;
      height: 500px;
    }

    .spc {
      width: 100%;
      height: auto;
    }

    #main {
      position: relative;
      z-index: 0;
    }

    #drop {
      position: absolute;
    }

    /* STRUCTURE */
    .title {
      position: absolute;
      align-items: center;
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

    .fadeInLeft {
      animation-delay: 1.5s;
      -webkit-animation-name: fadeInLeft;
      animation-name: fadeInLeft;
      -webkit-animation-duration: 1.5s;
      animation-duration: 1.5s;
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
      -webkit-animation-duration: 0.5s;
      -moz-animation-duration: 0.5s;
      animation-duration: 0.5s;
    }

    .fadeIn.first {
      -webkit-animation-delay: 1s;
      -moz-animation-delay: 1s;
      animation-delay: 1s;
    }
  </style>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/global.js"></script>
  <script src="assets/clientjs/login.js"></script>
  <script src="/assets/js/sweetalert2@9.js"></script>


</head>

<body>
  <div id="main" class="container">
    <div class="container">
      <div class="row mt-5">
        <div class="col-lg-6 spcdiv">
          <img class="fadeIn first pl-0 p-5 spc" src="/assets/images/SPCLOGO2.png" alt="">
        </div>

        <div class="col-lg-6 mt-4">
          <div class="vl mt-3">
            <div id="drop" class="wrapper fadeInLeft mt-5">
              <div id="formContent">
                <form id="login_account">
                  <div class="bg-primary z-depth-1 rounded-top px-5 py-2 headlogin">
                    <div class="row">
                      <div class="col-lg-5"><img class=" fadeIn second" src="<?php echo base_url() . 'assets/images/electronicmarketsystem.png' ?>" height="85px" alt="">
                        </<img>
                      </div>
                      <div class="col-lg-7">
                        <p class="text-white mt-3 emarket">E-MARKET</p>
                      </div>
                    </div>
                  </div>
                  <div class="container col-lg-10 mb-4 py-3">
                    <div class="md-form mt-4 mb-4">
                      <input required type="text" id="login" name="login[username]" class="form-control" placeholder="Username">
                    </div>
                    <div class="md-form mb-3">
                      <input required type="password" id="password" name="login[password]" class="form-control" placeholder="Password">
                    </div>
                    <div class="">
                      <button class="btn btn-rounded btn-primary " style=" border-radius: 25px; width: 200px; height:3rem">
                        <p class="text-light login">Login</p>
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



  <!-- <div class="bluegrads">
    <div class="wrapper ">
      <div id="formContent">
        <div class="">
          <h3 class="p-3"><img src="<?php echo base_url(); ?>assets/images/electronicmarketsystem.png" width="50" height="50" class="p-1">E-market</h3>
        </div>
        <form id="login_account">
          <input type="text" id="login" class=" " name="login[username]" placeholder="login">
          <input type="password" id="password" class=" " name="login[password]" placeholder="password">
          <input type="submit" class="  bgrad" value="Log In">
        </form>
      </div>
      </form> -->

  </div>
  </div>

  </div>
</body>
<script src="/assets/js/jquery-3.2.1.min.js"></script> <!-- Popper.JS -->
<script src="/assets/js/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="/assets/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--  Data Table -->
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . 'assets/global.js' ?> "></script>
<script src="/assets/js/sweetalert2@9.js"></script>
<script src="/assets/clientjs/login.js"></script>

</html>