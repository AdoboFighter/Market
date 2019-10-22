// var base_url = window.location.origin + '/Market/';

$(document).ready(function(){
  $('#savePark').submit(function(e){
  e.preventDefault();
  console.log( $('#savePark').serializeArray() );


  $.ajax({
       url : global.settings.url +'/MainController/saveparking',
       type : 'POST',
       data : $(this).serialize(),
       dataType : 'json',
       success : function(res){
       console.log(res);
         $('#success').modal("show");
       },
       error : function(xhr){
         console.log(xhr.responseText);
       }

     });


  });
});
