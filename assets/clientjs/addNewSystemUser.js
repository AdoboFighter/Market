$(document).ready(function(){

  $('#saveSysUser').submit(function(e){
    e.preventDefault();
    console.log( $('#saveSysUser').serializeArray() );
    $.ajax({
      url : global.settings.url +'/MainController/saveSysUser',
      type : 'POST',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(res){
  
        $('#success').modal("show");

      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });


  });




});

// $('#passerror').modal("show");
// $('#usererror').modal("show");
