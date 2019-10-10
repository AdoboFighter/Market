var datable;

$(document).ready(function(){
  $( "#table_cheque" ).DataTable();

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






});

function sum() {
  var payment = document.getElementById('cashTendField').value;
  var topay = document.getElementById('amountToField').value;
  var cheqAmountField = document.getElementById('cheqAmountField').value;
  var change = parseFloat(payment) - parseFloat(topay);
  // var chequeChange = parseFloat(payment) - parseFloat(topay);

  if (!isNaN(change)) {
    document.getElementById('change').value = change;
  }
}

function addcheque() {


    // $('#table_cheque').DataTable().ajax.reload();

}


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

function insert_cheque_bulk() {
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
