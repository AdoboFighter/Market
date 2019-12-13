var datable;


$(document).ready(function(){

  $("#myid li").click(function() {
      alert(this.id); // id of clicked li by directly accessing DOMElement property
      alert($(this).attr('id')); // jQuery's .attr() method, same but more verbose
      alert($(this).html()); // gets innerHTML of clicked li
      alert($(this).text()); // gets text contents of clicked li
  });

});
