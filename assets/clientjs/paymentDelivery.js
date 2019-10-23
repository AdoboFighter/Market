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

        $('#cus_id').val(res.customer_id );
        $('#name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
        $('#del_id').val(res.delivery_id);
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
