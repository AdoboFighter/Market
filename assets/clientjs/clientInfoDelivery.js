var datable;

$(document).ready(function(){


    $( "#payhistbtn" ).click(function() {
      $('#violationmodal').modal('show');

    });

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

    $('#updatecustomerinfo').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: global.settings.url + '/MainController/updatedeliveryinfo',
        type: 'POST',
        data: $(this).serialize(),
        dataType:'JSON',
        success: function(res){
          Swal.fire({
            icon: 'success',
            title: 'Updated',
          });
          $('#updatecustomerinfo')[0].reset();
          datable.ajax.reload();
        },
        error:function(res){
          console.log('sala');
        }
      });

    });

  });

  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: global.settings.url + '/MainController/updatedeliveryinfo',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        Swal.fire({
          icon: 'success',
          title: 'Updated',
        });
        $('#updatecustomerinfo')[0].reset();
        datable.ajax.reload();
      },
      error:function(res){
        console.log('sala');
      }
    });

  });



  function fetchdata1(id){
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
        $('#del_cn').val(res.contact_number);
        $('#del_id').val(res.delivery_id);

      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }


  function fetchdata(id){
    fetchdata1(id);
    transactionhistory(id);

  }





  function transactionhistory(id)
  {
    $('#pay_hist_tab').DataTable().destroy();

    $('#pay_hist_tab').DataTable({
      "ajax" : {
        "url" : global.settings.url + '/MainController/getcustomertransactionhistory/' + id,
        type: 'GET',
        dataSrc : "data",
      },
      "columns" : [{
        "data" : "or_no"
      },

      {
        "data" : "nature_of_payment"
      },

      {
        "data" : "amount"
      },


      {
        "data" : "date"
      }]

    });



    $('.dataTables_length').addClass('bs-select');
  }
