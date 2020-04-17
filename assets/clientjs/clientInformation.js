var datable;
var id;

$(document).ready(function(){

  $( "#payhistbtn" ).click(function() {
    $('#violationmodal').modal('show');
  });

  function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
  }

  // $('#search_cl_f').keypress(function(event){
  //   var keycode = (event.keyCode ? event.keyCode : event.which);
  //   if(keycode == '13'){
  //     var search = $("#search_cl_f").val();
  //     if (isEmptyOrSpaces(search)) {
  //       Swal.fire({
  //         icon: 'error',
  //         title: 'Search Bar Empty',
  //       });
  //     }else {
  //       $('#client_table').DataTable().clear().destroy();
  //       search_client(search);
  //     }
  //   }
  // });

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

// function diffdates() {
//   var dp1 = document.getElementById('last_pay').value;
//   var daily = document.getElementById('daily_fee').value;
//   // Split timestamp into [ Y, M, D, h, m, s ]
//   var t = dp1.split(/[- :]/);
//
//   // Apply each element to the Date function
//   var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
//   console.log(d);
//
//   dp2 = new Date();
//   var date2 = dp2.getTime();
//   var ONE_DAY = 1000 * 60 * 60 * 24
//
//
//   // get total seconds between two dates
//   var res = Math.abs(d - date2) / 1000;
//   var days = Math.floor(res / 86400);
//   var debt = days * daily;
//   document.getElementById('debt_field').value = debt;
//
//   // console.log(days);
//   // console.log(debt);
//
// }


function diffdates2() {
  var dp1 = document.getElementById('last_pay').value;
  var daily = document.getElementById('daily_fee').value;



  if(new Date() <= new Date(dp1))
  {//compare end <=, not >=
    //your code here
    document.getElementById('debt_field').value = "STILL PAID";

  }else {
    // Split timestamp into [ Y, M, D, h, m, s ]
    var t = dp1.split(/[- :]/);

    // Apply each element to the Date function
    var d = new Date(Date.UTC(t[0], t[1]-1, t[2]));
    console.log(d);

    dp2 = new Date();
    var date2 = dp2.getTime();
    var ONE_DAY = 1000 * 60 * 60 * 24


    // get total seconds between two dates
    var res = Math.abs(d - date2) / 1000;
    var days = Math.floor(res / 86400);
    var debt = days * daily;




    document.getElementById('debt_field').value = debt;

    console.log(days);
    console.log(debt);

    var start = new Date("2010-04-01");
  }

  // var end   = new Date(),
  // diff  = new Date(end - dp1),
  // days  = diff/1000/60/60/24;
  // days;
  // var debt = days * daily;
  // document.getElementById('debt_field').value = debt;
  // console.log(days);
}

function getdebt(id) {
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getdebtcon',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);


      if (res == "stillnopay") {
        $('#last_pay').val("No history of past transactions");
        $('#debt_field').val("");
      }else {
        $('#last_pay_type').val(res[0].payment_nature_name);
        $('#last_pay').val(res[0].effectivity);
        diffdates2();
      }

    },
    error: function(xhr){
      console.log(xhr.responseText);

    }
  });

}

function fetchdata(id){
  document.getElementById("updatecustomerinfo").reset();
  customerinfo(id);
  transactionhistory(id);
  getdebt(id);
}

function customerinfo(id){
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfocon',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      $('#last_pay').val();
      console.log(res[0].customer_id);
      $('#customer_id').val(res[0].customer_id)
      $('#owner_fn').val(res[0].firstname);
      $('#owner_mn').val(res[0].middlename);
      $('#owner_ln').val(res[0].lastname);
      $('#owner_add').val(res[0].address);
      $('#owner_cn').val(res[0].contact_number);
      $('#occu_fn').val(res[0].aofirstname);
      $('#occu_mn').val(res[0].aomiddlename);
      $('#occu_ln').val(res[0].aolastname);
      $('#occu_add').val(res[0].aoaddress);
      $('#occu_cn').val(res[0].ao_cn);
      $('#stall_id').val(res[0].stall_id)
      $('#stall_number').val(res[0].unit_no);
      $('#area').val(res[0].sqm);
      $('#daily_fee').val(res[0].dailyfee);
      $('#stall_flr_lvl').val(res[0].floor_level);
      $('#nature_or_business').val(res[0].nature_or_business);
      $('#business_id').val(res[0].business_id);
      $('#business_name').val(res[0].business_name);
      $('#Section').val(res[0].Section);
      $('#date_occupied').val(res[0].date_occupied);
      $('#last_pay').val(res[0].payment_datetime);
      // diffdates();
      // if (res[0].customer_id == null) {
      //   console.log("yepo");
      // }else {
      //   console.log('nahhh');
      // }

    },
    error: function(xhr){
      console.log(xhr.responseText);
      console.log('yow');
    }
  })
}



function transactionhistory(id){
  $('#pay_hist_tab').DataTable().clear().destroy();
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
