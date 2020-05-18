var datable;
var violationfrm = document.getElementsByName('violationform')[0];


$(document).ready(function(){
  $('#getviolationtable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_cheque_list',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "cheque_id"
    },
    {
      "data" : "cheque_amount"
    },

    {
      "data" : "cheque_number"
    },
    {
      "data" : "bank_branch"
    },
    {
      "data" : "fk_stall_no"
    },
    {
      "data" : "fk_transaction_id"
    }

  ]
  });



  $('.dataTables_length').addClass('bs-select');


});
