var datable;
var violationfrm = document.getElementsByName('violationform')[0];


$(document).ready(function(){
  $('#getviolationtable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_resviolation_data_con',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "description"
    },
    {
      "data" : "date_occured"
    },

    {
      "data" : "status"
    },
    {
      "data" : "name"
    }]
  });



  $('.dataTables_length').addClass('bs-select');


});
