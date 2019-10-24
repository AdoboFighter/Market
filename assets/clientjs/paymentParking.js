var datable;

$(document).ready(function(){


  $('#ParkingTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getparkingpaytablecon',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "pay_driver_id"
      },

      {
        "data" : "pay_parking_lot"
      },

      {
        "data" : "pay_parking_name"
      },

      {
        "data" : "btn"
      }]
    });
    $('.dataTables_length').addClass('bs-select');
  });



  function fetchdata(id){
    $('#AmbuPay').modal("show");
    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/getparkingpay',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];

        $('#cus_id').val(res.customer_id );
        $('#name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
        $('#driver_id').val(res.driver_id);
        $('#park_lot').val(res.lot_no);
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
