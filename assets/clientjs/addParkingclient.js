// var base_url = window.location.origin + '/Market/';

$(document).ready(function(){

  $('#savePark').submit(function(e){
    
    e.preventDefault();
    console.log( $('#savePark').serializeArray() );
    $.ajax({
      url : global.settings.url +'/MainController/saveparking',
      type : 'POST',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
        Swal.fire({
          icon: 'success',
          title: 'Added',
        });
        $('#violationmodal').modal("toggle");
        $('#savePark')[0].reset();
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });


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
});

function search_client(search, searchcat) {
  $('#tableNoStall').DataTable({
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

}


function fetchdata(id){
  $('#savePark')[0].reset();
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfopark',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);


      if (res == 'withpark') {
        Swal.fire({
          icon: 'error',
          title: 'Tenant Has a existing Parking client',
        });
      }else {
        res = res[0];
        $('#customer_id').val(res.customer_id );
        $('#tenant_id').val(res.tenant_id );
        $('#violationmodal').modal("show");
      }

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}
