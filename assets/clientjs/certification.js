var datable;


$(document).ready(function(){

  $('#cert_table').DataTable({
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
    }]
  });



  $('.dataTables_length').addClass('bs-select');

  $('#certform').submit(function(e){
    e.preventDefault();
    console.log( $('#violationform').serializeArray());
    $.ajax({
      url : global.settings.url +'/MainController/save_violation_con',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
      console.log(res);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });
  });




});

function setIframeSource() {
   var theSelect = document.getElementById('location');
   var theIframe = document.getElementById('myIframe');
   var theUrl;

   theUrl = theSelect.options[theSelect.selectedIndex].value;
   theIframe.src = theUrl;
}





// function fetchdata(id){
//   $('#violationmodal').modal("show");
//   // console.log(id);
//   // $.ajax({
//   //   url: global.settings.url + '/MainController/get_customer_info_vio_con',
//   //   type: 'POST',
//   //   data: {
//   //     id: id
//   //   },
//   //   dataType:'JSON',
//   //   success: function(res){
//   //     console.log(res);
//   //     res = res[0];
//   //     $('#stall_id_f').val(res.stall_id );
//   //     $('#stall_num_f').val(res.unit_no );
//   //     $('#owner_f').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
//   //     $('#address_f').val(res.address);
//   //     $('#occu_f').val(res.aofirstname + ' '+ res.aomiddlename +' ' + res.aolastname);
//   //
//   //
//   //   },
//   //   error: function(xhr){
//   //     console.log(xhr.responseText);
//   //   }
//   // })
// }


function fetchdata(id){
  $('#certmodal').modal("show");
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/get_cert_info_con',
    type: 'POST',
    data: {id: id},
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#fname').val(res.firstname );
      $('#mname').val(res.middlename );
      $('#lname').val(res.lastname);
      $('#address').val(res.address);

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}

$('#certform').submit(function(e){
  e.preventDefault();
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
});

function setIframeSource() {
  var theSelect = document.getElementById('location');
  var theIframe = document.getElementById('myIframe');
  var theUrl;

  theUrl = theSelect.options[theSelect.selectedIndex].value;
  theIframe.src = theUrl;
}
