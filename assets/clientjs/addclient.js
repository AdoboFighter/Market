
function clear() {
  document.getElementById("save_customer").reset();
}
function updatefield() {
  var firstnamef  = document.getElementById("fname").value;
  var middlenamef = document.getElementById("mname").value;
  var lastnamef = document.getElementById("lname").value;
  var addressf = document.getElementById("add").value;
  var contactf = document.getElementById("cont").value;

  var ofirstnamef  = document.getElementById("ofname");
  var omiddlenamef = document.getElementById("omname");
  var olastnamef = document.getElementById("olname");
  var oaddressf = document.getElementById("oadd");
  var ocontactf = document.getElementById("ocont");

  document.getElementById("ofname").value = firstnamef;
  document.getElementById("omname").value = middlenamef;
  document.getElementById("olname").value = lastnamef;
  document.getElementById("oadd").value = addressf;
  document.getElementById("ocont").value = contactf;
}


$(document).ready(function(){
  //DYNAMIC SELECT SECTIONS
  //DYNAMIC SELECT SECTIONS
  // $.ajax({
  //   url: global.settings.url +'/MainController/fetch_section',
  //   type:'POST',
  //   success:function(data)
  //   {
  //     console.log(data);
  //     data = JSON.parse(data);
  //
  //     data.forEach(function(e, i){
  //       // $('#user_select').append($('<option><option/>').val(e.user_id).text(e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname));
  //       $('#section_dyna').append(new Option((e.Section), (e.Section)));
  //     });
  //   }
  // });
  //DYNAMIC SELECT SECTIONS
  //DYNAMIC SELECT SECTIONS

  $('#stallf_buss_id').keyup(function(){

    var datereg = $('#stallf_date_reg').val();
    var daterenew = $('#stallf_date_renew').val();
    var bussID = $('#stallf_buss_id').val();
    var bussname = $('#stallf_buss_name').val();

    if ($("#stallf_buss_id").val().replace(/^\s+|\s+$/g, "").length != 0 && $("#stallf_buss_name").val().replace(/^\s+|\s+$/g, "").length != 0 && $('#stallf_date_reg').val() && $('#stallf_date_renew').val()) {
      console.log("not white space");
      $('#stallf_date_ocu').prop("disabled", false);
      $('#stall_flr_lvl').prop("disabled", false);
      $('#section_dyna').prop("disabled", false);
      $('#stallf_num').prop("disabled", false);
      $('#stall_sqr_m').prop("disabled", false);
      $('#stallf_daily_fee').prop("disabled", false);
    }else {
      $('#stallf_date_ocu').prop("disabled", true);
      $('#stall_flr_lvl').prop("disabled", true);
      $('#section_dyna').prop("disabled", true);
      $('#stallf_num').prop("disabled", true);
      $('#stall_sqr_m').prop("disabled", true);
      $('#stallf_daily_fee').prop("disabled", true);

      $('#stallf_date_ocu').val("");
      $('#stall_flr_lvl').val("");
      $('#section_dyna').val("");
      $('#stallf_num').val("");
      $('#stall_sqr_m').val("");
      $('#stallf_daily_fee').val("");

    }

  });

  $('#stallf_date_reg').change(function() {
    var datereg = $('#stallf_date_reg').val();
    var daterenew = $('#stallf_date_renew').val();
    var bussID = $('#stallf_buss_id').val();
    var bussname = $('#stallf_buss_name').val();

    if ($("#stallf_buss_id").val().replace(/^\s+|\s+$/g, "").length != 0 && $("#stallf_buss_name").val().replace(/^\s+|\s+$/g, "").length != 0 && $('#stallf_date_reg').val() && $('#stallf_date_renew').val()) {
      console.log("not white space");
      $('#stallf_date_ocu').prop("disabled", false);
      $('#stall_flr_lvl').prop("disabled", false);
      $('#section_dyna').prop("disabled", false);
      $('#stallf_num').prop("disabled", false);
      $('#stall_sqr_m').prop("disabled", false);
      $('#stallf_daily_fee').prop("disabled", false);
    }else {
      $('#stallf_date_ocu').prop("disabled", true);
      $('#stall_flr_lvl').prop("disabled", true);
      $('#section_dyna').prop("disabled", true);
      $('#stallf_num').prop("disabled", true);
      $('#stall_sqr_m').prop("disabled", true);
      $('#stallf_daily_fee').prop("disabled", true);

      $('#stallf_date_ocu').val("");
      $('#stall_flr_lvl').val("");
      $('#section_dyna').val("");
      $('#stallf_num').val("");
      $('#stall_sqr_m').val("");
      $('#stallf_daily_fee').val("");
    }
  });

  $('#stallf_date_renew').change(function() {
    var datereg = $('#stallf_date_reg').val();
    var daterenew = $('#stallf_date_renew').val();
    var bussID = $('#stallf_buss_id').val();
    var bussname = $('#stallf_buss_name').val();

    if ($("#stallf_buss_id").val().replace(/^\s+|\s+$/g, "").length != 0 && $("#stallf_buss_name").val().replace(/^\s+|\s+$/g, "").length != 0 && $('#stallf_date_reg').val() && $('#stallf_date_renew').val()) {
      console.log("not white space");
      $('#stallf_date_ocu').prop("disabled", false);
      $('#stall_flr_lvl').prop("disabled", false);
      $('#section_dyna').prop("disabled", false);
      $('#stallf_num').prop("disabled", false);
      $('#stall_sqr_m').prop("disabled", false);
      $('#stallf_daily_fee').prop("disabled", false);
    }else {
      $('#stallf_date_ocu').prop("disabled", true);
      $('#stall_flr_lvl').prop("disabled", true);
      $('#section_dyna').prop("disabled", true);
      $('#stallf_num').prop("disabled", true);
      $('#stall_sqr_m').prop("disabled", true);
      $('#stallf_daily_fee').prop("disabled", true);

      $('#stallf_date_ocu').val("");
      $('#stall_flr_lvl').val("");
      $('#section_dyna').val("");
      $('#stallf_num').val("");
      $('#stall_sqr_m').val("");
      $('#stallf_daily_fee').val("");
    }

  });




  $('#stallf_buss_name').keyup(function(){
    var datereg = $('#stallf_date_reg').val();
    var daterenew = $('#stallf_date_renew').val();
    var bussID = $('#stallf_buss_id').val();
    var bussname = $('#stallf_buss_name').val();

    if ($("#stallf_buss_id").val().replace(/^\s+|\s+$/g, "").length != 0 && $("#stallf_buss_name").val().replace(/^\s+|\s+$/g, "").length != 0 && $('#stallf_date_reg').val() && $('#stallf_date_renew').val()) {
      console.log("not white space");
      $('#stallf_date_ocu').prop("disabled", false);
      $('#stall_flr_lvl').prop("disabled", false);
      $('#section_dyna').prop("disabled", false);
      $('#stallf_num').prop("disabled", false);
      $('#stall_sqr_m').prop("disabled", false);
      $('#stallf_daily_fee').prop("disabled", false);
    }else {
      $('#stallf_date_ocu').prop("disabled", true);
      $('#stall_flr_lvl').prop("disabled", true);
      $('#section_dyna').prop("disabled", true);
      $('#stallf_num').prop("disabled", true);
      $('#stall_sqr_m').prop("disabled", true);
      $('#stallf_daily_fee').prop("disabled", true);

      $('#stallf_date_ocu').val("");
      $('#stall_flr_lvl').val("");
      $('#section_dyna').val("");
      $('#stallf_num').val("");
      $('#stall_sqr_m').val("");
      $('#stallf_daily_fee').val("");
    }
  });






  $('#sameas').on('change',function(){
    if( $(this).is(':checked') ){
      updatefield();
    }else{
      $("#fname, #mname, #lname, #add, #cont").unbind("keydown keyup", function() {
        document.getElementById("ofname").onkeyup = null;
      });
      $('#ofname').removeAttr('readonly');
      $('#omname').removeAttr('readonly');
      $('#olname').removeAttr('readonly');
      $('#oadd').removeAttr('readonly');
      $('#ocont').removeAttr('readonly');
      document.getElementById("ofname").onkeyup = null;
      document.getElementById('omname').onkeyup = null;
      document.getElementById('olname').onkeyup = null;
      document.getElementById('oadd').onkeyup = null;
      document.getElementById("ocont").onkeyup = null;

      document.getElementById("ofname").value = "";
      document.getElementById("omname").value = "";
      document.getElementById("olname").value = "";
      document.getElementById("oadd").value = "";
      document.getElementById("ocont").value = "";
    }
  });

  $('#save_customer').submit(function(e){
    e.preventDefault();

    $.ajax({
      url : global.settings.url +'/MainController/save_customer_controller',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
        Swal.fire({
          icon: 'success',
          title: 'Tenant Added'
        });
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});
