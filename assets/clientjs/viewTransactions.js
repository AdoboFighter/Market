var datable;


$(document).ready(function(){

  $('#tableNoStall').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/gettransactiontable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "trans_fullname"
    },

    {
      "data" : "trans_or"
    },


    {
      "data" : "trans_amount"
    },

    {
      "data" : "trans_nature"
    },

    {
      "data" : "trans_date"
    },

    {
      "data" : "trans_fund"
    }]
  });
  $('.dataTables_length').addClass('bs-select');



});
