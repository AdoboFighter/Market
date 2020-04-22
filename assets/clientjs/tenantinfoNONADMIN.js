var datable;
var id;

$(document).ready(function(){




  $( "#payhistbtn" ).click(function() {
    $('#violationmodal').modal('show');
  });


    function isEmptyOrSpaces(str){
      return str === null || str.match(/^ *$/) !== null;
    }

    $('#search_cl_s').on('change', function() {
      var search = $("#search_cl_f").val();
      var searchcat = $(this).children("option:selected").val();
      if (isEmptyOrSpaces(search)) {
        console.log("do nothing");
      }else {
        $('#client_table').DataTable().clear().destroy();
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
          $('#client_table').DataTable().clear().destroy();
          search_client(search, searchcat);
        }
      }
    });

    function search_client(search, searchcat) {
      $('#client_table').DataTable({
        "paging": true,
        "searching": false,
        "ordering": true,
        "ajax" : {
          "url" : global.settings.url + '/MainController/getcustomerinfotable',
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
        }

      ]
    });
    $('.dataTables_length').addClass('bs-select');
  }


// $('#client_table').DataTable({
//   "ajax" : {
//     "url" : global.settings.url + '/MainController/getcustomertable',
//     dataSrc : 'data'
//   },
//   "columns" : [{
//     "data" : "id"
//   },
//
//   {
//     "data" : "c_info_stall_number"
//   },
//
//   {
//     "data" : "c_info_area"
//   },
//
//
//   {
//     "data" : "c_info_daily_fee"
//   },
//
//
//   {
//     "data" : "c_info_fullname_owner"
//   },
//
//   {
//     "data" : "c_info_fullname_occupant"
//   },
//   {
//     "data" : "btn"
//   }]
// });



$('.dataTables_length').addClass('bs-select');

$('#updatecustomerinfo').submit(function(e){
  e.preventDefault();
  $.ajax({
    url: global.settings.url + '/MainController/updatecustomerinfo',
    type: 'POST',
    data: $(this).serialize(),
    dataType:'JSON',
    success: function(res){
      Swal.fire({
        icon: 'success',
        title: 'Updated',
      });
      $('#client_table').DataTable().ajax.reload();
      $('#updatecustomerinfo')[0].reset();
    },
    error:function(res){

    }
  });
});

});

//end of doc ready


function fetchdata(id){
  customerinfo(id);
  transactionhistory(id);
}

function customerinfo(id){
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfopaycon',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      $('#customer_id').val(res[0].customer_id)
      $('#owner_fn').val(res[0].firstname);
      $('#owner_mn').val(res[0].middlename);
      $('#owner_ln').val(res[0].lastname);
      $('#owner_add').val(res[0].address);
      $('#owner_cn').val(res[0].contact_no);

      $('#occu_fn').val(res[0].oafirstname);
      $('#occu_mn').val(res[0].oamiddlename);
      $('#occu_ln').val(res[0].oalastname);
      $('#occu_add').val(res[0].oaaddress);
      $('#occu_cn').val(res[0].contact_no);

      $('#stall_id').val(res[0].stall_id)
      $('#stall_number').val(res[0].stall_number);
      $('#area').val(res[0].area);
      $('#daily_fee').val(res[0].daily_fee);
      $('#stall_flr_lvl').val(res[0].floor_level);
      $('#nature_or_business').val(res[0].nature_or_business);
      $('#business_id').val(res[0].business_id);
      $('#business_name').val(res[0].business_name);
      $('#Section').val(res[0].Section);

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}



function transactionhistory(id){
  $('#pay_hist_tab').DataTable().destroy();
  $('#pay_hist_tab').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcustomertransactionhistory/' + id,
      type: 'GET',
      dataSrc : "data",
    },
    "columns" : [{
      "data" : "or_no"
    },

    {
      "data" : "nature_of_payment"
    },

    {
      "data" : "amount"
    },


    {
      "data" : "date"
    }]

  });

  $('.dataTables_length').addClass('bs-select');
}
