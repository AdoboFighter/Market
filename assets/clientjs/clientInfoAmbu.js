var datable;

$(document).ready(function(){


  $('#AmbulantTable').DataTable({
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
    });
    $('.dataTables_length').addClass('bs-select');
  });



  function fetchdata(id){

    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/getambuinfopay',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];

        $('#ambulant_fn').val(res.firstname );
        $('#ambulant_mn').val(res.middlename);
        $('#ambulant_ln').val(res.lastname);
        $('#ambulant_add').val(res.address);
        $('#ambulant_cn').val(res.contact_number);
        $('#Location').val(res.location);
        $('#Location_num').val(res.location_no);
        // $('#last_pay').val(res.payment_datetime);
        // diffdates();
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
