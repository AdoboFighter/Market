var datable;

$(document).ready(function(){


  $('#AmbulantTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getPayAmbulantTableCon',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "pay_ambu_name"
      },

      {
        "data" : "pay_ambu_location"
      },

      {
        "data" : "pay_ambu_locnum"
      },

      {
        "data" : "btn"
      }]
    });
    $('.dataTables_length').addClass('bs-select');




  });

  
 

  function fetchdata(id){
    $('.payment_details').val("");
    $('#AmbuPay').modal('show');
    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/getambuinfopay',
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
        $('#payment_location').val(res.location);
        $('#payment_location_number').val(res.location_no);
        // // $('#last_pay').val(res.payment_datetime);
        // // diffdates();
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }


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


  $('#payment_submit_button').click(function(){
    
    customer_id = $('#payment_customer_id').val();
    
    type_of_payment = $('#payment_type_of_payment').val();
    or_number =$('#payment_or_number').val();
    amount_to_pay = $('#payment_amount_to_pay').val();
    cash_tendered = $('#payment_cash_tendered').val();
    payment_effectivity = $('#payment_effectivity').val();
    var fund_id = 1;


    
    $.ajax({
      type: "POST",
      data:{fund_id:fund_id,customer_id:customer_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
      url: global.settings.url +'/MainController/savetransaction',
      success: function(res){
        $('.payment_details').val("");
        $('#AmbuPay').modal('hide');

      },
      error: function(res){
       
      }
   });  
 
  });


