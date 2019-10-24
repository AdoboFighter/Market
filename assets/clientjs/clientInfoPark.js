var datable;

$(document).ready(function(){


  $('#parkTable').DataTable({
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

        $('#park_fn').val(res.firstname );
        $('#park_mn').val(res.middlename);
        $('#park_ln').val(res.lastname);
        $('#park_add').val(res.address);
        $('#park_cn').val(res.contact_number);
        $('#driver_id').val(res.driver_id);
        $('#park_lot').val(res.lot_no);
        // $('#last_pay').val(res.payment_datetime);
        // diffdates();
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
