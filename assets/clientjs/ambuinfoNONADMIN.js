var datable;

$(document).ready(function(){

  $( "#payhistbtn" ).click(function() {
    $('#violationmodal').modal('show');

  });

  $('#search_cl_f').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      var search = $("#search_cl_f").val();

      $('#AmbulantTable').DataTable().clear().destroy();
      search_client(search);

    }
  });



  function search_client(search) {
    $('#AmbulantTable').DataTable({
      "paging": true,
      "searching": false,
      "ordering": true,
      "ajax" : {
        "url" : global.settings.url + '/MainController/getPayAmbulantTableCon',
        "data": {search:search},
        "dataType": "json",
        "type": "POST"
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
        }
      ]
    });
    $('.dataTables_length').addClass('bs-select');
  }



  // datable =  $('#AmbulantTable').DataTable({
  //   "ajax" : {
  //     "url" : global.settings.url + '/MainController/getPayAmbulantTableCon',
  //     dataSrc : 'data'
  //   },
  //   "columns" : [
  //     {
  //       "data" : "id"
  //     },
  //     {
  //       "data" : "pay_ambu_name"
  //     },
  //
  //     {
  //       "data" : "pay_ambu_location"
  //     },
  //
  //     {
  //       "data" : "pay_ambu_locnum"
  //     },
  //
  //     {
  //       "data" : "btn"
  //     }
  //   ]
  //
  //   });

  $('.dataTables_length').addClass('bs-select');
  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: global.settings.url + '/MainController/updateambulantinfo',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        Swal.fire(
          'Success',
          'User Information Updated',
          'success'
        );
        $('#updatecustomerinfo')[0].reset();
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
    url: global.settings.url + '/MainController/getcustomerinfoAMBUpaycon',
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
      $('#ambulant_cn').val(res[0].contact_no);
      $('#location').val(res[0].location);
      $('#Location_num').val(res[0].Location_num);
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