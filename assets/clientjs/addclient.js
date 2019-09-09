// var base_url = window.location.origin + '/Market/';

function clienttype() {
    var clientselect  =  document.getElementById("clientselect");
    var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;

    var ambuform = document.getElementById("ambulantform");
    var stallform = document.getElementById("stallform");




      if (clientselectvalue == "tenant") {
          ambuform.style.display = "none";
          stallform.style.display = "block";



      } else if (clientselectvalue == "Ambulant"){
        stallform.style.display = "none";
        ambuform.style.display = "block";


      } else if (clientselectvalue == "delivery"){
        stallform.style.display = "none";
        ambuform.style.display = "none";



      } else if (clientselectvalue == "parking"){
        stallform.style.display = "none";
        ambuform.style.display = "none";
      } else {
        stallform.style.display = "none";
        ambuform.style.display = "none";
      }

}

$(document).ready(function(){
var clientselect  =  document.getElementById("clientselect");
var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;


$('#saveclient').submit(function(e){
e.preventDefault();

console.log( $('#saveclient').serializeArray() );


$.ajax({
     url : global.settings.url +'/MainController/saveclient',
     type : 'POST',
     data : $(this).serialize(),
     dataType : 'json',
     success : function(res){
     console.log(res);

    switch ($('#clientselect').val()) {
      case 'tenant':
        savetenant(res);
        $('#success').modal("show");
      break;

      case 'Ambulant':
        saveambulant(res);
        $('#success').modal("show");
      break;

      case 'delivery':
        savedelivery(res);
        $('#success').modal("show");
      break;

      case 'parking':
        saveparking(res);
        $('#success').modal("show");
      break;

      default:

    }
    if(res.error)
    {
     if(res.fname_error != '')
     {
      $('#fname_error').html(res.fname_error);
     }
     else
     {
      $('#fname_error').html('');
     }

    }

    if(res.success)
    {
     $('#success_message').html(res.success);
     $('#fname_error').html('');
     $('#saveclient')[0].reset();
    }
    $('#submit_client').attr('disabled', false);




     },
     error : function(xhr){
            console.log(    $('#clientselect').val() );
       console.log(xhr.responseText);
     }

   });


});

});


function saveambulant(id){

  $.ajax({
       url : global.settings.url +'/MainController/saveambulant',
       type : 'POST',
       data :{
            "data":{
              "id": id,
                          "location" : $('#amlocation').val(),
                            "locationNum" : $('#amnum').val()
            }
       },
       dataType : 'json',
       success : function(res){
       console.log(res);
       },error: function(xhr){


         console.log(xhr.responseText);
       }


});
}



function savetenant(id){

  $.ajax({
       url : global.settings.url +'/MainController/savetenant',
       type : 'POST',
       data :{
            "data":{
              "id": id,
                          "stallNum" : $('#stallf_num').val(),
                          "bussid" : $('#stallf_buss_id').val(),
                          "bussname" : $('#stallf_buss_name').val(),
                          "Floor_level" : $('#stall_flr_lvl').val(),
                          "dailyfee" : $('#stallf_daily_fee').val(),
                          "squaremeter" : $('#stall_sqr_m').val(),
                          "dateOc" : $('#stallf_date_ocu').val()
            }
       },
       dataType : 'json',
       success : function(res){

       console.log(res);
       },error: function(xhr){


         console.log(xhr.responseText);
       }


});
}

function saveparking(id){

  $.ajax({
       url : global.settings.url +'/MainController/saveparking',
       type : 'POST',
       data :{
            "data":{
              "id": id,
            }
       },
       dataType : 'json',
       success : function(res){
console.log(res);
       },error: function(xhr){


         console.log(xhr.responseText);
       }


});
}

function savedelivery(id){

  $.ajax({
       url : global.settings.url +'/MainController/savedelivery',
       type : 'POST',
       data :{
            "data":{
              "id": id,
            }
       },
       dataType : 'json',
       success : function(res){
console.log(res);
       },error: function(xhr){


         console.log(xhr.responseText);
       }


});
}

(function() {
 'use strict';
  window.addEventListener('load', function() {
   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   var forms = document.getElementsByClassName('saveclient');
   // Loop over them and prevent submission
   var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
       if (form.checkValidity() === false) {
         event.preventDefault();
         event.stopPropagation();
       }
        else if (form.checkValidity() == true) {
           $('#success').modal("show");

           // stop form submit only for demo
           event.preventDefault();
        }
       form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
