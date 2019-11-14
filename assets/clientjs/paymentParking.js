var datable;

var add_line = [];
var row_num = 1;
var row_id = 0;

var total = 0;
var num1;
var num2;
var num3;
var num4;
var num5; 
var num6;
var num7;
var num8;

var particulars = [];
var customer_id;
var parking_id;
var type_of_payment;
var or_number;
var amount_to_pay;
var cash_tendered;
var payment_effectivity;
var stall_no;

var transaction_id;

$(document).ready(function(){


  $('#ParkingTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getparkingpaytablecon',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "pay_driver_id"
      },

      {
        "data" : "pay_parking_lot"
      },

      {
        "data" : "pay_parking_name"
      },

      {
        "data" : "btn"
      }]
    });
    $('.dataTables_length').addClass('bs-select');
  });



  function fetchdata(id){
    $('#parkingPay').modal("show");
    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/getparkingpay',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];

        $('#paymentDet').hide();
        $('#chequeDetails').hide();
        $('#payment_type').val(null);

        $('.payment_details').val('');
        $('.rowrow').remove();  
        $('#payment_cheque_number').val("");
        $('#payment_cheque_amount').val("");
        $('#payment_bank_branch').val("");

        $('#payment_customer_id').val(res.customer_id );
        $('#payment_name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
        $('#payment_driver_id').val(res.driver_id);
        $('#payment_parking_lot_no').val(res.lot_no);
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }



  
  $('#add_cheque').on('click', function () {
    var table_cheque = $('#table_cheque').DataTable();
    
   

    if (row_num >= 4) {
      
    } else {
      // table_cheque.row.add([
      //   cheq_number,
      //   cheq_amount,
      //   bank_branch,
      //   '<button type="button" class="btn btn-danger" id="Delete-btn">Delete</button> '
      // ]).draw(false);

          add_line.push({
            'ch[cheque_number]' : $('#payment_cheque_number').val(),
            'ch[cheque_amount]' : $('#payment_cheque_amount').val(),
            'ch[bank_branch]' :  $('#payment_bank_branch').val(),
            'ch[fk_stall_no]' :  stall_no
          });

 
         "use strict";
        	var table = document.getElementById("table_cheque");
          var row= document.createElement("tr");
          row.setAttribute('id','row'+row_id);
          row.setAttribute('class','rowrow');
        	var td1 = document.createElement("td");
        	var td2 = document.createElement("td");
        	var td3 = document.createElement("td");
        	var td4 = document.createElement("td");
          td1.innerHTML = document.getElementById("payment_cheque_number").value;
        	td2.innerHTML  = document.getElementById("payment_cheque_amount").value;
        	td3.innerHTML  = document.getElementById("payment_bank_branch").value;
          td4.innerHTML  = '<button type="button" class="btn_delete btn btn-danger " id="'+row_id+'">Delete</button>';
          row.appendChild(td1);
        	row.appendChild(td2);
        	row.appendChild(td3);
        	row.appendChild(td4);
          table.children[0].appendChild(row);
          row_id++;
          row_num++;
   
    }

  });





  $(document).on('click', '.btn_delete', function(){

    var a = $(this).attr("id");
 
    row_num--;
    delete add_line[a];
    $('#row'+a+'').remove();  



  });



  function particular(){

 

    if($('#part1num').val() == ""){
      num1 = 0;
    }
    else{
      num1 = $('#part1num').val();
    }
  
    if($('#part2num').val() == ""){
      num2 = 0;
    }
    else{
      num2 = $('#part2num').val();
    }
  
    if($('#part3num').val() == ""){
      num3 = 0;
    }
    else{
      num3 = $('#part3num').val();
    }
  
    if($('#part4num').val() == ""){
      num4 = 0;
    }
    else{
      num4 = $('#part4num').val();
    }
  
    if($('#part5num').val() == ""){
      num5 = 0;
    }
    else{
      num5 = $('#part5num').val();
    }
  
    if($('#part6num').val() == ""){
      num6 = 0;
    }
    else{
      num6 = $('#part6num').val();
    }
  
    if($('#part7num').val() == ""){
      num7 = 0;
    }
    else{
      num7 = $('#part7num').val();
    }
  
    
  
  
   
   
    
  
    total = parseInt(num1) + parseInt(num2) + parseInt(num3) + parseInt(num4) + parseInt(num5) + parseInt(num6) + parseInt(num7);
   
   
  }
  
  $('#sub_total').click(function(){
    if($(this).is(":checked")){
      particular();
      $('#total').val(total);
  }
  else if($(this).is(":not(:checked)")){
      $('#total').val($('#payment_cash_tendered').val()); 
  }
  });
  
  $('#payment_cash_tendered').change(function(){
    if($('#sub_total').is(":not(:checked)")){
      $('#total').val($('#payment_cash_tendered').val()); 
    }
    if($('#sub_total').is(":checked")){
      particular();
      $('#total').val(total);
    }
  });
  
  $('.partnum').change(function(){
    if($('#sub_total').is(":checked"))
    {
      particular();
      $('#total').val(total);
    }
  });
  
  
  $('#payment_type').change(function(){
  
    if($('#payment_type').val() == 'cash')
    {
      $('#paymentDet').show();
      $('#chequeDetails').hide();
      $('#payment_cash_tendered').prop('disabled',false);
    }
    else if($('#payment_type').val() == 'cheque'){
      $('#paymentDet').show();
      $('#chequeDetails').show();
      $('#payment_cash_tendered').prop('disabled',true);
    }
    else if($('#payment_type').val() == 'cashandcheque')
    {
      $('#paymentDet').show();
      $('#chequeDetails').show();
      $('#payment_cash_tendered').prop('disabled',false);
    }
    else{
      $('#paymentDet').hide();
      $('#chequeDetails').hide();
      $('#payment_cash_tendered').prop('disabled',true);
    }
  
  });


  $('#payment_submit').click(function(){

    customer_id = $('#payment_customer_id').val();
    parking_id = $('#payment_parking_id').val();
    type_of_payment = $('#payment_type_of_payment').val();
    or_number =$('#payment_or_number').val();
    amount_to_pay = $('#payment_amount_to_pay').val();
    cash_tendered = $('#payment_cash_tendered').val();
    payment_effectivity = $('#payment_effectivity').val();
   var fund_id = 1;
    var payment_type = $('#payment_type').val();
 
   
 
    add_line = add_line.filter(function(el){
     return el != null;
   });  
 
  
 
 
   switch(payment_type)
   {
     case "cash":
         $.ajax({
           type: "POST",
           data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,parking_id:parking_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
           url: global.settings.url +'/MainController/savetransaction',
           success: function(res){
             $('#parkingPay').modal("hide");
           },
           error: function(res){
            
           }
        });  
 
 
     break;
     case "cheque":
 
         $.ajax({
           type: "POST",
           data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,parking_id:parking_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
           url: global.settings.url +'/MainController/savetransaction',
           success: function(res){
 
            res= jQuery.parseJSON(res);
       
             transaction_id = res[0].transaction_id;
   
 
             for(var i = 0; i< add_line.length;i++)
             {
               
               add_line[i]['ch[fk_transaction_id]'] = transaction_id;
         
                 $.ajax({
                   type: "POST",
                   data: add_line[i],
                   url: global.settings.url +'/MainController/savecheque',
                   
                   success: function(res){
                     $('#parkingPay').modal("hide");
                   },
                   error: function(res){
                    
                   }
               });
             }
           },
           error: function(res){
          
           }
        });  
 
        
 
       
 
     break;
 
     case "cashandcheque":
 
 
       $.ajax({
         type: "POST",
         data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,parking_id:parking_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
         url: global.settings.url +'/MainController/savetransaction',
         success: function(res){
          res= jQuery.parseJSON(res);
       
          transaction_id = res[0].transaction_id;
           for(var i = 0; i< add_line.length;i++)
           {
 
             add_line[i]['ch[fk_transaction_id]'] = transaction_id;
               $.ajax({
                 type: "POST",
                 data: add_line[i],
                 url: global.settings.url +'/MainController/savecheque',
                 
                 success: function(res){
                   $('#parkingPay').modal("hide");
                 },
                 error: function(res){
                  
                 }
             });
           }
   
   
         },
         error: function(res){
        
         }
      });  
        
       
 
     break;
     default:
       alert("");
     break;
 
 
     customer_id = "";
     driver_id = "";
     type_of_payment = "";
     or_number = "";
     amount_to_pay = "";
     cash_tendered = "";
     payment_effectivity = "";
     fund_id = 1;
     payment_type = "";
    
  
 
 
   }
 });
