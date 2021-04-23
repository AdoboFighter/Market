function test() {

}

$('#testrefnum').submit(function(e){
  e.preventDefault();

  $.ajax({
    url : global.settings.url +'/MainController/testrefnumphp',
    type : 'POST',
    data :$(this).serialize(),
    dataType : 'json',
    success : function(res){
      console.log(res);
      Swal.fire({
        icon: 'success',
        title: 'Test OK'
      });
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }

  });

});
