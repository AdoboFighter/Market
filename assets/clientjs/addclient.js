// var base_url = window.location.origin + '/Market/';

function clienttype() {
  var clientselect  =  document.getElementById("clientselect");
  var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;

  var ambulant_div = document.getElementById("ambulant_div");
  var stall_div = document.getElementById("stall_div");




  if (clientselectvalue == "tenant") {
    ambulant_div.style.display = "none";
    stall_div.style.display = "block";



  } else if (clientselectvalue == "Ambulant"){
    stall_div.style.display = "none";
    ambulant_div.style.display = "block";


  } else if (clientselectvalue == "delivery"){
    stall_div.style.display = "none";
    ambulant_div.style.display = "none";



  } else if (clientselectvalue == "parking"){
    stall_div.style.display = "none";
    ambulant_div.style.display = "none";
  } else {
    stall_div.style.display = "none";
    ambulant_div.style.display = "none";
  }

}
$(document).ready(function(){


  $('#save_customer').submit(function(e){
    e.preventDefault();
    console.log( $('#save_customer').serializeArray() );
    $.ajax({
      url : global.settings.url +'/MainController/save_customer_controller',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});

//
// function saveambulant(id){
//
//   $.ajax({
//     url : global.settings.url +'/MainController/saveambulant',
//     type : 'POST',
//     data :{
//
//         "id": id,
//         "location" : $('#amlocation').val(),
//         "locationNum" : $('#amnum').val()
//
//     },
//     dataType : 'json',
//     success : function(res){
//       console.log(res);
//     },error: function(xhr){
//       console.log(xhr.responseText);
//     }
//
//
//   });
// }
//
//
//
// function save_tenant(id){
//
//   $.ajax({
//     url : global.settings.url +'/MainController/savetenant',
//     type : 'POST',
//     data :{
//       "data":{
//         "fk_customer_id": id,
//         "business_id" : $('#').val(),
//         "business_name" : $('#').val()
//       }
//     },
//     dataType : 'json',
//     success : function(res){
//
//       console.log(res);
//     },error: function(xhr){
//       console.log(xhr.responseText);
//     }
//   });
// }
//
// function save_stall(id){
//
//   $.ajax({
//     url : global.settings.url +'/MainController/savetenant',
//     type : 'POST',
//     data :{
//       "data":{
//         "id": id,
//         "stall_number" : $('#').val(),
//         "tenant_id" : $('#').val(),
//         "section" : $('#').val(),
//         "square_meter" : $('#').val(),
//         "daily_fee" : $('#').val()
//       }
//     },
//     dataType : 'json',
//     success : function(res){
//
//       console.log(res);
//     },error: function(xhr){
//
//
//       console.log(xhr.responseText);
//     }
//
//
//   });
// }
//
// function saveparking(id){
//
//   $.ajax({
//     url : global.settings.url +'/MainController/saveparking',
//     type : 'POST',
//     data :{
//       "data":{
//         "id": id,
//       }
//     },
//     dataType : 'json',
//     success : function(res){
//       console.log(res);
//     },error: function(xhr){
//
//
//       console.log(xhr.responseText);
//     }
//
//
//   });
// }
//
// function savedelivery(id){
//
//   $.ajax({
//     url : global.settings.url +'/MainController/savedelivery',
//     type : 'POST',
//     data :{
//       "data":{
//         "id": id,
//       }
//     },
//     dataType : 'json',
//     success : function(res){
//       console.log(res);
//     },error: function(xhr){
//
//
//       console.log(xhr.responseText);
//     }
//
//
//   });
// }

// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.getElementsByClassName('saveclient');
//     // Loop over them and prevent submission
//     var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//         if (form.checkValidity() === false) {
//           event.preventDefault();
//           event.stopPropagation();
//         }
//         else if (form.checkValidity() == true) {
//           $('#success').modal("show");
//
//           // stop form submit only for demo
//           event.preventDefault();
//         }
//         form.classList.add('was-validated');
//       }, false);
//     });
//   }, false);
// })();
