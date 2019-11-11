var datableTransaction;
var clientType;
var dateFrom;
var dateTo;

$(document).ready(function(){




  $("#client_type").on('change',function(){
    
     clientType = $(this).val();

   
     $('#tableNoStall').dataTable().fnDestroy();
     loadDataTable(clientType,dateFrom,dateTo);


  });

   $("#date_from").on('change',function(){
  
     dateFrom = $(this).val();
     
      $('#tableNoStall').dataTable().fnDestroy();
      loadDataTable(clientType,dateFrom,dateTo);

  });


   $("#date_to").on('change',function(){
  
    dateTo = $(this).val();
   
    $('#tableNoStall').dataTable().fnDestroy();
    loadDataTable(clientType,dateFrom,dateTo);

  });

  function loadDataTable(clientType,dateFrom,dateTo){
   
     $('#tableNoStall').DataTable({
      "ajax" : {
        type: "POST",
        data:{clientType:clientType,dateFrom:dateFrom,dateTo:dateTo},
        "url" : global.settings.url + '/MainController/gettransactiontable',
        dataSrc : 'data'
      },
      "columns" : [{
        "data" : "id"
      },
      {
        "data" : "trans_fullname"
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
 
  loadDataTable(clientType,dateFrom,dateTo)


})
 


  




  
  
  




