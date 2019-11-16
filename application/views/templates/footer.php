<!-- jQuery CDN - Slim version (=without AJAX) -->

<script src="/assets/jquery/jquery.min.js">

</script>

  <script src="/assets/js/jquery-3.2.1.min.js"></script>  <!-- Popper.JS -->
  <script src="/assets/js/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

  <!--  Data Table -->
  <script src="/assets/js/jquery.dataTables.min.js"></script>
  <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/js/sweetalert2@9.js"></script>

  <script type="text/javascript">
       $(document).ready(function () {
           $("#sidebar").mCustomScrollbar({
               theme: "minimal"
           });

           $('#dismiss, .overlay').on('click', function () {
               $('#sidebar').removeClass('active');
               $('.overlay').removeClass('active');
           });

           $('#sidebarCollapse').on('click', function () {
               $('#sidebar').addClass('active');
               $('.overlay').addClass('active');
               $('.collapse.in').toggleClass('in');
               $('a[aria-expanded=true]').attr('aria-expanded', 'false');
           });
       });
   </script>
   <script src="<?php echo base_url().'assets/global.js' ?> "></script>
   <script src="<?php echo base_url().'assets/clientjs/'.$js_file?>"></script>
   <script src="<?php echo base_url().'assets/clientjs/allpayment.js' ?> "></script>
</body>

</html>
