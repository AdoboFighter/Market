var datable;
$(document).ready(function(){

  $("transact").submit(function(e){
    e.preventDefault();
  });

  $('#paymentcard').hide();
  $('#clientIdField').hide();
  // $('#cheque').hide();

  $('#activatebtn').on('click', function(){

    $('#paymentcard').show();
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
         url : global.settings.url +'/MainController/savePayment',
         type : 'POST',
         data :{
           "data":{
             "clientIdField": $('#clientIdField').val(),
             "orField" : $('#orField').val(),
             "amountToField" : $('#amountToField').val(),
             "cashTendField" : $('#cashTendField').val(),
             "payTypeField" : $('#payTypeField').val(),
             "payEffectField" : $('#payEffectField').val(),
             "payorField" : $('#payorField').val()

           }
         },
         dataType : 'json',
         success : function(res){
         console.log(res);
          $('#success').modal("show");

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
