
function clear() {
  document.getElementById("save_customer").reset();
}

$(document).ready(function(){
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
        $('#success').modal();
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }

    });

  });
});
