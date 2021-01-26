var datable;
var fullDate = new Date();
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
const monthNames = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];
const m = new Date();
var month = monthNames[m.getMonth()];
var d = new Date();
var n = d.getDate();
var year = new Date().getFullYear();

$(document).ready(function(){
  offcert();


  $("#testremove").click(function(){
    console.log('hello');
    $("#ceaseform").toggle();


  });

  $('#client_type').on('change', function(e) {
    $('#iframe_preview_formgen').attr('src', $('iframe_preview_formgen').attr('src'));

    if ($(this).val() == "tenant") {
      console.log("tenant");
      $('#cert_table').DataTable().clear().destroy();
      $('#changecolumn').text("Stall number");
      $('#cert_table').DataTable({
        "autoWidth": false,
        "ajax" : {
          "url" : global.settings.url + '/MainController/getcerttable',
          dataSrc : 'data'
        },
        "columns" : [{
          "data" : "id"
        },
        {
          "data" : "c_info_fullname_owner"
        },
        {
          "data" : "c_info_address"
        },
        {
          "data" : "c_info_stall_number"
        },
        {
          "data" : "btn"
        },
        {
          "data" : "btn2"
        }]
      });
    }else if ($(this).val() == "ambulant") {

      $('#cert_table').DataTable().clear().destroy();
      $('#changecolumn').text("Location");
      $('#cert_table').DataTable({
        "autoWidth": false,
        "ajax" : {
          "url" : global.settings.url + '/MainController/getcerttableAmbulant',
          dataSrc : 'data'
        },
        "columns" : [{
          "data" : "id"
        },
        {
          "data" : "c_info_fullname_owner"
        },
        {
          "data" : "c_info_address"
        },
        {
          "data" : "c_info_stall_number"
        },
        {
          "data" : "btn"
        },
        {
          "data" : "btn2"
        }]
      });
      console.log("ambulant");
    }

  });


  $('.dataTables_length').addClass('bs-select');





  //end of document ready
});


$('#ceaseform').submit(function(e){
  var typeselect = $('#client_type').val();
  var formtype = $("#cert_type_select1").val();
  var stringtest = "#"+formtype+"form";
  console.log(stringtest);

  e.preventDefault();

  var dataString = $('#basecertform, ' + stringtest).serialize();
  $.ajax({
    url : global.settings.url + '/MainController/pdf2fcert',
    type : 'POST',
    data : dataString,
    xhrFields: {
      responseType: 'blob'
    },
    success : function(res){
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(res);
      a.href = url;
      $('#select_cert').modal('toggle')
      $('#iframe_preview_formgen').attr('src',url);
      $('#certmodal').modal('toggle');
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }
  });





});

$('#transferform').submit(function(e){
  var typeselect = $('#client_type').val();
  var formtype = $("#cert_type_select1").val();
  var stringtest = "#"+formtype+"form";
  console.log(stringtest);

  e.preventDefault();

  var dataString = $('#basecertform, ' + stringtest).serialize();
  $.ajax({
    url : global.settings.url + '/MainController/pdftransfer',
    type : 'POST',
    data : dataString,
    xhrFields: {
      responseType: 'blob'
    },
    success : function(res){
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(res);
      a.href = url;
      $('#select_cert').modal('toggle')
      $('#iframe_preview_formgen').attr('src',url);
      $('#certmodal').modal('toggle');
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }
  });





});


$('#operationform').submit(function(e){
  var typeselect = $('#client_type').val();
  var formtype = $("#cert_type_select1").val();
  var stringtest = "#"+formtype+"form";
  console.log(stringtest);

  e.preventDefault();

  var dataString = $('#basecertform, ' + stringtest).serialize();
  $.ajax({
    url : global.settings.url + '/MainController/pdfoperation',
    type : 'POST',
    data : dataString,
    xhrFields: {
      responseType: 'blob'
    },
    success : function(res){
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(res);
      a.href = url;
      $('#select_cert').modal('toggle')
      $('#iframe_preview_formgen').attr('src',url);
      $('#certmodal').modal('toggle');
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }
  });





});

