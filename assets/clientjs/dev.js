
$(document).ready(function(){
 // $("#searchmodal").modal('toggle');
});

//search

function isEmptyOrSpaces(str){
  return str === null || str.match(/^ *$/) !== null;
}


$('#search_cl_s').on('change', function(){
  var search = $("#search_cl_f").val();
  var searchcat = $(this).children("option:selected").val();
  if (isEmptyOrSpaces(search)) {
    console.log("do nothing");
  }else if ($(this).children("option:selected").text() == "Please Select") {
    console.log("do nothing");
  }else {
    $('#tableNoStall').DataTable().clear().destroy();
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
      $('#tableNoStall').DataTable().clear().destroy();
      search_client(search, searchcat);
    }
  }
});

function search_client(search, searchcat) {

  $('#tableNoStall').DataTable({
    "autoWidth": false,
    "paging": true,
    "searching": false,
    "ordering": true,
    "ajax" : {
      "url" : global.settings.url + '/MainController/gettenanttable',
      "data": {search:search, searchcat:searchcat},
      "dataType": "json",
      "type": "POST"
    },
    "columns" : [{
      "data" : "id"
    },

    {
      "data" : "c_info_stall_number"
    },

    {
      "data" : "c_info_section"
    },

    {
      "data" : "c_info_natbus"
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
  // $('.dataTables_length').addClass('bs-select');
}


//load data


function fetchdata(id){
  $.ajax({
    url: global.settings.url + '/MainController/checkviolationpay',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      if (res == 'withviolation') {
        Swal.fire({
          icon: 'error',
          title: 'Pay the violation first',
        });
      }else {
        res = res[0];
        $('#unit_no').text(res.unit_no);
        $('#name').text(res.firstname + ' '+ res.middlename +' ' + res.lastname);
        $('#searchmodal').modal("hide");
      }
    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })

}
