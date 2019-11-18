
$(document).ready(function(){
  $('#saveAmb').submit(function(e){
  e.preventDefault();
  console.log( $('#saveAmb').serializeArray() );


  $.ajax({
       url : global.settings.url +'/MainController/saveambulant',
       type : 'POST',
       data : $(this).serialize(),
       dataType : 'json',
       success : function(res){
       console.log(res);
       Swal.fire({
         icon: 'success',
         title: 'Ambulant Added'
       });
       },
       error : function(xhr){
         console.log(xhr.responseText);
       }

     });


  });
});
