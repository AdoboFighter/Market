$(document).ready(function(){


  console.log('check');

  $('#login_account').submit(function(e){
    e.preventDefault();



    $.ajax({
      url : global.settings.url + '/Pages/login_acc',
      type : 'POST',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(res){

        console.log(res.user_id);

        if(res.flag == 1)
        {
          location.href = global.settings.url + '/pages/view/home';
        }
        else if(res == 'usernameError'){
          Swal.fire({
            icon: 'error',
            title: 'Wrong Credentials',
            text: 'Username not found'
          });
        }
        else if(res == 'passwordError'){
          Swal.fire({
            icon: 'error',
            title: 'Wrong Credentials',
            text: 'password does not match'
          });
        }


      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    })

  });

});
