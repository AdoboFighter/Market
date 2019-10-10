var datable;
$(document).ready()

$(document).ready(function(){
  $( "#table_cheque" ).DataTable({
    "paging": false,
    "searching": false,
    "ordering": false
  });


    var counter = 1;
  $('#add_cheque').on('click', function () {

    var cheq_amount = $( "#cheqAmountField" ).val();
    var cheq_number = document.getElementById('cheqNumField').value;
    var bank_branch = document.getElementById('bankBranchField').value;
    var table_cheque = $('#table_cheque').DataTable();



    var row_num = table_cheque.rows().count();
    console.log(row_num);

    if (row_num >= 3) {
            $('#chequelimit').modal("show");
    } else {

      table_cheque.row.add([

          cheq_number,
          cheq_amount,
          bank_branch

      ]).draw(false);

    }
  });



  $('#cbCheque').on('checked',function(){
    $("#cheque").slidetoggle(200);
  });

  // sum();
  // $("#cashTendField, #amountToField, #cheqAmountField").on("keydown keyup", function() {
  //   sum();
  // });





  $('#cbCheque').on('change',function(){
    var payment = document.getElementById('cashTendField').value;
    var topay = document.getElementById('amountToField').value;
    var cheqAmountField = document.getElementById('cheqAmountField').value;
    var changecash = parseFloat(payment) - parseFloat(topay);
    var changecheque = parseFloat(payment) - parseFloat(topay);

    if( $(this).is(':checked') ){
      $('#cashTendField').attr('readonly','readonly');
      $('#cashTendField').val(0);
      $('#cashTendField').attr("placeholder", "Cheque");
      $('#cheque').toggle(200);

    }else{
      $('#cashTendField').val("0.00");
      $('#cashTendField').removeAttr('readonly');
      $("#cheque").hide();

    }
  });

  $("transact").submit(function(e){
    e.preventDefault();
  });
  $("#cheque").hide();
  $('#stall_number_field').hide();
  $('#paymentcard').hide();
  $('#clientIdField').hide();
  $('#cheque').hide();

  $('#activatebtn').on('click', function(){
    if ( $('#clientIdField').val().length === 0) {
      $('#failedActivation').modal("show");
    } else {
      $('#paymentcard').show();
    }


  });



  $('#tableNoStall').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/gettenanttable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "fullname"
    },

    {
      "data" : "add"
    },


    {
      "data" : "btn"
    }]
  });
  $('.dataTables_length').addClass('bs-select');

});
//
// function addtablecheque() {
//   $('#tableNoStall').DataTable({
//     "ajax" : {
//       "url" : global.settings.url + '/MainController/gettenanttable',
//       dataSrc : 'data'
//     },
//     "columns" : [{
//       "data" : "id"
//     },
//     {
//       "data" : "fullname"
//     },
//
//     {
//       "data" : "add"
//     },
//
//
//     {
//       "data" : "btn"
//     }]
//   });
//   $('.dataTables_length').addClass('bs-select');
//
//   });
//
// }

function addcheque() {
  var cheq_amount = document.getElementById('cheqAmountField').value;
  var cheq_number = document.getElementById('cheqNumField').value;
  var bank_branch = document.getElementById('bankBranchField').value;
  var table_cheque = $('#table_cheque').DataTable();
  var counter = 1;
  $('#add_cheque').on('click', function () {
    table_cheque.row.add([
        counter,
        cheq_number,
        cheq_amount,
        bank_branch
    ]).draw(false);
    counter++;
  });

    // $('#table_cheque').DataTable().ajax.reload();
    // $('#addRow').click();
}


// function sum() {
//   var payment = document.getElementById('cashTendField').value;
//   var topay = document.getElementById('amountToField').value;
//   var cheqAmountField = document.getElementById('cheqAmountField').value;
//   var change = parseFloat(payment) - parseFloat(topay);
//   // var chequeChange = parseFloat(payment) - parseFloat(topay);
//
//   if (!isNaN(change)) {
//     document.getElementById('change').value = change;
//   }
//
//
// }
//



function diffdates() {
  var dp1 = document.getElementById('last_pay').value;
  var daily = document.getElementById('daily_fee_field').value;
  // Split timestamp into [ Y, M, D, h, m, s ]
  var t = dp1.split(/[- :]/);

  // Apply each element to the Date function
  var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
  console.log(d);

  dp2 = new Date();
  var date2 = dp2.getTime();
  var ONE_DAY = 1000 * 60 * 60 * 24


  // get total seconds between two dates
  var res = Math.abs(d - date2) / 1000;
  var days = Math.floor(res / 86400);
  var debt = days * daily;
  document.getElementById('debt_field').value = debt;

  // console.log(days);
  // console.log(debt);

}

function fetchdata(id){
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getstallinfo',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];

      $('#clientIdField').val(res.customer_id );
      $('#stall_number_field').val(res.unit_no );
      $('#ownerField').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      $('#areaField').val(res.sqm);
      $('#daily_fee_field').val(res.dailyfee);
      $('#addressField').val(res.address);
      $('#last_pay').val(res.payment_datetime);
      diffdates();

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}



$(document).ready(function(){


  $('#transactform').submit(function(e){
    e.preventDefault();
    console.log( $('#transactform').serializeArray() );
    $.ajax({
      url : global.settings.url +'/MainController/savePayment',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
        $('#paymentsave').click(function(){
          alert($('input:Submit').val());  //display value of button
        });
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});
