$(document).ready(function(){

  $('#saveSysUser').submit(function(e){
    e.preventDefault();
    var pass1 = document.getElementById('pass1').value;
    var pass2 =document.getElementById('pass2').value;
    if(pass1 != '' && pass1 != pass2) {
      Swal.fire({
        icon: 'error',
        title: 'Password does not match',
      });
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
            Swal.fire({
              icon: 'error',
              title: 'Username Already Taken',
            });
          }
          if (res == 'okay') {
            Swal.fire({
              icon: 'success',
              title: 'System User Added',
            });
          }


        },
        error : function(xhr){
          console.log(xhr.responseText);
        }
      });

    }


  });






});
