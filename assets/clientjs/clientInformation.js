var datable;


$(document).ready(function(){

  $('#client_table').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcustomertable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },

    {
      "data" : "c_info_stall_number"
    },

    {
      "data" : "c_info_area"
    },


    {
      "data" : "c_info_daily_fee"
    },


    {
      "data" : "c_info_fullname_owner"
    },

    {
      "data" : "c_info_fullname_occupant"
    },
    {
      "data" : "btn"
    }]
  });
  $('.dataTables_length').addClass('bs-select');



});
//

function fetchdata(id){
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfo',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];

      $('#owner_fn').val(res.firstname );
      $('#owner_mn').val(res.middlename );
      $('#owner_ln').val(res.lastname);
      $('#owner_add').val(res.sqm);
      $('#owner_cn').val(res.dailyfee);
      $('#stall_number').val(res.unit_no);
      $('#area').val(res.payment_datetime);
      $('#daily_fee').val(res.dailyfee);
    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}
