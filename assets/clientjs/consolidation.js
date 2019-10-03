var datable;


$(document).ready(function(){

  $('#tableNoStall').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getconsolidationtable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "pay_fullname"
    },

    {
      "data" : "pay_or"
    },


    {
      "data" : "pay_amount"
    },

    {
      "data" : "pay_nature"
    },

    {
      "data" : "pay_date"
    },

    {
      "data" : "pay_fund"
    },
    {
      "data" : "pay_collector"
    }]
  });
  $('.dataTables_length').addClass('bs-select');



});
