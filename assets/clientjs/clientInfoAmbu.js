var datable;

$(document).ready(function(){

  $( "#payhistbtn" ).click(function() {
      $('#violationmodal').modal('show');

  });

  datable =  $('#AmbulantTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getPayAmbulantTableCon',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "pay_ambu_name"
      },

      {
        "data" : "pay_ambu_location"
      },

      {
        "data" : "pay_ambu_locnum"
      },

      {
        "data" : "btn"
      }]
        'stall_id' =>$r->stall_id,
        'stall_number' =>$r->unit_no,
        'area' => $r->sqm,
        'daily_fee' => $r->dailyfee
    });

    $('.dataTables_length').addClass('bs-select');
    $('#updatecustomerinfo').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: global.settings.url + '/MainController/updateambulantinfo',
        type: 'POST',
        data: $(this).serialize(),
        dataType:'JSON',
        success: function(res){
          alert('update successful');
          $('#customer_id').val(null);
          $('#ambulant_fn').val(null);
          $('#ambulant_mn').val(null);
          $('#ambulant_ln').val(null);
          $('#ambulant_add').val(null);
          $('#ambulant_cn').val(null);
          $('#location').val(null);
          $('#location_num').val(null);


          datable.ajax.reload();

        },
        error:function(res){

        }
      });

    });





  });

  function fetchdata(id){
    customerinfo(id);
    transactionhistory(id);

  }

  function customerinfo(id){

    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/getcustomerinfopaymcon',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        console.log(res);
          $('#customer_id').val(res[0].customer_id)
          $('#ambulant_id').val(res[0].ambulant_id);
          $('#ambulant_fn').val(res[0].firstname);
          $('#ambulant_mn').val(res[0].middlename);
          $('#ambulant_ln').val(res[0].lastname);
          $('#ambulant_add').val(res[0].address);
          $('#ambulant_cn').val(res[0].contact_number);
          $('#location').val(res[0].location);
          $('#Location_num').val(res[0].Location_no);
          $('#nature_of_business').val(res[0].nature_of_business);
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
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
