
function clear() {
  document.getElementById("save_customer").reset();
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
   
    $.ajax({
      url : global.settings.url +'/MainController/save_customer_controller',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
    
        $('#success').modal();
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});
