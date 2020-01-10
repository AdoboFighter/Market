var datable;
var violationfrm = document.getElementsByName('violationform')[0];


$(document).ready(function(){

  $('#orField').change(function(){
    var or_number = $('#orField').val();
    $.ajax({
      url: global.settings.url + '/MainController/checkOr',
      type: 'POST',
      data: {
        or_number: or_number
      },
      dataType:'JSON',
      success: function(res){

        if(res=="meron"){
          $('#orField').val("");
          Swal.fire({
            title: 'O.R number already exist!',
            icon: 'error',
            confirmButtonText: 'Ok'
          })

        }

      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  });



  $('#getviolationtable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_violation_data_con',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "description"
    },
    {
      "data" : "date_occured"
    },

    {
      "data" : "status"
    },
    {
      "data" : "name"
    },
    {
      "data" : "btn"
    }]
  });



  $('.dataTables_length').addClass('bs-select');

  $('#violationform').submit(function(e){
    e.preventDefault();
    console.log( $('#violationform').serializeArray());
    $.ajax({
      url : global.settings.url +'/MainController/resolveViolationCon',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        Swal.fire({
          icon: 'success',
          title: 'Violation Resolved',
        });
        $('#violationmodal').modal('toggle');
        violationfrm.reset();
        console.log(res);
        $('#getviolationtable').DataTable().ajax.reload();
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });
  });

});



function fetchdata(id){
  $('#violationmodal').modal("show");
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/get_customer_info_vio_con',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#vio').val(res.violation_id );
      $('#cust').val(res.customer_id );
      $('#stall_id_f').val(res.stall_id );
      $('#stall_num_f').val(res.unit_no );
      $('#owner_f').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      $('#address_f').val(res.address);
      $('#occu_f').val(res.aofirstname + ' '+ res.aomiddlename +' ' + res.aolastname);


    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}


function isNumberKey(txt, evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf('.') === -1) {
      return true;
    } else {
      return false;
    }
  } else {
    if (charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
    }
    return true;
  }
