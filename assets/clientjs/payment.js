var datable;

$(document).ready(function(){

  $('#cbCheque').on('checked',function(){
    $("#cheque").slidetoggle(200);
  });

  sum();
  $("#cashTendField, #amountToField, #cheqAmountField").on("keydown keyup", function() {
    sum();
  });




  $('#cbCheque').on('change',function(){
    if( $(this).is(':checked') ){
      $('#cashTendField').attr('readonly','readonly');
      $('#cashTendField').val(0);
      $('#cashTendField').attr("placeholder", "Cheque");
      $('#cheque').toggle(200);
    }else{
      $('#cashTendField').val("0.00");
      $('#cashTendField').removeAttr('readonly');
      $("#cheque").hide();

    }
  });

  $("transact").submit(function(e){
    e.preventDefault();
  });
  $("#cheque").hide();
  // $('#stall_number_field').hide();
  // $('#paymentcard').hide();
  // $('#clientIdField').hide();
  // $('#cheque').hide();

  $('#activatebtn').on('click', function(){
    if ( $('#clientIdField').val().length === 0) {
      $('#failedActivation').modal("show");
    } else {
      $('#paymentcard').show();
    }


  });



  $('#tableNoStall').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/gettenanttable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "fullname"
    },

    {
      "data" : "add"
    },


    {
      "data" : "btn"
    }]
  });
  $('.dataTables_length').addClass('bs-select');



});

function sum() {
  var payment = document.getElementById('cashTendField').value;
  var topay = document.getElementById('amountToField').value;
  var topay = document.getElementById('amountToField').value;
  var change = parseFloat(payment) - parseFloat(topay);
  // var chequeChange = parseFloat(payment) - parseFloat(topay);

  if (!isNaN(change)) {
    document.getElementById('change').value = change;
  }
}



function fetchdata(id){
  console.log(id);


  $.ajax({
    url: global.settings.url + '/MainController/getstallinfo',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#clientIdField').val(res.customer_id );
      $('#stall_number_field').val(res.Stall_Number );
      $('#ownerField').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      $('#areaField').val(res.Sqaure_meters);
      $('#addressField').val(res.address);

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }

  })


}



$(document).ready(function(){


  $('#transactform').submit(function(e){
    e.preventDefault();
    console.log( $('#transactform').serializeArray() );
    $.ajax({
      url : global.settings.url +'/MainController/savePayment',
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




// function getPayVal() {
//
//       $.ajax({
//         url : global.settings.url +'/MainController/savePayment',
//         type : 'POST',
//         data :{
//           "data":{
//             "clientIdField": $('#clientIdField').val(),
//             "orField" : $('#orField').val(),
//             "amountToField" : $('#amountToField').val(),
//             "cashTendField" : $('#cashTendField').val(),
//             "payTypeField" : $('#payTypeField').val(),
//             "payEffectField" : $('#payEffectField').val()
//
//
//           }
//         },
//         dataType : 'json',
//         success : function(res){
//           console.log(res);
//         },
//         error: function(xhr){
//           console.log(xhr.responseText);
//         }
//
//
//       });
//
// }
