var datable;

$(document).ready(function(){


   datable = $('#parkTable').DataTable({
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


  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();

      
          $.ajax({
              url: global.settings.url + '/MainController/updateparkinginfo',
              type: 'POST',
              data: $(this).serialize(),
              dataType:'JSON',
            success: function(res){
              alert('update successful');
              $('#customer_id').val(null);
              $('#park_fn').val(null);
              $('#park_mn').val(null);
              $('#park_ln').val(null);
              $('#park_cn').val(null);
              $('#park_lot').val(null);
              $('#park_add').val(null);
      
              $('#driver_id').val(null);
              datable.ajax.reload();
             
            },
            error:function(res){

            }
        });
 
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
        $('#customer_id').val(id);
        $('#park_fn').val(res.firstname );
        $('#park_mn').val(res.middlename);
        $('#park_ln').val(res.lastname);
        $('#park_add').val(res.address);
        $('#park_cn').val(res.contact_number);
        $('#driver_id').val(res.driver_id);
        $('#driver_id').prop('readonly');
        $('#park_lot').val(res.lot_no);
        // $('#last_pay').val(res.payment_datetime);
        // diffdates();
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