$('#marketform').submit(function(e){
  var typeselect = $('#client_type').val();
  var formtype = $("#cert_type_select1").val();
  var stringtest = "#"+formtype+"form";
  console.log(stringtest);

  e.preventDefault();

  var dataString = $('#basecertform, ' + stringtest).serialize();
  $.ajax({
    url : global.settings.url + '/MainController/pdfmarket',
    type : 'POST',
    data : dataString,
    xhrFields: {
      responseType: 'blob'
    },
    success : function(res){
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(res);
      a.href = url;
      $('#select_cert').modal('toggle')
      $('#iframe_preview_formgen').attr('src',url);
      $('#certmodal').modal('toggle');
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }
  });





});


$('#certform').submit(function(e){
  e.preventDefault();
  $.ajax({
    url: global.settings.url + '/MainController/updatecert',
    type: 'POST',
    data: $(this).serialize(),
    dataType:'JSON',
    success: function(res){
      $('#certmodal').modal("toggle");
      Swal.fire({
        icon: 'success',
        title: 'Certification Effectivity Removed',
      });
      $('#cert_table').DataTable().ajax.reload();
    },
    error:function(res){
      console.log('sala');
    }
  });

});





$('#cert_type_select1').on('change', function(e) {
  $('#iframe_preview_formgen').attr('src', $('iframe_preview_formgen').attr('src'));
  var trans_id = $("#transaction_id").val();

  if ($(this).val() == "cease") {
    $("#ceaseform").toggle();
    $("#transferform").hide();
    $("#operationform").hide();
    $("#marketform").hide();
    genformcease(trans_id);

  }else if ($(this).val() == "transfer") {

    $("#transferform").toggle();
    $("#ceaseform").hide();
    $("#operationform").hide();
    $("#marketform").hide();
    genformtransfer(trans_id);

  }else if ($(this).val() == "operation") {
    $("#operationform").toggle();
    $("#ceaseform").hide();
    $("#transferform").hide();
    $("#marketform").hide();
    genformoperation(trans_id);


  }else if ($(this).val() == "market") {
    $("#marketform").toggle();
    $("#ceaseform").hide();
    $("#operationform").hide();
    $("#transfer").hide();
    genformmarket(trans_id);

  }else {
    offcert();
  }

});



