$(document).ready(function(){

  $('#login_account').submit(function(e){
    e.preventDefault();

    $.ajax({
      url : global.settings.url + '/Pages/login_acc',
      type : 'POST',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
        /*
        data: Array(2)
        //this is the result array from the query check Mainmodel function login_acc
        0: {sysuser_id: "1", firstname: "kenneth", middlename: "cordez", lastname: "hilairon", username: "ken", …}
        1: {sysuser_id: "2", firstname: "kenneth", middlename: "cordez", lastname: "hilairon", username: "ken", …}
        message: "Login Success : ken"

        use this for validation
        response: true
        */
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    })

  });

});
