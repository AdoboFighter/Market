// var base_url = window.location.origin + '/Market/';
var ambulant_div = document.getElementById("ambulant_div");
var stall_div = document.getElementById("stall_div");
var stall_div2 = document.getElementById("stall_fields2");

var firstnamef  = document.getElementById("fname").value;
var middlenamef = document.getElementById("mname").value;
var lastnamef = document.getElementById("lname").value;
var addressf = document.getElementById("add").value;
var contactf = document.getElementById("cont").value;

var ofirstnamef  = document.getElementById("ofname");
var omiddlenamef = document.getElementById("omname");
var olastnamef = document.getElementById("olname");
var oaddressf = document.getElementById("oadd");
var ocontactf = document.getElementById("ocont");

start();

function start() {
  stall_div.style.display = "none";
  stall_div2.style.display = "none";
  ambulant_div.style.display = "none";
}
function clear() {
  document.getElementById("save_customer").reset();
}

function copyfield() {


}

$(document).ready(function(){
  $('#sameas').on('change',function(){


    if( $(this).is(':checked') ){
      document.getElementById("ofname").value = firstnamef;


    }else{
      document.getElementById("ofname").value = "";

    }
  });
});




function clienttype() {
  var clientselect  =  document.getElementById("clientselect");
  var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;

  if (clientselectvalue == "0") {
    ambulant_div.style.display = "none";
    stall_div.style.display = "block";
    stall_div2.style.display = "block";



  } else if (clientselectvalue == "1"){
    stall_div.style.display = "none";
    stall_div2.style.display = "none";
    ambulant_div.style.display = "block";


  } else if (clientselectvalue == "2"){
    stall_div.style.display = "none";
    stall_div2.style.display = "none";
    ambulant_div.style.display = "none";



  } else if (clientselectvalue == "3"){
    stall_div.style.display = "none";
    stall_div2.style.display = "none";
    ambulant_div.style.display = "none";

  } else {
    stall_div.style.display = "none";
    stall_div2.style.display = "none";
    ambulant_div.style.display = "none";
  }

}

function updatefield() {
  var firstnamef  = document.getElementById("fname").value;
  var middlenamef = document.getElementById("mname").value;
  var lastnamef = document.getElementById("lname").value;
  var addressf = document.getElementById("add").value;
  var contactf = document.getElementById("cont").value;

  var ofirstnamef  = document.getElementById("ofname");
  var omiddlenamef = document.getElementById("omname");
  var olastnamef = document.getElementById("olname");
  var oaddressf = document.getElementById("oadd");
  var ocontactf = document.getElementById("ocont");

  document.getElementById("ofname").value = firstnamef;
  document.getElementById("omname").value = middlenamef;
  document.getElementById("olname").value = lastnamef;
  document.getElementById("oadd").value = addressf;
  document.getElementById("ocont").value = contactf;
}

$(document).ready(function(){


  $('#sameas').on('change',function(){


    if( $(this).is(':checked') ){
      // $("#fname, #mname, #lname, #add, #cont").on("keydown keyup", function() {
      //   updatefield();
      // });
      // $('#ofname').attr('readonly','readonly');
      // $('#omname').attr('readonly','readonly');
      // $('#olname').attr('readonly','readonly');
      // $('#oadd').attr('readonly','readonly');
      // $('#ocont').attr('readonly','readonly');
      updatefield();
    }else{
      $("#fname, #mname, #lname, #add, #cont").unbind("keydown keyup", function() {
        document.getElementById("ofname").onkeyup = null;
      });
      $('#ofname').removeAttr('readonly');
      $('#omname').removeAttr('readonly');
      $('#olname').removeAttr('readonly');
      $('#oadd').removeAttr('readonly');
      $('#ocont').removeAttr('readonly');
      document.getElementById("ofname").onkeyup = null;
      document.getElementById('omname').onkeyup = null;
      document.getElementById('olname').onkeyup = null;
      document.getElementById('oadd').onkeyup = null;
      document.getElementById("ocont").onkeyup = null;

      document.getElementById("ofname").value = "";
      document.getElementById("omname").value = "";
      document.getElementById("olname").value = "";
      document.getElementById("oadd").value = "";
      document.getElementById("ocont").value = "";
    }
  });

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
