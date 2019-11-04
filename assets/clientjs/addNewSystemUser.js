$(document).ready(function(){

  $('#saveSysUser').submit(function(e){
    e.preventDefault();
    var pass1 = document.getElementById('pass1').value;
    var pass2 =document.getElementById('pass2').value;
    if(pass1 != '' && pass1 != pass2) {
      $('#passerror').modal("show");
    }else {
      console.log( $('#saveSysUser').serializeArray() );
      $.ajax({
        url : global.settings.url +'/MainController/saveSysUser',
        type : 'POST',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(res){
          console.log(res);

          if (res == 'taken') {
            $('#usererror').modal("show");
          }
          if (res == 'okay') {
            $('#success').modal("show");
          }


        },
        error : function(xhr){
          console.log(xhr.responseText);
        }
      });

    }


  });






});

// $('#passerror').modal("show");
// $('#usererror').modal("show");
