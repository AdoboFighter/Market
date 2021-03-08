var datable;
var fullDate = new Date();
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
const monthNames = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];
const m = new Date();
var month = monthNames[m.getMonth()];
var d = new Date();
var n = d.getDate();
var year = new Date().getFullYear();


$(document).ready(function(){

  $('#cert_table').DataTable({
    "paging": true,
    "ordering": true,
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcancelledor',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "cert_trans_id"
    },
    {
      "data" : "cert_name"
    },

    {
      "data" : "cert_dop"
    },
    {
      "data" : "cert_type"
    },

    {
      "data" : "cert_ref_num"
    }
  ]
});


  function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
  }


  $('#search_cl_s').on('change', function() {
    var search = $("#search_cl_f").val();
    var searchcat = $(this).children("option:selected").val();
    if (isEmptyOrSpaces(search)) {
      console.log("do nothing");
    }else if ($(this).children("option:selected").text() == "Please Select") {
      console.log("do nothing");
    }else {
      $('#cert_table').DataTable().clear().destroy();
      search_client(search, searchcat);
    }
  });

  $('#search_cl_f').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      var search = $("#search_cl_f").val();

      var searchcat = $("#search_cl_s option:selected").val();

      if (isEmptyOrSpaces(search) && !$('#search_cl_s').val()) {
        Swal.fire({
          icon: 'error',
          title: 'Please input your Search and Select a category',
        });
      }else if (isEmptyOrSpaces(search)) {
        Swal.fire({
          icon: 'error',
          title: 'Please input your Search',
        });
      }else if (!$('#search_cl_s').val()) {
        Swal.fire({
          icon: 'error',
          title: 'Please Select a category',
        });
      }

      else {
        $('#cert_table').DataTable().clear().destroy();
        search_client(search, searchcat);
      }
    }
  });

  function search_client(search, searchcat) {

  $('.dataTables_length').addClass('bs-select');
}

});
