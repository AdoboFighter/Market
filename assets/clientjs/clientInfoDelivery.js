var datable;

$(document).ready(function(){


  datable = $('#DeliveryTable').DataTable({
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

  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();

      
          $.ajax({
              url: global.settings.url + '/MainController/updatedeliveryinfo',
              type: 'POST',
              data: $(this).serialize(),
              dataType:'JSON',
            success: function(res){
              alert('update successful');
              $('#customer_id').val(null);
              $('#del_fn').val(null);
              $('#del_mn').val(null);
              $('#del_ln').val(null);
              $('#del_add').val(null);
              $('#del_cn').val(null);
              $('#del_id').val(null);
              
      
            
              datable.ajax.reload();
             
            },
            error:function(res){
console.log('sala');
            }
        });
 
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
        $('#customer_id').val(id);
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
