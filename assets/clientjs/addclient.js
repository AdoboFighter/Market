var base_url = window.location.origin + '/Market/';

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


console.log(base_url);
$('#saveclient').submit(function(e){
e.preventDefault();

console.log( $('#saveclient').serializeArray() );

console.log( $('#ambulantform').serializeArray() );


$.ajax({
     url : base_url +'/MainController/saveclient',
     type : 'POST',
     data : $(this).serialize(),
     dataType : 'json',
     success : function(res){
       console.log(res);
switch ($('#clientselect').val()) {
  case 'tenant':
    savetenant(res);
  break;

  case 'Ambulant':
    saveambulant(res);
  break;

  case 'delivery':
    savedelivery(res);
  break;

  case 'parking':
    saveparking(res);
  break;

  default:

}


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
       url : base_url +'/MainController/saveambulant',
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
       url : base_url +'/MainController/savetenant',
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
       url : base_url +'/MainController/saveparking',
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
       url : base_url +'/MainController/savedelivery',
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
