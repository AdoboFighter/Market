var datable;

$(document).ready(function(){


  $('#DeliveryTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getdeliverypaytablecon',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "pay_delivery_id"
      },
      {
        "data" : "pay_delivery_name"
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
      url: global.settings.url + '/MainController/getdeliverypay',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];

        $('#del_fn').val(res.firstname );
        $('#del_mn').val(res.middlename);
        $('#del_ln').val(res.lastname);
        $('#del_add').val(res.address);
        $('#del_cn').val(res.contact_number);
        $('#del_id').val(res.delivery_id);

      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
