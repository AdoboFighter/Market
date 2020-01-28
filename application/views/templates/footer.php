<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/assets/js/mdb.min.js"></script>

<!-- jQuery Custom Scroller CDN -->
<script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/js/jquery.num2words.js"></script>
<!--  Data Table -->
<script type="text/javascript" src="/assets/js/addons/datatables.min.js"></script>
<script src="/assets/js/sweetalert2@9.js"></script>
<!-- maps -->
<script src="/assets/jmaps/jquery-jvectormap-2.0.3.min.js"></script>
<script src="/assets/jmaps/jquery-jvectormap-world-mill-en.js"></script>
<script src="/assets/jmaps/jquery-jvectormap-us-merc-en.js"></script>
<script src="/assets/jmaps/ground-floor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
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
