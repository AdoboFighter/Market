function clienttype() {
    var clientselect  =  document.getElementById("clientselect");
    var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;

    var location =  document.getElementById("location");
    var dateOc =  document.getElementById("dateOc");
    var stallNum =  document.getElementById("stallNum");
    var dailyfee =  document.getElementById("dailyfee");
    var squaremeter =  document.getElementById("squaremeter");
    var floorlevel =  document.getElementById("floorlevel");
    var bussid =  document.getElementById("bussid");
    var bussname =  document.getElementById("bussname");
    var ambuform = document.getElementById("ambulantform");


      if (clientselectvalue == "tenant") {
          dateOc.style.display = "block";
          stallNum.style.display = "block";
          dailyfee.style.display = "block";
          squaremeter.style.display = "block";
          floorlevel.style.display = "block";
          bussid.style.display = "block";
          bussname.style.display = "block";
          ambuform.style.display = "block";


          location.style.display = "none";
          locationNum.style.display = "none";


      } else if (clientselectvalue == "Ambulant"){
        dateOc.style.display = "none";
        stallNum.style.display = "none";
        dailyfee.style.display = "none";
        squaremeter.style.display = "none";
        floorlevel.style.display = "none";
        bussid.style.display = "none";
        bussname.style.display = "none";
        location.style.display = "block";
        locationNum.style.display = "block";


      } else if (clientselectvalue == "delivery"){
        dateOc.style.display = "none";
        stallNum.style.display = "none";
        dailyfee.style.display = "none";
        squaremeter.style.display = "none";
        floorlevel.style.display = "none";
        bussid.style.display = "none";
        bussname.style.display = "none";
        location.style.display = "none";
        locationNum.style.display = "none";
        ambuform.style.display = "block";


      } else if (clientselectvalue == "parking"){
        dateOc.style.display = "none";
        stallNum.style.display = "none";
        dailyfee.style.display = "none";
        squaremeter.style.display = "none";
        floorlevel.style.display = "none";
        bussid.style.display = "none";
        bussname.style.display = "none";
        location.style.display = "none";
        locationNum.style.display = "none";
        ambuform.style.display = "block";
      }

}

$(document).ready(function(){
var clientselect  =  document.getElementById("clientselect");
var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;
var base_url = window.location.origin + '/Market/';

console.log(base_url);
$('#saveclient').submit(function(e){
e.preventDefault();

console.log( $('#saveclient').serializeArray() );
$.ajax({
     url : base_url +'/MainController/saveclient',
     type : 'POST',
     data : $(this).serialize(),
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