function removecert(id){
  $.ajax({
    url: global.settings.url + '/MainController/updatecert',
    type: 'POST',
    data: {id: id},
    dataType:'JSON',
    success: function(res){
      Swal.fire({
        icon: 'success',
        title: 'Certification Effectivity Removed',
      });
      $('#cert_table').DataTable().ajax.reload();
    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });

}


function fetchdata(id){

  var urlclear = '';
  $('#iframe_preview_formgen').attr('src',urlclear);

  var typeselect = $('#client_type').val();
  // e.preventDefault();

  if (typeselect == "tenant") {
    console.log("tenant change pdf");
    $('#select_cert').modal("show");
    getcertinfoTenant(id);

  }else if (typeselect == "ambulant") {
    console.log("ambulant change pdf");
    $('#select_cert').modal("show");
    getcertinfoAmbu(id);

  }

}

function getcertinfoAmbu(id) {
  $.ajax({
    url: global.settings.url + '/MainController/get_cert_info_ambulant',
    type: 'POST',
    data: {id: id},
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#transaction_id').val(res.transaction_id );
      $('#fname').val(res.firstname );
      $('#mname').val(res.middlename );
      $('#lname').val(res.lastname);
      $('#address').val(res.address);
      $('#natbus').val(res.nature_of_business);

      $('#location').val(res.location);
      $('#location_no').val(res.location_no);

      $('#or_number').val(res.or_number);
      $('#payment_amount').val(res.payment_amount);
      $('#address').val(res.address);
      $('#today').val(currentDate);
      $('#days').val(n);
      $('#month').val(month);
      $('#year').val(year);
      $('#ornumber').val(res.or_number );
      var lastfourOR = $('#ornumber').val();
      var tranIDVVAR = $('#transaction_id').val();

      console.log($('#today').val() + 'hello');
      var datenosl = $('#today').val().replace(/\//g, '');
        var lastfour = lastfourOR.substr(lastfourOR.length - 4);
        $('#todaynosl').val(datenosl);
        $('#refnum').val(datenosl + lastfour + tranIDVVAR);
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    });
  }



  function genformcease(id) {

    $("input").remove(".inputdynacease");
    var typeselect = $('#client_type').val();


    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="todaynosl" name="cert[todaynosl]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="ornumber" name="cert[ornumber]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="refnum" name="cert[refnum]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="fname" name="cert[fname]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="mname" name="cert[mname]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="lname" name="cert[lname]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="address" name="cert[address]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="natbus" name="cert[natbus]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="floor_level" name="cert[floor_level]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="OR" name="cert[OR]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="or_number" name="cert[or_number]"> ');
    $("#aftercease").after(' <input type="text" hidden class="inputdynacease" id="payment_amount" name="cert[payment_amount]"> ');
    $('#cert').val($('#cert_type_select1').val());

    if (typeselect == "ambulant") {
      $('#clientfield').val("TEMPORARY/AMBULANT vendor");
      getcertinfoAmbu(id);

    }else if (typeselect == "tenant") {
      $('#clientfield').val("LESSEE");
      getcertinfoTenant(id);

    }

    // floodfields(id);
  }


  function genformtransfer(id) {

    $("input").remove(".inputdynacease");
    var typeselect = $('#client_type').val();


    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="todaynosl" name="cert[todaynosl]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="ornumber" name="cert[ornumber]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="refnum" name="cert[refnum]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="fname" name="cert[fname]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="mname" name="cert[mname]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="lname" name="cert[lname]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="address" name="cert[address]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="natbus" name="cert[natbus]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="floor_level" name="cert[floor_level]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="OR" name="cert[OR]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="or_number" name="cert[or_number]"> ');
    $("#aftertransfer").after(' <input type="text" hidden class="inputdynacease" id="payment_amount" name="cert[payment_amount]"> ');
    $('#cert').val($('#cert_type_select1').val());

    if (typeselect == "ambulant") {
      $('#clientfield').val("TEMPORARY/AMBULANT vendor");
      getcertinfoAmbu(id);

    }else if (typeselect == "tenant") {
      $('#clientfield').val("LESSEE");
      getcertinfoTenant(id);

    }

    // floodfields(id);
  }

  function genformoperation(id) {

    $("input").remove(".inputdynacease");
    var typeselect = $('#client_type').val();


    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="todaynosl" name="cert[todaynosl]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="ornumber" name="cert[ornumber]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="refnum" name="cert[refnum]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="fname" name="cert[fname]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="mname" name="cert[mname]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="lname" name="cert[lname]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="address" name="cert[address]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="natbus" name="cert[natbus]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="floor_level" name="cert[floor_level]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="OR" name="cert[OR]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="or_number" name="cert[or_number]"> ');
    $("#afteroperation").after(' <input type="text" hidden class="inputdynacease" id="payment_amount" name="cert[payment_amount]"> ');
    $('#cert').val($('#cert_type_select1').val());

    if (typeselect == "ambulant") {
      $('#clientfield').val("TEMPORARY/AMBULANT vendor");
      getcertinfoAmbu(id);

    }else if (typeselect == "tenant") {
      $('#clientfield').val("LESSEE");
      getcertinfoTenant(id);

    }

    // floodfields(id);
  }

  function genformmarket(id) {

    $("input").remove(".inputdynacease");
    var typeselect = $('#client_type').val();


    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="todaynosl" name="cert[todaynosl]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="ornumber" name="cert[ornumber]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="refnum" name="cert[refnum]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="fname" name="cert[fname]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="mname" name="cert[mname]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="lname" name="cert[lname]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="address" name="cert[address]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="natbus" name="cert[natbus]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="floor_level" name="cert[floor_level]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="OR" name="cert[OR]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="or_number" name="cert[or_number]"> ');
    $("#aftermarket").after(' <input type="text" hidden class="inputdynacease" id="payment_amount" name="cert[payment_amount]"> ');
    $('#cert').val($('#cert_type_select1').val());

    if (typeselect == "ambulant") {
      $('#clientfield').val("TEMPORARY/AMBULANT vendor");
      getcertinfoAmbu(id);

    }else if (typeselect == "tenant") {
      $('#clientfield').val("LESSEE");
      getcertinfoTenant(id);

    }

    // floodfields(id);
  }



  function getcertinfoTenant(id) {
    $.ajax({
      url: global.settings.url + '/MainController/get_cert_info_con',
      type: 'POST',
      data: {id: id},
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];
        // completeformtenant();
        $('#transaction_id').val(res.transaction_id );
        $('#fname').val(res.firstname );
        $('#mname').val(res.middlename );
        $('#lname').val(res.lastname);
        $('#address').val(res.address);
        $('#natbus').val(res.nature_or_business);
        $('#flrlvl').val(res.address);
        $('#stall').val(res.unit_no);
        $('#floor_level').val(res.floor_level);
        $('#or_number').val(res.or_number);
        $('#payment_amount').val(res.payment_amount);
        $('#address').val(res.address);
        $('#today').val(currentDate);
        $('#days').val(n);
        $('#month').val(month);
        $('#year').val(year);
        $('#ornumber').val(res.or_number );
        var lastfourOR = $('#ornumber').val();
        var tranIDVVAR = $('#transaction_id').val();
        var datenosl = $('#today').val().replace(/\//g, '');
          var lastfour = lastfourOR.substr(lastfourOR.length - 4);
          $('#todaynosl').val(datenosl);
          $('#refnum').val(datenosl + lastfour + tranIDVVAR);
        },
        error: function(xhr){
          console.log(xhr.responseText);
        }
      })
    }


    function floodfields(id) {
      $.ajax({
        url: global.settings.url + '/MainController/get_cert_info_con',
        type: 'POST',
        data: {id: id},
        dataType:'JSON',
        success: function(res){
          console.log(res);
          res = res[0];
          // completeformtenant();
          $('#transaction_id').val(res.transaction_id );
          $('#fname').val(res.firstname );
          $('#mname').val(res.middlename );
          $('#lname').val(res.lastname);
          $('#address').val(res.address);
          $('#natbus').val(res.nature_or_business);
          $('#flrlvl').val(res.address);
          $('#stall').val(res.unit_no);
          $('#floor_level').val(res.floor_level);
          $('#or_number').val(res.or_number);
          $('#payment_amount').val(res.payment_amount);
          $('#address').val(res.address);
          $('#today').val(currentDate);
          $('#days').val(n);
          $('#month').val(month);
          $('#year').val(year);
          $('#ornumber').val(res.or_number );
          var lastfourOR = $('#ornumber').val();
          var tranIDVVAR = $('#transaction_id').val();
          var datenosl = $('#today').val().replace(/\//g, '');
            var lastfour = lastfourOR.substr(lastfourOR.length - 4);
            $('#todaynosl').val(datenosl);
            $('#refnum').val(datenosl + lastfour + tranIDVVAR);
          },
          error: function(xhr){
            console.log(xhr.responseText);
          }
        })
      }

      function offcert() {
        $("#ceaseform").hide();
        $("#transferform").hide();
        $("#operationform").hide();
        $("#marketform").hide();
      }

      $("#select_cert").on('hidden.bs.modal', function() {
        offcert();
        $("#basecertform")[0].reset();
        $("#ceaseform")[0].reset();
        $("#transferform")[0].reset();
        $("#marketform")[0].reset();
        $("#operationform")[0].reset();

      });
