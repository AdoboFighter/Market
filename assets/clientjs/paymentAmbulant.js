var datable;
var add_line = [];

$(document).ready(function(){

  $('#AmbulantTable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/AmbulantTable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "pay_ambu_location"
    },

    {
      "data" : "pay_ambu_locnum"
    },


    {
      "data" : "pay_ambu_name"
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
