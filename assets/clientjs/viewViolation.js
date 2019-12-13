var datable;


$(document).ready(function(){

  $('#view_vio_tab').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_customer_violation_con',
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
      "data" : "vio_address"
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
