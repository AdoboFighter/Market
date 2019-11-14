var datable;

$(document).ready(function(){


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
    });
    $('.dataTables_length').addClass('bs-select');
  });

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
        $('#customer_id').val(id);
        $('#ambulant_fn').val(res.firstname );
        $('#ambulant_mn').val(res.middlename);
        $('#ambulant_ln').val(res.lastname);
        $('#ambulant_add').val(res.address);
        $('#ambulant_cn').val(res.contact_number);
        $('#location').val(res.location);
        $('#Location_num').val(res.location_no);
        $('#ambulant_id').val(res.ambulant_unit_id);
        // $('#last_pay').val(res.payment_datetime);
        // diffdates();
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
