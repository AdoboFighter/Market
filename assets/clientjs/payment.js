var datable;
$(document).ready(function(){

  $('#cbCheque').on('change',function(){
    $("#cheqAmountField").prop('disabled', !$(this).is(':checked'));
    $("#cheqNumField").prop('disabled', !$(this).is(':checked'));
    $("#bankBranchField").prop('disabled', !$(this).is(':checked'));

  });

  $('#cbCheque').on('change',function(){
    if( $(this).is(':checked') ){
      $('#cashTendField').attr('disabled','disabled');
      $('#cashTendField').removeAttr('value');
    }else{
      $('#cashTendField').removeAttr('disabled');
    }
  });

  $("transact").submit(function(e){
    e.preventDefault();
  });

  $('#paymentcard').hide();
  $('#clientIdField').hide();
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
      $('#clientIdField').val(res.Client_Id );
      $('#stall_num').val(res.Stall_Number );
      $('#ownerField').val(res.OFirstname + ' '+ res.OMiddlename +' ' + res.OLastname);
      $('#areaField').val(res.Sqaure_meters);
      $('#addressField').val(res.OAddress);

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
      url : global.settings.url +'/MainController/savePaymentCheque',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
        if(document.getElementById('cbCheque').checked) {
          saveCheque(res);
        } else {

        }
        $('#success').modal("show");

      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});

function saveCheque(id){

  $.ajax({
    url : global.settings.url +'/MainController/savePaymentCheque',
    type : 'POST',
    data :{
      "id": id,
      "cheqAmountField" : $('#cheqAmountField').val(),
      "cheqNumField" : $('#cheqNumField').val(),
      "bankBranchField" : $('#bankBranchField').val(),
      "stall_num" : $('#stall_num').val()
    },
    dataType : 'json',
    success : function(res){
      console.log(res);
    },error: function(xhr){
      console.log(xhr.responseText);
    }


  });
}


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
