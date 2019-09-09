// var base_url = window.location.origin + '/Market/';
// clienttypepay();
//
// var clientselect  =  document.getElementById("clientselect");
// var clientselectvalue1 = clientselect.options[clientselect.selectedIndex].value;
//
// var tableNoStall = document.getElementById("tableNoStall");
// var tableTenant = document.getElementById("tableTenant");
// tableTenant.style.display = "";
// tableNoStall.style.display = "";
// clienttypepay(clientselectvalue1);
var datable;
$(document).ready(function(){

  $("transact").submit(function(e){
        e.preventDefault();
    });

  $('#paymentcard').hide();

  $('#activatebtn').on('click', function(){

    $('#paymentcard').show();
  });

console.log('good');

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
// function clienttypepay(clientselectvalue){
//
//   if (clientselectvalue == "tenant") {
//       tableNoStall.style.display = "none";
//       tableTenant.style.display = "";
//
//
//   } else if (clientselectvalue == "Ambulant"){
//     tableNoStall.style.display = "";
//     tableTenant.style.display = "none";
//
//
//
//   } else if (clientselectvalue == "delivery"){
//     tableNoStall.style.display = "";
//     tableTenant.style.display = "none";
//
//
//   } else if (clientselectvalue == "parking"){
//     tableNoStall.style.display = "";
//     tableTenant.style.display = "none";
//   } else {
//     tableNoStall.style.display = "";
//     tableTenant.style.display = "none";
//   }
//
//
// }




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
    $('#stall_num').val(res.Stall_Number );
    $('#ownerField').val(res.OFirstname + ' '+ res.OMiddlename +' ' + res.OLastname)
    $('#areaField').val(res.Sqaure_meters);
    $('#addressField').val(res.OAddress);

  },
  error: function(xhr){
    console.log(xhr.responseText);
  }

})


}
