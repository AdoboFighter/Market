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

  // $('#cert_table').DataTable({
  //   "ajax" : {
  //     "url" : global.settings.url + '/MainController/getcerttable',
  //     dataSrc : 'data'
  //   },
  //   "columns" : [{
  //     "data" : "id"
  //   },
  //   {
  //     "data" : "c_info_fullname_owner"
  //   },
  //   {
  //     "data" : "c_info_address"
  //   },
  //   {
  //     "data" : "c_info_stall_number"
  //   },
  //   {
  //     "data" : "btn"
  //   }]
  // });


  $('#cert_type_select').on('change', function(e) {

    var typeselect = $('#client_type').val();
    e.preventDefault();

    if (typeselect == "tenant") {
      console.log("tenant change pdf");
      $.ajax({
        url : global.settings.url + '/MainController/pdf2fcert',
        type : 'POST',
        data : $('#certform').serialize(),
        xhrFields: {
          responseType: 'blob'
        },
        success : function(res){
          //   $('#modalBirthday').modal('show');
          var a = document.createElement('a');
          var url = window.URL.createObjectURL(res);
          a.href = url;
          $('#iframe_preview_formgen').attr('src',url);
        },
        error : function(xhr){
          console.log(xhr.responseText);
        }
      });

    }else if (typeselect == "ambulant") {
      console.log("ambulant change pdf");
      $.ajax({
        url : global.settings.url + '/MainController/pdf2fcertambulant',
        type : 'POST',
        data : $('#certform').serialize(),
        xhrFields: {
          responseType: 'blob'
        },
        success : function(res){
          //   $('#modalBirthday').modal('show');
          var a = document.createElement('a');
          var url = window.URL.createObjectURL(res);
          a.href = url;
          $('#iframe_preview_formgen').attr('src',url);
        },
        error : function(xhr){
          console.log(xhr.responseText);
        }
      });
    }

    $('#cert').val(this.value);
    var typecert = $('#location option:selected').text();
    $('#cert_type').val(typecert);


  });


  $('.dataTables_length').addClass('bs-select');





  //end of document ready
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
    completeformtenant(trans_id);

  }else if ($(this).val() == "transfer") {
    $("#transferform").toggle();
    $("#ceaseform").hide();
    $("#operationform").hide();
    $("#marketform").hide();

  }else if ($(this).val() == "operation") {
    $("#operationform").toggle();
    $("#ceaseform").hide();
    $("#transferform").hide();
    $("#marketform").hide();


  }else if ($(this).val() == "market") {
    $("#marketform").toggle();
    $("#ceaseform").hide();
    $("#operationform").hide();
    $("#transfer").hide();

  }

});

function ceasetoggleform() {

}


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
      $('#location').val(res[0].location);
      $('#Location_num').val(res[0].Location_num);
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

  function completeformtenant(id) {
    $("#aftercease").after(' <input type="text" id="todaynosl" name="cert[todaynosl]"> ');
    $("#aftercease").after(' <input type="text" id="ornumber" name="cert[ornumber]"> ');
    $("#aftercease").after(' <input type="text" id="refnum" name="cert[refnum]"> ');
    $("#aftercease").after(' <input type="text" id="cert" name="cert[cert]"> ');
    $("#aftercease").after(' <input type="text" id="fname" name="cert[fname]"> ');
    $("#aftercease").after(' <input type="text" id="mname" name="cert[mname]"> ');
    $("#aftercease").after(' <input type="text" id="lname" name="cert[lname]"> ');
    $("#aftercease").after(' <input type="text" id="address" name="cert[address]"> ');
    $("#aftercease").after(' <input type="text" id="natbus" name="cert[natbus]"> ');
    $("#aftercease").after(' <input type="text" id="stall" name="cert[stall]"> ');
    $("#aftercease").after(' <input type="text" id="flrlvl" name="cert[flrlvl]"> ');
    $("#aftercease").after(' <input type="text" id="floor_level" name="cert[floor_level]"> ');
    $("#aftercease").after(' <input type="text" id="OR" name="cert[OR]"> ');
    $("#aftercease").after(' <input type="text" id="or_number" name="cert[or_number]"> ');
    $("#aftercease").after(' <input type="text" id="payment_amount" name="cert[payment_amount]"> ');
    $("#aftercease").after(' <input type="text" id="cert_type" name="cert[cert_type]"> ');
    getcertinfoTenant(id);
  }

  function completeformambulant() {
    $("#aftercease").after(' <input type="text" hidden id="todaynosl" name="cert[todaynosl]"> ');
    $("#aftercease").after(' <input type="text" hidden id="ornumber" name="cert[ornumber]"> ');
    $("#aftercease").after(' <input type="text" hidden id="refnum" name="cert[refnum]"> ');
    $("#aftercease").after(' <input type="text" hidden id="cert" name="cert[cert]"> ');
    $("#aftercease").after(' <input type="text" hidden id="fname" name="cert[fname]"> ');
    $("#aftercease").after(' <input type="text" hidden id="mname" name="cert[mname]"> ');
    $("#aftercease").after(' <input type="text" hidden id="lname" name="cert[lname]"> ');
    $("#aftercease").after(' <input type="text" hidden id="address" name="cert[address]"> ');
    $("#aftercease").after(' <input type="text" hidden id="natbus" name="cert[natbus]"> ');
    $("#aftercease").after(' <input type="text" hidden id="stall" name="cert[stall]"> ');
    $("#aftercease").after(' <input type="text" hidden id="flrlvl" name="cert[flrlvl]"> ');
    $("#aftercease").after(' <input type="text" hidden id="floor_level" name="cert[floor_level]"> ');
    $("#aftercease").after(' <input type="text" hidden id="days" name="cert[days]"> ');
    $("#aftercease").after(' <input type="text" hidden id="month" name="cert[month]"> ');
    $("#aftercease").after(' <input type="text" hidden id="year" name="cert[year]"> ');
    $("#aftercease").after(' <input type="text" hidden id="OR" name="cert[OR]"> ');
    $("#aftercease").after(' <input type="text" hidden id="today" name="cert[today]"> ');
    $("#aftercease").after(' <input type="text" hidden id="or_number" name="cert[or_number]"> ');
    $("#aftercease").after(' <input type="text" hidden id="refdate" name="cert[refdate]"> ');
    $("#aftercease").after(' <input type="text" hidden id="payment_amount" name="cert[payment_amount]"> ');
    $("#aftercease").after(' <input type="text" hidden id="cert_type" name="cert[cert_type]"> ');
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

    function offcert() {
      $("#ceaseform").toggle();
      $("#transferform").toggle();
      $("#operationform").toggle();
      $("#marketform").toggle();
    }
