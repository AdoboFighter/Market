
$(document).ready(function(){
  (function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    };
  }(jQuery));

  $("#cont").inputFilter(function(value){
    return /^-?\d*$/.test(value);
  });


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
