
$(document).ready(function(){
  $('#saveDelivery').submit(function(e){
  e.preventDefault();
  console.log( $('#saveDelivery').serializeArray() );


  $.ajax({
       url : global.settings.url +'/MainController/savedelivery',
       type : 'POST',
       data : $(this).serialize(),
       dataType : 'json',
       success : function(res){
       console.log(res);
       Swal.fire({
         icon: 'success',
         title: 'Delivery Client Added',
       });
       $('#saveDelivery')[0].reset();
       },
       error : function(xhr){
         console.log(xhr.responseText);
       }

     });


  });
});
