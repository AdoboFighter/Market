$(document).ready(function(){
var base_url = window.location.origin + '/Market/';

console.log(base_url);
$('#saveclient').submit(function(e){
e.preventDefault();

console.log( $('#saveclient').serializeArray() );
    $.ajax({
      url : base_url +'/MainController/saveclient',
      type : 'POST',
      data : $(this).serialize(),
      dataType : 'json',
      success : function(res){
        console.log(res);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });




});




});
