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
    }]
  });
  $('.dataTables_length').addClass('bs-select');



});
