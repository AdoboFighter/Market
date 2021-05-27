var datableTransaction;
var customer_id;
var dateFrom;
var dateTo;


$(document).ready(function(){
  $("#searchmodal").modal('toggle');

  $("#date_from").on('change',function(){

    // dateFrom = $(this).val();
    customer_id = $('#customer_idf').val();
    dateFrom = $('#date_from').val();
    dateTo = $('#date_to').val();

    $('#transtable').dataTable().fnDestroy();
    loadDataTable(customer_id,dateFrom,dateTo);

  });


  $("#date_to").on('change',function(){

    // dateTo = $(this).val();
    customer_id = $('#customer_idf').val();
    dateFrom = $('#date_from').val();
    dateTo = $('#date_to').val();

    $('#transtable').dataTable().fnDestroy();
    loadDataTable(customer_id,dateFrom,dateTo);

  });

});



function loadDataTable(customer_id,dateFrom,dateTo){

  $('#transtable').DataTable({
     fixedColumns: true,
    "ajax" : {
      type: "POST",
      data:{customer_id:customer_id,dateFrom:dateFrom,dateTo:dateTo},
      "url" : global.settings.url + '/MainController/gettransactionstalltable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
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
}


//search

$('#searchbtn').click(function(){
  $('#searchmodal').modal("show");
});

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
      $('#searchmodal').modal("hide");
      res = res[0];

      $('#customer_idf').val(res.customer_id);
      $('#unit_no').text(res.unit_no);
      $('#name').text(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      loadhistory();
      // if (res == 'withviolation') {
      //
      //
      // }else {
      //   res = res[0];
      //   $('#searchmodal').modal("hide");
      //   loadhistory();
      //   $('#customer_idf').val(res.customer_id);
      //   $('#unit_no').text(res.unit_no);
      //   $('#name').text(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      //
      // }
    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })

}

function loadhistory() {
  $('#transtable').dataTable().fnDestroy();


    customer_id = $('#customer_idf').val();
    dateFrom = $('#date_from').val();
    dateTo = $('#date_to').val();
    console.log("hello" + customer_id);

  loadDataTable(customer_id,dateFrom,dateTo);
}


$('#genrep').click(function(){

  exCustomerId = $('#customer_idf').val();
  exStallNumber= $('#unit_no').text();
  exFullname= $('#name').text();
  exDateFrom = $('#date_from').val();
  exDateTo = $('#date_to').val();

  console.log(exStallNumber
 + exFullname);


  if(exDateFrom == "" || exDateTo == "")
  {
    Swal.fire({
      title: 'Error!',
      text: 'Pick a Date',
      icon: 'error',
      confirmButtonText: 'Ok'
    })
  }

  else{

    $.ajax({
      url : global.settings.url +'/MainController/getTransactByStallExcel',
      type : 'POST',
      data :{exCustomerId:exCustomerId, exStallNumber:exStallNumber, exDateFrom:exDateFrom, exDateTo:exDateTo},
      dataType : 'json',
      success : function(data){

          window.open(global.settings.url + '/pages/view/printTransactByStall', '_blank');

      },
      error : function(xhr){

      }

    });


  }



});
