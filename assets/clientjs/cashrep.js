var datable;
var conCollectorName;
var conDateFrom;
var conDateTo;
var conClientType;

var exCollector;
var exDateFrom;
var exDateTo;
var exClientType;


$(document).ready(function(){

  $.ajax({
    url: global.settings.url +'/MainController/fetch_user',
    type:'POST',
    success:function(data)
    {

      console.log(data);
      data = JSON.parse(data);

      data.forEach(function(e, i){
        // $('#user_select').append($('<option><option/>').val(e.user_id).text(e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname));
        $('#collector_name').append(new Option((e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname), (e.user_id)));
      });
    }
  });


  $('#collector_name').change(function(){
    conCollectorName = $(this).val();
    $('#tablecon').dataTable().fnDestroy();
    loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName);
  });

  $('#date_from').change(function(){
    conDateFrom = $(this).val();
    $('#tablecon').dataTable().fnDestroy();
    loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName);
  });

  $('#date_to').change(function(){
    conDateTo = $(this).val();
    $('#tablecon').dataTable().fnDestroy();
    loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName);
  });

  $('#client_type').change(function(){
    conClientType = $(this).val();
    $('#tablecon').dataTable().fnDestroy();
    loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName);
  })


  function loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName){

  $.ajax({
    url: global.settings.url + '/MainController/cashrepbackend',
    type: 'POST',
    data: {conClientType:conClientType,conDateFrom:conDateFrom,conCollectorName:conCollectorName,conDateTo:conDateTo},
    dataType:'JSON',
    success: function(res){
      console.log(res);




    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
  }






   function loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName){

    $('#tablecon').DataTable({
      "ajax" : {
        type: "POST",
         data: {conClientType:conClientType,conDateFrom:conDateFrom,conCollectorName:conCollectorName,conDateTo:conDateTo},
        "url" : global.settings.url + '/MainController/cashrepbackend',
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



}

loaddatatable(conClientType,conDateTo,conDateFrom,conCollectorName);

  getCollector();






});

$('#genrep').click(function(){

  exCollector = $('#collector_name').val();
  exDateFrom = $('#date_from').val();
  exDateTo = $('#date_to').val();
  exClientType = $('#client_type').val();

  if(exDateFrom == "" || exDateTo == "")
  {
    Swal.fire({
      title: 'Error!',
      text: 'Pick a Date',
      icon: 'error',
      confirmButtonText: 'Ok'
    })
  }
  else
  {
    $.ajax({
      url : global.settings.url +'/MainController/getconsexcel',
      type : 'POST',
      data :{exCollector:exCollector, exDateFrom:exDateFrom, exDateTo:exDateTo, exClientType:exClientType},
      dataType : 'json',
      success : function(data){



          window.open(global.settings.url + '/pages/view/print', '_blank');


      },
      error : function(xhr){

      }

    });

  }



});


function getCollector()
{


  $.ajax({
    url : global.settings.url +'/MainController/getCollector',
    type : 'POST',
    data :$(this).serialize(),
    dataType : 'json',
    success : function(data){

      html_option = "";
      $.each(data, function(i, collector){

        html_option += "<option value = '"+collector.user_id+"'>"+collector.fullname+"</option>";


    });
    $("#collector_name").append(html_option);
    $('#collector').text('Select Collector');

    },
    error : function(xhr){

    }

  });
}