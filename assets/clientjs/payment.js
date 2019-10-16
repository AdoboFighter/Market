var datable;
var add_line_buss = [];

$(document).ready(function(){
  $( "#table_cheque" ).DataTable({
    "paging": false,
    "searching": false,
    "ordering": false
    // "ajax" : {
    //   "url" : global.settings.url + '/MainController/insert_table_bulk_controller',
    //   dataSrc : 'data',
    //   type : 'POST',
    //   data :$(this).serialize(),
    //   dataType : 'json',
    //   success : function(res){
    //     console.log(res);
    //
    //   },
    //   error : function(xhr){
    //     console.log(xhr.responseText);
    //     console.log('you fucking suck lol');
    //   }
    // },
    // "columns": [
    //   { "data": "cheque_number" },
    //   { "data": "cheque_amount" },
    //   { "data": "bank_branch" }
    // ]

  });


  $('#add_cheque').on('click', function () {
    var table_cheque = $('#table_cheque').DataTable();
    var row_num = table_cheque.rows().count();
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
        bank_branch,
        '<button type="button" class="btn btn-danger" id="Delete-btn">Delete</button> '
      ]).draw(false);

         //  add_line_buss.push({
         //    'trancsact[cheque_number]' : $('#cheque_number').val(),
         //    'trancsact[cheque_amount]' : $('#cheque_amount').val(),
         //    'trancsact[bank_branch]' :  $('#bank').val()
         //  });
         //
         //  console.log(add_line_buss);
         // "use strict";
        	// var table = document.getElementById("table_cheque");
        	// var row= document.createElement("tr");
        	// var td1 = document.createElement("td");
        	// var td2 = document.createElement("td");
        	// var td3 = document.createElement("td");
        	// var td4 = document.createElement("td");
         //  td1.innerHTML = document.getElementById("cheqAmountField").value;
        	// td2.innerHTML  = document.getElementById("cheqNumField").value;
        	// td3.innerHTML  = document.getElementById("bankBranchField").value;
         //  td4.innerHTML  = '<button type="button" class="btn btn-danger" id="Delete_btn">Delete</button>';
         //  row.appendChild(td1);
        	// row.appendChild(td2);
        	// row.appendChild(td3);
        	// row.appendChild(td4);
        	// table.children[0].appendChild(row);
    }

  });

  $('#table_cheque tbody').on( 'click', 'button', function () {
    var table_cheque = $('#table_cheque').DataTable();
    table_cheque
    .row( $(this).parents('tr'))
    .remove()
    .draw();
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
      $('#cbChequecash').prop("checked", false);
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

  $('#cbChequecash').on('change',function(){
    if( $(this).is(':checked') ){
      $('#cashTendField').removeAttr('readonly');
      $('#cbCheque').prop("checked", false);
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


  // var table = document.getElementById("table_cheque");
  $('#newbton').submit(function(e){
    e.preventDefault();

    var myTableArray = [];

    $("table#table_cheque tr").each(function() {
      var arrayOfThisRow = [];

      var tableData = $(this).find('td');
      if (tableData.length > 0) {
        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArray.push(arrayOfThisRow);
      }
    });

    console.log(myTableArray);

    for (var i = 0  ; i < myTableArray.length; i++) {

          console.log(myTableArray[i]);
              //
              // $.ajax({
              //   url: global.settings.url +'/MainController/insert_table_bulk_controller',
              //   method: 'POST',
              //   data: {myTableArray: myTableArray[i]},
              //   success : function(res){
              //     console.log(res);
              //   },
              //   error : function(xhr){
              //     console.log(xhr.responseText);
              //   }
              // });

    }





  });

  //
  $('#transactform').submit(function(e){

    e.preventDefault();
    //   console.log( $('#transactform').serializeArray() );
    //   $.ajax({
    //     url : global.settings.url +'/MainController/savePayment',
    //     type : 'POST',
    //     data :$(this).serialize(),
    //     dataType : 'json',
    // success : function(res){
    //   console.log(res);
    //   $('#paymentsave').click(function(){
    //     alert($('input:Submit').val());  //display value of button
    //   });
    // },
    // error : function(xhr){
    //   console.log(xhr.responseText);
    // }
    //
    //   });


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




function addlineaddRow() {

  add_line_buss.push({
    'sec[bus_code_id]' : $('#buss_code').val(),
    'sec[addline]' : $('#addline').val(),
    'sec[addcode]' : result2[0],
    'sec[addsubcat]' : $('#addsubcat').val().toUpperCase(),
    'sec[addcap]' : $('#addcap').val().replace(/,/g, ''),
    'sec[rank]' : 'secondary',
    'sec[es]' : $('#es').val(),
    'sec[nones]' : $('#nones').val()
  });

  console.log(add_line_buss);

 "use strict";
	var table = document.getElementById("addlinetable");

	var row= document.createElement("tr");
	var td1 = document.createElement("td");
	var td2 = document.createElement("td");
	var td3 = document.createElement("td");
	// var td4 = document.createElement("td");
	var td5 = document.createElement("td");
  var td6 = document.createElement("td");
  var td7 = document.createElement("td");
  var td8 = document.createElement("td");
  td1.innerHTML = document.getElementById("addline").value.toUpperCase();
  //td2.innerHTML = result.split(':');
	td2.innerHTML  =result2[0];
	td3.innerHTML  = document.getElementById("addsubcat").value;
	td5.innerHTML  = document.getElementById("addcap").value;
  td6.innerHTML  = document.getElementById("es").value;
  td7.innerHTML  = document.getElementById("nones").value;
  // td4.innerHTML  =  document.getElementsByClassName("adddate")[0].value;
  td8.innerHTML  = '<a class="btn btn-warning" onclick="addlinerowdelete(this)" >Delete</a>';

  row.appendChild(td1);
	row.appendChild(td2);
	row.appendChild(td3);
	// row.appendChild(td4);
	row.appendChild(td5);
  row.appendChild(td6);
  row.appendChild(td7);
  row.appendChild(td8);

	table.children[0].appendChild(row);
}
