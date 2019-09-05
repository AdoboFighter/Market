var base_url = window.location.origin + '/Market/';
$(document).ready(function(){
console.log(base_url);
$('#saveSysUser').submit(function(e){
e.preventDefault();
console.log( $('#saveSysUser').serializeArray() );


$.ajax({
     url : base_url +'/MainController/saveSysUser',
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
