var datable;
var add_line = [];
var row_num = 1;
var row_id = 0;
var cheque_total = 0;
var cheque_total2 = 0;
var total = 0;
var num1;
var num2;
var num3;
var num4;
var num5;
var num6;
var num7;
var num8;

var text1;
var text2;
var text3;
var text4;
var text5;
var text6;
var text7;

var ntw;


var particulars = [];
var customer_id;
var tenant_id;
var type_of_payment;
var or_number;
var amount_to_pay;
var cash_tendered;
var payment_effectivity;
var stall_no;
var payment_name;
var payment_type;
var transaction_id;
var check_number = [];
var check_amount = [];
var check_date = [];
var bank = [];






// $(document).ready(function(){

  //change section -------------------------------------------------------------
  //change section -------------------------------------------------------------
  //change section -------------------------------------------------------------

  // function particular(){

  //   if($('#part1num').val() == ""){
  //     num1 = 0;
  //   }
  //   else{
  //     num1 = $('#part1num').val().replace(',', '');
  //   }

  //   if($('#part2num').val() == ""){
  //     num2 = 0;
  //   }
  //   else{
  //     num2 = $('#part2num').val().replace(',', '');
  //   }

  //   if($('#part3num').val() == ""){
  //     num3 = 0;
  //   }
  //   else{
  //     num3 = $('#part3num').val().replace(',', '');
  //   }

  //   if($('#part4num').val() == ""){
  //     num4 = 0;
  //   }
  //   else{
  //     num4 = $('#part4num').val().replace(',', '');
  //   }

  //   if($('#part5num').val() == ""){
  //     num5 = 0;
  //   }
  //   else{
  //     num5 = $('#part5num').val().replace(',', '');
  //   }

  //   if($('#part6num').val() == ""){
  //     num6 = 0;
  //   }
  //   else{
  //     num6 = $('#part6num').val().replace(',', '');
  //   }

  //   if($('#part7num').val() == ""){
  //     num7 = 0;
  //   }
  //   else{
  //     num7 = $('#part7num').val().replace(',', '');
  //   }

  //   total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) + parseFloat(num5) + parseFloat(num6) + parseFloat(num7);

  // }

  // $('#payment_cheque_amount').change(function(){
  //   if ($(this).val() == "") {
  //     console.log("hello nan");
  //   }else {
  //     var num = parseFloat($(this).val());
  //     $(this).val(createCommas(num.toFixed(2)));
  //   }
  //   });

  //   $('#payment_amount_to_pay2').change(function(){
  //     if ($(this).val() == "") {
  //       console.log("hello nan");
  //     }else {
  //       var num = parseFloat($(this).val());
  //       $(this).val(createCommas(num.toFixed(2)));
  //     }
  // });




  // $('#payment_amount_to_pay').change(function(){
  //   if ($(this).val() == "") {
  //     console.log("hello nan");
  //   }else {
  //     var num = parseFloat($(this).val());
  //     $(this).val(createCommas(num.toFixed(2)));
  //   }
  //
  //   if($('#sub_total').is(":not(:checked)")){
  //     $('#total').val($('#payment_amount_to_pay').val());
  //
  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //       // cash
  //       changeboth();
  //       totalamountgiven();
  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       changechequecash();
  //       totalamountgiven();
  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       changecheque();
  //       totalamountgiven();
  //     }
  //
  //     totalamountgiven();
  //
  //   }
  //   if($('#sub_total').is(":checked")){
  //     particular();
  //     if($('#payment_amount_to_pay').val() == ""){
  //       amount_to_pay = 0;
  //     }
  //     else
  //     {
  //       amount_to_pay = $('#payment_amount_to_pay').val();
  //     }
  //     // var totalcon = ;
  //     // var atpcon = ;
  //     total = parseFloat(total) + parseFloat(amount_to_pay);
  //     $('#total').val(total);
  //
  //
  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //       // cash
  //       changeboth();
  //       totalamountgiven();
  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       changechequecash();
  //       totalamountgiven();
  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       changecheque();
  //       totalamountgiven();
  //     }
  //
  //     totalamountgiven();
  //
  //   }
  //
  // });



  // function onchancgeparticular() {
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);
  // }

  // $('#sub_total').click(function(){
  //   if($(this).is(":checked")){
  //     particular();

  //     var numtotal = parseFloat(total);
  //     console.log(numtotal);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);
  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //       // cash
  //       changeboth();
  //       totalamountgiven();
  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       changechequecash();
  //       totalamountgiven();
  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       changecheque();
  //       totalamountgiven();
  //     }
  //   }

  //   else if($(this).is(":not(:checked)")){
  //     // $(this).val(parseFloat($(this).val()).toFixed(2));
  //     $('#total').val(0);

  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //       // cash
  //       changeboth();
  //       totalamountgiven();
  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       changechequecash();
  //       totalamountgiven();
  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       changecheque();
  //       totalamountgiven();
  //     }

  //   }
  // });

  //change section -------------------------------------------------------------
  //change section -------------------------------------------------------------
  //change section -------------------------------------------------------------


  // $( "#add_row1" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row1");
  // });

  // $( "#add_row2" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row2");
  // });

  // $( "#add_row3" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row3");
  // });

  // $( "#add_row4" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row4");
  // });

  // $( "#add_row5" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row5");
  // });

  // $( "#add_row6" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row6");
  // });

  // $( "#add_row7" ).click(function() {
  //   $('#add_item_window').modal("show");
  //   $('#what_row').val("row7");
  // });

  // $("#del_row1").click(function() {
  //   $("#part1text").val(null);
  //   $("#payment_effectivity1" ).val(null);
  //   $("#part1num").val(null);
  //   $('#paytype_id1').val(null);

  //   $("#part1text").prop("disabled", false );
  //   $("#payment_effectivity1").prop( "disabled", false );
  //   $("#part1num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);

  //   if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //     // cash
  //     changeboth();
  //     totalamountgiven();
  //   }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //     // cash and cheque
  //     changechequecash();
  //     totalamountgiven();
  //   }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //     //cheque only
  //     changecheque();
  //     totalamountgiven();
  //   }

  // });

  // $("#del_row2").click(function() {
  //   $("#part2text").val(null);
  //   $("#payment_effectivity2" ).val(null);
  //   $("#part2num").val(null);
  //   $('#paytype_id2').val(null);

  //   $("#part2text").prop("disabled", false );
  //   $("#payment_effectivity2").prop( "disabled", false );
  //   $("#part2num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);
  // });

  // $("#del_row3").click(function() {
  //   $("#part3text").val(null);
  //   $("#payment_effectivity3" ).val(null);
  //   $("#part3num").val(null);
  //   $('#paytype_id3').val(null);

  //   $("#part3text").prop("disabled", false );
  //   $("#payment_effectivity3").prop( "disabled", false );
  //   $("#part3num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);
  // });

  // $("#del_row4").click(function() {
  //   $("#part4text").val(null);
  //   $("#payment_effectivity4" ).val(null);
  //   $("#part4num").val(null);
  //   $('#paytype_id4').val(null);

  //   $("#part4text").prop("disabled", false );
  //   $("#payment_effectivity4").prop( "disabled", false );
  //   $("#part4num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);

  // });

  // $("#del_row5").click(function() {
  //   $("#part5text").val(null);
  //   $("#payment_effectivity5" ).val(null);
  //   $("#part5num").val(null);
  //   $('#paytype_id5').val(null);

  //   $("#part5text").prop("disabled", false );
  //   $("#payment_effectivity5").prop( "disabled", false );
  //   $("#part5num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);

  // });

  // $("#del_row6").click(function() {
  //   $("#part6text").val(null);
  //   $("#payment_effectivity6" ).val(null);
  //   $("#part6num").val(null);
  //   $('#paytype_id6').val(null);

  //   $("#part6text").prop("disabled", false );
  //   $("#payment_effectivity6").prop( "disabled", false );
  //   $("#part6num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);

  // });

  // $("#del_row7").click(function() {
  //   $("#part7text").val(null);
  //   $("#payment_effectivity7" ).val(null);
  //   $("#part7num").val(null);
  //   $('#paytype_id7').val(null);

  //   $("#part7text").prop("disabled", false );
  //   $("#payment_effectivity7").prop( "disabled", false );
  //   $("#part7num").prop( "disabled", false );
  //   particular();
  //   var numtotal = parseFloat(total);
  //   var totalconvert = createCommas(numtotal.toFixed(2));
  //   $('#total').val(totalconvert);
  // });

  // $('#payment_type_of_payment').change(function(){
  //   if ($(this).val() == "4014")  {
  //     if ($('#what_row').val() == "row1") {
  //       $('#part1text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id1').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);


  //     }else if ($('#what_row').val() == "row2") {
  //       $('#part2text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id2').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }else if ($('#what_row').val() == "row3") {
  //       $('#part3text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id3').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }else if ($('#what_row').val() == "row4") {
  //       $('#part4text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id4').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }else if ($('#what_row').val() == "row5") {
  //       $('#part5text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id5').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }else if ($('#what_row').val() == "row6") {
  //       $('#part6text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id6').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }else if ($('#what_row').val() == "row7") {
  //       $('#part7text').val("Details here");
  //       $('#add_item_window').modal("hide");
  //       $('#paytype_id7').val("4014");
  //       particular();
  //       var numtotal = parseFloat(total);
  //       var totalconvert = createCommas(numtotal.toFixed(2));
  //       $('#total').val(totalconvert);
  //     }

  //   }

  // });


  // $('#add_item_form').submit(function(e){
  //   e.preventDefault();
  //   var type = $('#payment_type_of_payment option:selected').html();
  //   var typeid = $('#payment_type_of_payment option:selected').val();
  //   var date = $('#payment_effectivity').val();
  //   var amount = $('#payment_amount_to_pay2').val();
  //   console.log($('#payment_effectivity').val());
  //   //PUTANG INA NMN KASI WHOOOOOOOOOOOOOOOO

  //   if ($('#what_row').val() == "row1") {
  //     $('#part1text').val(type);
  //     $('#payment_effectivity1').val(date);
  //     $('#part1num').val(amount);
  //     $('#paytype_id1').val(typeid);

  //     $( "#part1text" ).prop( "disabled", true );
  //     $( "#payment_effectivity1" ).prop( "disabled", true );
  //     $( "#part1num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //       // cash
  //       changeboth();
  //       totalamountgiven();
  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       changechequecash();
  //       totalamountgiven();
  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       changecheque();
  //       totalamountgiven();
  //     }

  //   }else if ($('#what_row').val() == "row2") {
  //     $('#part2text').val(type);
  //     $('#payment_effectivity2').val(date);
  //     $('#part2num').val(amount);
  //     $('#paytype_id2').val(typeid);

  //     $( "#part2text" ).prop( "disabled", true );
  //     $( "#payment_effectivity2" ).prop( "disabled", true );
  //     $( "#part2num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //   }else if ($('#what_row').val() == "row3") {
  //     $('#part3text').val(type);
  //     $('#payment_effectivity3').val(date);
  //     $('#part3num').val(amount);
  //     $('#paytype_id3').val(typeid);

  //     $( "#part3text" ).prop( "disabled", true );
  //     $( "#payment_effectivity3" ).prop( "disabled", true );
  //     $( "#part3num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //   }else if ($('#what_row').val() == "row4") {
  //     $('#part4text').val(type);
  //     $('#payment_effectivity4').val(date);
  //     $('#part4num').val(amount);
  //     $('#paytype_id4').val(typeid);

  //     $( "#part4text" ).prop( "disabled", true );
  //     $( "#payment_effectivity4" ).prop( "disabled", true );
  //     $( "#part4num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //   }else if ($('#what_row').val() == "row5") {
  //     $('#part5text').val(type);
  //     $('#payment_effectivity5').val(date);
  //     $('#part5num').val(amount);
  //     $('#paytype_id5').val(typeid);

  //     $( "#part5text" ).prop( "disabled", true );
  //     $( "#payment_effectivity5" ).prop( "disabled", true );
  //     $( "#part5num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //   }else if ($('#what_row').val() == "row6") {
  //     $('#part6text').val(type);
  //     $('#payment_effectivity6').val(date);
  //     $('#part6num').val(amount);
  //     $('#paytype_id6').val(typeid);

  //     $( "#part6text" ).prop( "disabled", true );
  //     $( "#payment_effectivity6" ).prop( "disabled", true );
  //     $( "#part6num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);

  //   }else if ($('#what_row').val() == "row7") {
  //     $('#part7text').val(type);
  //     $('#payment_effectivity7').val(date);
  //     $('#part7num').val(amount);
  //     $('#paytype_id7').val(typeid);

  //     $( "#part7text" ).prop( "disabled", true );
  //     $( "#payment_effectivity7" ).prop( "disabled", true );
  //     $( "#part7num" ).prop( "disabled", true );
  //     particular();
  //     var numtotal = parseFloat(total);
  //     var totalconvert = createCommas(numtotal.toFixed(2));
  //     $('#total').val(totalconvert);
  //   }

  //     $('#add_item_window').modal("hide");
  //     $('#add_item_form')[0].reset();

  // });

  var myInputs = document.querySelectorAll('.fixed');
  myInputs.forEach(function(elem) {
    elem.addEventListener("input", function() {
      var dec = elem.getAttribute('decimals');
      var regex = new RegExp("(\\.\\d{" + dec + "})\\d+", "g");
      elem.value = elem.value.replace(regex, '$1');
    });
  });

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






    $("#payment_or_number").inputFilter(function(value) {
    return /^-?\d*$/.test(value); });

    $('input[type=number][max]:not([max=""])').on('input', function(ev) {
      var $this = $(this);
      var maxlength = $this.attr('max').length;
      var value = $this.val();
      if (value && value.length >= maxlength) {
        $this.val(value.substr(0, maxlength));
      }
    });


    var num_val;
    num = parseFloat(num_val);
    $("#payment_cash_tendered").val(createCommas(num.toFixed(2)));

    function setTwoNumberDecimal(event) {
      this.value = parseFloat(this.value).toFixed(2);
    }

    $('#TenantPay').on('hidden.bs.modal', function () {
      testcheqdel();
      cheque_total = 0;
      $("#payment_cheque_total").text("");
      $('#sub_total').prop('checked', false);
      $('#payment_type_hide').show();

    });

    $( "#close_modal_payment" ).click(function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to close the payment window?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Close',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $('#TenantModalPay').modal("hide");
        }
      })
    });

    $( "#close_modal_receipt" ).click(function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to close the receipt window?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Close',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $('#print').modal("hide");
        }
      })
    });

    $( "#close_modal_receipt2" ).click(function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to close the printing window?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Close',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $('#rec').modal("hide");
        }
      })
    });

    function testcheqdel() {
      var a = $(this).attr("id");
      row_num = 1;
      delete add_line[a];
      $('#row'+a+'').remove();

      delete add_line[a];
      $('#row'+a+'').remove();

      delete add_line[a];
      $('#row'+a+'').remove();

    }

    $('#demo').num2words();

    $('#newbton').submit(function(e){
      e.preventDefault();

      var myTableArray = [];

      $("table#table_cheque tr").each(function() {
        var arrayOfThisRow = [];

        var tableData = $(this).find('td');
        if (tableData.length > 0) {
          tableData.each(function() { arrayOfThisRow.push($(this).text()); });
          myTableArray.push(arrayOfThisRow);
        }
      });


      for (var i = 0  ; i < add_line.length; i++) {
        // $.ajax({
        //   url: global.settings.url +'/MainController/insert_table_bulk_controller',
        //   method: 'POST',
        //   data: {myTableArray: myTableArray[i]},
        //   success : function(res){
        //     console.log(res);
        //   },
        //   error : function(xhr){
        //     console.log(xhr.responseText);
        //   }
        // });
      }

    });







    

  $('#payment_cash_tendered').change(function(){
    if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
      // cash
      changeboth();
      totalamountgiven();
    }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
      // cash and cheque
      changechequecash();
      totalamountgiven();
    }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
      //cheque only
      changecheque();
      totalamountgiven();
    }

  });







    // $('#printrec').submit(function(e){
    //   e.preventDefault();
    //   $.ajax({
    //     type: "POST",
    //     data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
    //     url: global.settings.url +'/MainController/paymentreceiptprint',
    //     xhrFields: {
    //       responseType: 'blob'
    //     },

    //     success:function(data)
    //     {
    //       console.log("hmmm");
    //       // document.getElementById('frameasdas').contentWindow.location.reload();
    //       var url = window.URL.createObjectURL(data);
    //       $('#frameasdas').attr('src',url+'#toolbar=0&navpanes=0&scrollbar=0');
    //       $('#rec').modal('show');
    //       $('#rec').modal('hide');
    //       //  $('#frameasdas').attr('src',data);
    //     },
    //     error:function()
    //     {
    //     }
    //   });
    // });



    $('#search_cl_s').on('change', function() {
      var search = $("#search_cl_f").val();
      var searchcat = $(this).children("option:selected").val();
      if (isEmptyOrSpaces(search)) {
        console.log("do nothing");
      }else if ($(this).children("option:selected").text() == "Please Select") {
        console.log("do nothing");
      }else {
        $('#tableNoStall').DataTable().clear().destroy();
        search_client(search, searchcat);
      }
    });

    $('#search_cl_f').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        var search = $("#search_cl_f").val();
        var searchcat = $("#search_cl_s option:selected").val();
        if (isEmptyOrSpaces(search) && !$('#search_cl_s').val()) {
          Swal.fire({
            icon: 'error',
            title: 'Please input your Search and Select a category',
          });
        }else if (isEmptyOrSpaces(search)) {
          Swal.fire({
            icon: 'error',
            title: 'Please input your Search',
          });
        }else if (!$('#search_cl_s').val()) {
          Swal.fire({
            icon: 'error',
            title: 'Please Select a category',
          });
        }
        else {
          $('#tableNoStall').DataTable().clear().destroy();
          search_client(search, searchcat);
        }
      }
    });

    function search_client(search, searchcat) {
      $('#tableNoStall').DataTable({
        "paging": true,
        "searching": false,
        "ordering": true,
        "ajax" : {
          "url" : global.settings.url + '/MainController/gettenanttable',
          "data": {search:search, searchcat:searchcat},
          "dataType": "json",
          "type": "POST"
        },
        "columns" : [{
          "data" : "id"
        },

        {
          "data" : "c_info_stall_number"
        },

        {
          "data" : "c_info_section"
        },

        {
          "data" : "c_info_natbus"
        },

        {
          "data" : "c_info_area"
        },


        {
          "data" : "c_info_daily_fee"
        },


        {
          "data" : "c_info_fullname_owner"
        },

        {
          "data" : "c_info_fullname_occupant"
        },
        {
          "data" : "btn"
        }]
      });
      $('.dataTables_length').addClass('bs-select');
    }

    $('.dataTables_length').addClass('bs-select');



    // $('#payment_or_number').change(function(){
    
    // });

    $('.partnum').change(function(){
      particular();
      if (!$(this).val()) {
        console.log("hello nan");
      }else {
        var num = parseFloat($(this).val());
        $(this).val(createCommas(num.toFixed(2)));
      }
      console.log(total);

      var numtotal = parseFloat(total);
      console.log(numtotal);
      var totalconvert = createCommas(numtotal.toFixed(2));
      $('#total').val(totalconvert);

      // // $(this).val(parseFloat($(this).val()).toFixed(2));
      // if($('#sub_total').is(":checked")){
      //   particular();
      //   // if($('#payment_amount_to_pay').val() == ""){
      //   //   amount_to_pay = 0;
      //   // }else {
      //   //   amount_to_pay = $('#payment_amount_to_pay').val();
      //   // }
      //   // var totalcon = $('#total').val().replace(',', '');
      //   // var atpcon = $('#payment_amount_to_pay').val().replace(',', '');
      //   // total = parseFloat(totalcon) + parseFloat(atpcon);
      //   var numtotal = parseFloat(total);
      //   var totalconvert = createCommas(numtotal.toFixed(2));
      //   $('#total').val(totalconvert);
      //
      //
      //   // $('#total').val(total);
      //
      //   if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
      //     // cash
      //     changeboth();
      //     totalamountgiven();
      //   }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val().replace(',', '') > 0) {
      //     // cash and cheque
      //     changechequecash();
      //     totalamountgiven();
      //   }else if ($('#payment_cash_tendered').val().replace(',', '') == 0 ||  $('#payment_cash_tendered').val() == ""){
      //     //cheque only
      //     changecheque();
      //     totalamountgiven();
      //   }
      //
      // }
    });


      $('#addRow').click(
        
        function() {
          var curMaxInput = $('input:text').length;

          $('#rows li:first')
          .clone()
          .insertAfter($('#rows li:last'))
          .find('input:text:eq(0)')
          .attr({'id': 'ans' + (curMaxInput + 1),
          'name': 'ans' + (curMaxInput + 1)
        })
        .parent()
        .find('input:text:eq(1)')
        .attr({
          'id': 'ans' + (curMaxInput + 2),
          'name': 'ans' + (curMaxInput + 2)
        });
        $('#removeRow')
        .removeAttr('disabled');
        if ($('#rows li').length >= 5) {
          $('#addRow')
          .attr('disabled',true);
        }
        return false;
      });

      $('#removeRow').click(
        function() {
          if ($('#rows li').length > 1) {
            $('#rows li:last')
            .remove();
          }
          if ($('#rows li').length <= 1) {
            $('#removeRow')
            .attr('disabled', true);
          }
          else if ($('#rows li').length < 5) {
            $('#addRow')
            .removeAttr('disabled');

          }
          return false;
        });


  // });

  //end of doc ready
  //end of doc ready
  //end of doc ready
  //end of doc ready






















  // FOR NEW PAGES IN PAYMENT
  function fetchdata(id){
    $.ajax({
      url: global.settings.url + '/MainController/checkviolationpay',
      type: 'POST',
      data: {
        id: id
      },
      dataType:'JSON',
      success: function(res){
        if (res == 'withviolation') {
          Swal.fire({
            icon: 'error',
            title: 'Pay the violation first',
          });
        }else {
          res = res[0];
          // $('#TenantPay').modal("show");
          $('#TenantModalPay').modal("show");
          $('#paymentDet').hide();
          $('#chequeDetails').hide();
          $('#payment_type').val(null);
          $('.payment_details').val('');
          $('.rowrow').remove();
          $('#payment_cheque_number').val("");
          $('#payment_cheque_amount').val("");
          $('#payment_cheque_date').val("");
          $('#payment_bank_branch').val("");
          stall_no = res.unit_no;
          $('#payment_customer_id').val(res.customer_id);
          $('#payment_name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
          $('#payment_stall').val(res.unit_no);
        }
      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })

  }














  
  $('#add_cheque').on('click', function (e) {
    e.preventDefault();
    var cheque_num = $("#payment_cheque_number").val();
    var cheque_am = $("#payment_cheque_amount").val();
    var cheque_am_par = $("#payment_cheque_amount").val().replace(',', '');
    var cheque_date = $("#payment_cheque_date").val();
    var cheque_bank = $("#payment_bank_branch").val();
    if (isEmptyOrSpaces(cheque_num)) {
      Swal.fire({
        title: 'Please put your cheque number',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
    }else if (isEmptyOrSpaces(cheque_am)) {
      Swal.fire({
        title: 'Please put the cheque amount',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
    }else if (isEmptyOrSpaces(cheque_bank)) {
      Swal.fire({
        title: 'Please put the bank/branch of the cheque',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
    }else if (!$("#payment_cheque_date").val()) {
      Swal.fire({
        title: 'Please put the cheque date',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
    }else {

      console.log(row_num);
      if (row_num >= 4) {
        Swal.fire({
          icon: 'error',
          title: 'Cheque Limit',
          text: 'Maximum of 3'
        });
      }else{
        cheque_total = parseFloat(cheque_total) + parseFloat(cheque_am_par);

        var num = parseFloat(cheque_total);
        var chequeamconvert = createCommas(num.toFixed(2));
        $("#payment_cheque_total").text(chequeamconvert);

        var table_cheque = $('#table_cheque').DataTable({
          "paging": false,
          "searching": false,
          "ordering": false,
        });

        add_line.push({
          'ch[cheque_number]' : $('#payment_cheque_number').val(),
          'ch[cheque_amount]' : $('#payment_cheque_amount').val(),
          'ch[cheque_date]' : $('#payment_cheque_date').val(),
          'ch[bank_branch]' :  $('#payment_bank_branch').val(),
          'ch[fk_stall_no]' :  stall_no
        });

        "use strict";
        var table = document.getElementById("table_cheque");
        var row= document.createElement("tr");
        row.setAttribute('id','row'+row_id);
        row.setAttribute('class','rowrow');
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var td4 = document.createElement("td");
        var td5 = document.createElement("td");
        td1.innerHTML = document.getElementById("payment_cheque_number").value;
        td2.innerHTML  = document.getElementById("payment_cheque_amount").value;
        td3.innerHTML  = document.getElementById("payment_cheque_date").value;
        td4.innerHTML  = document.getElementById("payment_bank_branch").value;
        td5.innerHTML  = '<button type="button" class="btn_delete btn btn-danger btn-sm " id="'+row_id+'">Delete</button>';
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);
        row.appendChild(td5);
        table.children[0].appendChild(row);
        row_id++;
        row_num++;
        table_cheque.destroy();

        if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
          // cash
          changeboth();
          totalamountgiven();
        }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val().replace(',', '') > 0) {
          // cash and cheque
          console.log("hello cash anf cheque");
          changechequecash();
          totalamountgiven();
        }else if ($('#payment_cash_tendered').val().replace(',', '') == 0 ||  $('#payment_cash_tendered').val() == ""){
          //cheque only
          changecheque();
          totalamountgiven();
        }

      }
    }
  });








  // $(document).on('click', '.btn_delete', function(){
  //   var a = $(this).attr("id");
  //   cheque_total = parseFloat(cheque_total) - parseFloat(add_line[a]['ch[cheque_amount]'].replace(',', ''));
  //   $("#payment_cheque_total").text(cheque_total);
  //   row_num--;
  //   delete add_line[a];
  //   $('#row'+a+'').remove();
  //   payment_type = $('#payment_type').val();

  //   if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
  //     // cash
  //     changeboth();
  //     totalamountgiven();
  //   }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val().replace(',', '') > 0) {
  //     // cash and cheque
  //     changechequecash();
  //     totalamountgiven();
  //   }else if ($('#payment_cash_tendered').val().replace(',', '') == 0 ||  $('#payment_cash_tendered').val() == ""){
  //     //cheque only
  //     changecheque();
  //     totalamountgiven();
  //   }

  // });





  
  function totalamountgiven() {
    var cash_tendered2 = $('#payment_cash_tendered').val().replace(',', '');
    var cheque_display = $("#payment_cheque_total").text().replace(',', '');


    if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
      //cash
      $('#total_amount_given').val($('#payment_cash_tendered').val());

    }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val()) {
      // cash and cheque

      totalgiven = parseFloat(cash_tendered2) + parseFloat(cheque_display);
      var num = parseFloat(totalgiven);
      var total_amount_given_var = createCommas(num.toFixed(2));
      // var total_amount_given_var = parseFloat(cash_tendered2) + parseFloat(cheque_display);

      if ($('#payment_cash_tendered').val() == "") {
        $('#total_amount_given').val("");
      }else if ($("#payment_cheque_total").text() == "" || $("#payment_cheque_total").text() == 0) {
        $('#total_amount_given').val("");
      }else {
        $('#total_amount_given').val(total_amount_given_var);
      }
      }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
      //cheque only
      $('#total_amount_given').val($('#payment_cheque_total').text());

    }


  }







  function changeboth() {

    var cash_tendered = $("#payment_cash_tendered").val().replace(/,/g, '');

    var total = $('#ttlAmt').val().replace(/,/g, '');



    if ($("#payment_amount_to_pay").val() == '') {
      $('#change').val(0);
    } else if ($('#payment_cash_tendered').val() == '') {
      $('#change').val(0);
    }else {

      if( parseFloat(cash_tendered) <  parseFloat(total))
      {
        $('#change').val("Invalid Input");
      }
      else
      {
        change = parseFloat(cash_tendered) - parseFloat(total);
        console.log(change);
   
        var num = parseFloat(change);
        var changeconvert = createCommas(num.toFixed(2));
        $('#change').val(changeconvert);
      }


      // var num = parseFloat($(this).val());
      // $(this).val(createCommas(num.toFixed(2)));

    }
  }











  function changecheque() {
    var cheque_display = $("#payment_cheque_total").text().replace(/,/g, '');
    total = $('#ttlAmt').val().replace(/,/g, '');

    if ($("#payment_amount_to_pay").val() == '') {
      $('#change').val(0);
    } else if ($("#payment_cheque_total").text() == '' || $("#payment_cheque_total").text() == '') {
      $('#change').val(0);
    }else{

      var chq = parseFloat(cheque_display);
      var ttl = parseFloat(total);

      if(chq < ttl)
      {
        $('#change').val("Invalid Input");
      }
      else
      {
        change = chq - ttl ;

        var num = parseFloat(change);
        var changeconvert = createCommas(num.toFixed(2));
        $('#change').val(changeconvert);
      }

    

    }
  }









  function changechequecash() {
    var cheque_display = $("#payment_cheque_total").text().replace(/,/g, '');
    var cash_tendered2 = $('#payment_cash_tendered').val().replace(/,/g, '');
    var am_to_pay = $('#ttlAmt').val().replace(/,/g, '');

    change_cheque_cash = parseFloat(cash_tendered2) + parseFloat(cheque_display);

    if ($("#payment_amount_to_pay").val() == '') {
      console.log("do nothing");
      $('#change').val(null);
    } else if ($("#payment_cheque_total").text() == '') {
      console.log("do nothing");
      $('#change').val(null);
    }else if ($("#payment_cash_tendered").val() == '') {
      console.log("do nothing");
      $('#change').val(null);
    }else{
      var ttlAmt = parseFloat($('#ttlAmt').val().replace(',', ''));
      var chqCash = parseFloat(change_cheque_cash);

      if(chqCash < ttlAmt)
      {
        $('#change').val("Invalid Input");
      }
      else
      {
        var change = chqCash -  ttlAmt;

        var num = parseFloat(change);
        var changeconvert = createCommas(num.toFixed(2));
        $('#change').val(changeconvert);
      }



     
      // $('#change').val(change);
    }

  }











  // $('#payment_submit').submit(function(e){
  //   e.preventDefault();


    
  //   var particulars = [];
  //   var no = []
  //   var particulars = []
  //   var date = []
  //   var price = []
    
  //   customer_id = $('#payment_customer_id').val();
  //   tenant_id = $('#payment_tenant_id').val();
  //   type_of_payment = $('#payment_type_of_payment').val();
  //   or_number =$('#payment_or_number').val();
  //   cash_tendered = $('#payment_cash_tendered').val().replace(',', '');
  //   payment_name = $('#payment_name').val();
  //   total = parseFloat($('#ttlAmt').val().replace(',', ''));
  //   var fund_id = 1;
  //   var payment_type = $('#payment_type').val();

    

  //   console.log("customer_id" +" - "+customer_id);
  //   console.log("tenant_id" +" - "+tenant_id);
  //   console.log("type_of_payment" +" - "+type_of_payment);
  //   console.log("or_number" +" - "+or_number);
  //   console.log("amount_to_pay" +" - "+amount_to_pay);
  //   console.log("payment_name" +" - "+payment_name);
  //   console.log("total" +" - "+total);
  //   console.log("payment_type" +" - "+payment_type);






  //   if ($('#payment_or_number').val() == "") {
  //     Swal.fire({
  //       icon: 'error',
  //       title: 'Check OR number please',
  //     });
  //   }


  //   else
  //   {
  //     var or_number = $('#payment_or_number').val();
  //     $.ajax({
  //       url: global.settings.url + '/MainController/checkOr',
  //       type: 'POST',
  //       data: {
  //         or_number: or_number
  //       },
  //       dataType:'JSON',
  //       success: function(res){

  //         if(res=="meron"){
  //           Swal.fire({
  //             title: 'O.R number already exist!',
  //             icon: 'error',
  //             confirmButtonText: 'Ok'
  //           })
  //           $('#payment_or_number').val("");

  //           return;

  //         }

  //         else{
            
  //         }

  //       },
  //       error: function(xhr){
  //         console.log(xhr.responseText);
  //       }
  //     })
      
  //   }

  //   if ($('#change').val() == "" || $('#change').val() == null) {
  //     Swal.fire({
  //       icon: 'error',
  //       title: 'Complete the transaction first.',
  //     });
  //   }else if ($('#change').val().replace(',', '') < 0 ||  $('#change').val() == 'Invalid Input') {
  //     Swal.fire({
  //       icon: 'error',
  //       title: 'Insufficient amount.',
  //     });
  //   }else {





  //     if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {

  //       $('#tbodyParticulars tr').each(function(row,tr){
  //         no[row]={"no" : $(tr).find('td:eq(0)').text()}    
  //         particulars[row]={"particulars" : $(tr).find('td:eq(1)').text()}    
  //         date[row]={"date" :$(tr).find('td:eq(2)').text()}    
  //         price[row]={"price" :$(tr).find('td:eq(3)').text().replace(/,/g, '')}    

  //       });  

  //       no = JSON.stringify(no);
  //       particulars = JSON.stringify(particulars);
  //       date = JSON.stringify(date);
  //       price = JSON.stringify(price);

  //       console.log(no);
  //       console.log(particulars);
  //       console.log(date);
  //       console.log(price);


  //       $("#no").val(no);
  //       $("#particulars").val(particulars);
  //       $("#date").val(date);
  //       $("#price").val(price)  ;


  //       console.log( $("#payment_submit").serializeArray());
      
        

  //       // cash
  //       // $.ajax({
  //       //   type: "POST",
  //       //   data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
  //       //   url: global.settings.url +'/MainController/savetransaction',
  //       //   success: function(res){

  //           $.ajax({
  //             type: "POST",
  //             data:$("#payment_submit").serialize(),
  //             // data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
  //             url: global.settings.url +'/MainController/paymentreceiptJO',
  //             xhrFields: {
  //               responseType: 'blob'
  //             },

  //             success:function(data)
  //             {
  //               // document.getElementById('frameasdas').contentWindow.location.reload();

  //               var url = window.URL.createObjectURL(data);
  //               $('#frameasdas').attr('src',url+'#toolbar=0&navpanes=0&scrollbar=0');
  //               $('#rec').modal('show');
  //               //  $('#frameasdas').attr('src',data);
  //             },
  //             error:function()
  //             {
  //             }

  //           });

  //           // $('#payer').val(payment_name);
  //           // $('#totalprint').val(total);
  //           // $('#cashcheck').val(payment_type);
  //           // $('#print').modal('show');
  //         // },
  //       //   error: function(res){

  //       //   }
  //       // });

  //     }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val() > 0) {
  //       // cash and cheque
  //       $('#tbodyParticulars tr').each(function(row,tr){
  //         no[row]={"no" : $(tr).find('td:eq(0)').text()}    
  //         particulars[row]={"particulars" : $(tr).find('td:eq(1)').text()}    
  //         date[row]={"date" :$(tr).find('td:eq(2)').text()}    
  //         price[row]={"price" :$(tr).find('td:eq(3)').text().replace(/,/g, '')}    

  //       });  

  //       no = JSON.stringify(no);
  //       particulars = JSON.stringify(particulars);
  //       date = JSON.stringify(date);
  //       price = JSON.stringify(price);

  //       console.log(no);
  //       console.log(particulars);
  //       console.log(date);
  //       console.log(price);

  
  //       console.log($("#payment_submit").serializeArray());
        

  //       $.ajax({
  //         type: "POST",
  //         data:$("#payment_submit").serialize(),
  //         // data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
  //         url: global.settings.url +'/MainController/savetransaction',
  //         success: function(res){
  //           // $('#TenantPay').modal("hide");
  //           res= jQuery.parseJSON(res);

  //           transaction_id = res[0].transaction_id;
  //           for(var i = 0; i< add_line.length;i++)
  //           {

  //             add_line[i]['ch[fk_transaction_id]'] = transaction_id;
  //             $.ajax({
  //               type: "POST",
  //               data: add_line[i],
  //               url: global.settings.url +'/MainController/savecheque',

  //               success: function(res){
  //                 // $('#TenantPay').modal("hide");
  //               },
  //               error: function(res){

  //               }
  //             });

  //             check_amount[i] =  add_line[i]['ch[cheque_amount]'];
  //             check_number[i] =  add_line[i]['ch[cheque_number]'];
  //             check_date[i] =    add_line[i]['ch[cheque_date]'];
  //             bank[i] =          add_line[i]['ch[bank_branch]'];

  //           }

  //           $.ajax({
  //             type: "POST",
  //             data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
  //             url: global.settings.url +'/MainController/paymentreceipt',
  //             xhrFields: {
  //               responseType: 'blob'
  //             },

  //             success:function(data)
  //             {

  //               // document.getElementById('frameasdas').contentWindow.location.reload();

  //               var url = window.URL.createObjectURL(data);
  //               $('#frameasdas').attr('src',url+'#toolbar=0&navpanes=0&scrollbar=0');
  //               $('#rec').modal('show');

  //               //  $('#frameasdas').attr('src',data);


  //             },
  //             error:function()
  //             {

  //             }

  //           });


  //         },
  //         error: function(res){

  //         }
  //       });

  //     }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
  //       //cheque only
  //       $.ajax({
  //         type: "POST",
  //         // data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
  //         data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
  //         url: global.settings.url +'/MainController/savetransaction',
  //         success: function(res){
  //           // $('#TenantPay').modal("hide");
  //           // testcheqdel();
  //           res= jQuery.parseJSON(res);

  //           transaction_id = res[0].transaction_id;
  //           for(var i = 0; i< add_line.length;i++)
  //           {

  //             add_line[i]['ch[fk_transaction_id]'] = transaction_id;

  //             $.ajax({
  //               type: "POST",
  //               data: add_line[i],
  //               url: global.settings.url +'/MainController/savecheque',
  //               success: function(res){
  //                 $('#TenantPay').modal("hide");
  //               },
  //               error: function(res){

  //               }
  //             });
  //             check_amount[i] =  add_line[i]['ch[cheque_amount]'];
  //             check_number[i] =  add_line[i]['ch[cheque_number]'];
  //             check_date[i] =    add_line[i]['ch[cheque_date]'];
  //             bank[i] =          add_line[i]['ch[bank_branch]'];
  //           }

  //           $.ajax({
  //             type: "POST",
  //             data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
  //             url: global.settings.url +'/MainController/paymentreceipt',
  //             xhrFields: {
  //               responseType: 'blob'
  //             },

  //             success:function(data)
  //             {

  //               // document.getElementById('frameasdas').contentWindow.location.reload();

  //               var url = window.URL.createObjectURL(data);
  //               $('#frameasdas').attr('src',url+'#toolbar=0&navpanes=0&scrollbar=0');
  //               $('#rec').modal('show');

  //               //  $('#frameasdas').attr('src',data);


  //             },
  //             error:function()
  //             {

  //             }

  //           });
  //         },
  //         error: function(res){

  //         }
  //       });


  //     }

  //   }


  // });









  

  $('#payment_submit').submit(function(e){
    e.preventDefault();


    
    var particulars = [];
    var no = [];
    var particulars = [];
    var date = [];
    var price = [];

    var chqno = [];
    var chqAmount = [];
    var chqdate = [];
    var chqBranch = [];

    
    customer_id = $('#payment_customer_id').val();
    tenant_id = $('#payment_tenant_id').val();
    type_of_payment = $('#payment_type_of_payment').val();
    or_number =$('#payment_or_number').val();
    cash_tendered = $('#payment_cash_tendered').val().replace(',', '');
    payment_name = $('#payment_name').val();
    total = parseFloat($('#ttlAmt').val().replace(',', ''));
    var fund_id = 1;
    var payment_type = $('#payment_type').val();

    



    if ($('#payment_or_number').val() == "") {
      Swal.fire({
        icon: 'error',
        title: 'Check OR number please',
      });
    }


    else
    {
      var or_number = $('#payment_or_number').val();
      $.ajax({
        url: global.settings.url + '/MainController/checkOr',
        type: 'POST',
        data: {
          or_number: or_number
        },
        dataType:'JSON',
        success: function(res){

          if(res=="meron"){
            Swal.fire({
              title: 'O.R number already exist!',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
            $('#payment_or_number').val("");
            return;
          }
          else{
     




    if ($('#change').val() == "" || $('#change').val() == null) {
      Swal.fire({
        icon: 'error',
        title: 'Complete the transaction first.',
      });
    }else if ($('#change').val().replace(',', '') < 0 ||  $('#change').val() == 'Invalid Input') {
      Swal.fire({
        icon: 'error',
        title: 'Insufficient amount.',
      });
    }else {




        $('#tbodyParticulars tr').each(function(row,tr){
          no[row]={"no" : $(tr).find('td:eq(0)').text()}    
          particulars[row]={"particulars" : $(tr).find('td:eq(1)').text()}    
          date[row]={"date" :$(tr).find('td:eq(2)').text()}    
          price[row]={"price" :$(tr).find('td:eq(3)').text().replace(/,/g, '')}    

        });  

        no = JSON.stringify(no);
        particulars = JSON.stringify(particulars);
        date = JSON.stringify(date);
        price = JSON.stringify(price);

        $("#no").val(no);
        $("#particulars").val(particulars);
        $("#date").val(date);
        $("#price").val(price);








        $('#table_cheque tr').each(function(row,tr){
          chqno[row]={"chqno" : $(tr).find('td:eq(0)').text()}    
          chqAmount[row]={"chqAmount" : $(tr).find('td:eq(1)').text()}    
          chqdate[row]={"chqdate" :$(tr).find('td:eq(2)').text()}    
          chqBranch[row]={"chqBranch" :$(tr).find('td:eq(3)').text().replace(/,/g, '')}    
        });  

        chqno = JSON.stringify(chqno);
        chqAmount = JSON.stringify(chqAmount);
        chqdate = JSON.stringify(chqdate);
        chqBranch = JSON.stringify(chqBranch);

        $("#chqno").val(chqno);
        $("#chqAmount").val(chqAmount);
        $("#chqdate").val(chqdate);
        $("#chqBranch").val(chqBranch);



        


        // add_line = JSON.stringify(add_line);
        // $("#addline").val(add_line);
        // console.log($("#addline").val());


        // cash
        // $.ajax({
        //   type: "POST",
        //   data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
        //   url: global.settings.url +'/MainController/savetransaction',
        //   success: function(res){

            $.ajax({
              type: "POST",
              data:$("#payment_submit").serialize(),
              url: global.settings.url +'/MainController/paymentreceiptJO',
              xhrFields: {
                responseType: 'blob'
              },
              success:function(data)
              {

                var url = window.URL.createObjectURL(data);
                $('#frameasdas').attr('src',url+'#toolbar=0&navpanes=0&scrollbar=0');
                $('#rec').modal('show');
              },
              error:function()
              {
              }

            });
        // },
        //   error: function(res){
        //   }
        // });
      }
      


          }
        },
        error: function(xhr){
          console.log(xhr.responseText);
        }
      })
      }


  });






function printReceipt()
{


    $('#rec').modal("hide");
	
    $('#printModal').modal({
      backdrop: 'static',
      keyboard: false
    })
    $('#printModal').modal('show');

    $.ajax({
      type: "POST",
      data:$("#payment_submit").serialize(),
      url: global.settings.url +'/MainController/printreceipt',
      xhrFields: {
        responseType: 'blob'
      },
      success:function(res)
      {
        console.log(res);
        document.getElementById('printFrame').contentWindow.location.reload();
        var url = window.URL.createObjectURL(res);
        $('#printFrame').attr('src', url);
        
      },
      error:function()
      {
        xhr.responseText()
      }
    });
  }
















  

  function savedatanow()
  {
    // type_of_payment = $('#payment_type_of_payment').val();
    // payment_name = $('#payment_name').val();
    // var fund_id = 1;
    // var payment_type = $('#payment_type').val();

    var customer_id = $('#payment_customer_id').val();
    var tenant_id = $('#payment_tenant_id').val();
    var cash_tendered = $('#payment_cash_tendered').val().replace(',', '');
    var or_number =$('#payment_or_number').val();
    var total = parseFloat($('#ttlAmt').val().replace(',', ''));

    var no =  jQuery.parseJSON($("#no").val());
    var particulars =  jQuery.parseJSON($("#particulars").val());
    var date =  jQuery.parseJSON($("#date").val());
    var price = jQuery.parseJSON($("#price").val());
    var transaction_id = 0;
    var arrlength =  no.length - 1;
    var count = 0;


    for (var i = 0; i < no.length; i++) {
    
    
      
    $.ajax({
      type: "POST",
      // data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
      data:
      {
       customer_id:customer_id
      ,tenant_id:tenant_id
      ,no:no[i].no
      ,particulars:particulars[i].particulars
      ,pay_effect:date[i].date
      ,price:price[i].price
      ,or_number:or_number
      ,cash_tendered:cash_tendered
      ,total:total
      ,count:i
      },

      url: global.settings.url +'/MainController/savetransaction',
      dataType:'json',
      success: function(res){
        console.log(res);

          result = res.query;
          transaction_id = res.id;

          console.log(res.count);
          console.log(arrlength);
          console.log(result);
          console.log(transaction_id);



       if (res.count == arrlength && result == true)
        {
          var paymenttype = $("input[name='pay[paymentCol]']:checked").val();
          console.log(paymenttype);

          if (paymenttype == 'bankCash' || paymenttype == 'bank')
          {
            console.log(add_line);

            if (add_line.length > 0){

            for(var c = 0; c < add_line.length;c++)
            {
              add_line[c]['ch[fk_transaction_id]'] = transaction_id;
              console.log(add_line[c]['ch[fk_transaction_id]']);
              console.log(add_line[c]);
              
              $.ajax({
                type: "POST",
                data: add_line[c],
                url: global.settings.url +'/MainController/savecheque',
                dataType: 'json',
                success: function(res){
                  console.log(res);
                  successlog();

                },
                error: function(res){
      
                }
              });
          
            }}
      
          }

          else
          {
            successlog();
          }
        }//end count



      }
    });


          
        }//end of for loop

      
  

        // console.log(i);
        // console.log(count);
        // console.log(arrlength);
        // console.log(result);
        // console.log(transaction_id);





        }










function successlog(){
  
  $('#printModal').modal('hide');
  $('#TenantModalPay').modal('hide');
  $("#payment_submit")[0].reset();


  $("#payment_cheque_total").text(0.00);

  var table_cheque = document.getElementById("table_cheque");
  for (var i = table_cheque.rows.length - 1; i > 0; i--) {
    table_cheque.deleteRow(i);
  }

  $("#tbodyParticulars").html("");

  Swal.fire({
    icon: 'success',
    title: 'Successfully Saved',
  });


}



























function addNewRow()
{
  $('#add_Newitem_window').modal({
    backdrop: 'static',
    keyboard: false
  });

  $("#add_Newitem_window").modal("show");



}



$('#add_Newitem_window').on('shown.bs.modal', function (e) {
    $("#payment_type_of_payment").val("");

    $('#payment_effectivity').val("");
    $('#payment_amount_to_pay2').val("");
    

    $('option','#payment_type_of_payment').attr('disabled',false);
    $("#tbodyParticulars tr").each(function() {
      var type = $(this).find("td").eq(0).html();
      console.log(type);
      if(type == '4014')
      {
        $('option[value="4014"]','#payment_type_of_payment').attr('disabled',false);
      }
      else
      {
        $('option[value='+type+']','#payment_type_of_payment').attr('disabled',true);
      }
    });
  
});



$('#add_Newitem_form').submit(function(e){
  e.preventDefault();
  var type = $('#payment_type_of_payment option:selected').html();
  var typeid = $('#payment_type_of_payment option:selected').val();
  var typename = $('#payment_type_of_payment option:selected').text()
  var date = $('#payment_effectivity').val();
  var amount = $('#payment_amount_to_pay2').val();
  console.log($('#payment_effectivity').val());

  
var id =  $("#tbodyParticulars > tr").length;


id=id +1;
 var html = "";
 html += "<tr>";
 html += "<td>"+typeid+"</td>";
 html += "<td>"+typename+"</td>";
 html += "<td>"+date+"</td>";
 html += "<td class='text-right amtToPay'>"+amount+"</td>";
 html += "<td><button class='btn btn-outline-danger btn-sm' type='button' onclick='removeItem(this)'>Remove</button></td>";
 html += "</tr>";

$("#tbodyParticulars").append(html);




computeAmount();
totalamountgiven();


if($("input[name='pay[paymentCol]']:checked").val() == 'cash')
{ 
  changeboth();
}
else if ($('input[name="pay[paymentCol]"]:checked').val() == 'bank')
{
  changecheque();
}
else
{
  changechequecash();
}

$('#add_Newitem_window').modal("hide");

});




function closeModal(name)
{
  $("#"+name).modal("hide");

}




function removeItem(row)
{
  var id =  $("#tbodyParticulars > tr").length;
  $(row).closest("tr").remove();
  computeAmount();
}






  $('input[name="pay[paymentCol]"]').change(function(){

    $(".payment_details").val("");
    $("#total_amount_given").val(0.00);
    $("#payment_cheque_total").text(0.00);
    $("#change").val(0.00);
    $("#payment_or_number").val("");

    var table_cheque = document.getElementById("table_cheque");
    for (var i = table_cheque.rows.length - 1; i > 0; i--) {
      table_cheque.deleteRow(i);
    }
    
    $(".bankCashCol").attr("hidden", true)

    var desc = $(this).val();
    console.log(desc);

    $("."+desc+"Col").attr("hidden", false)

  });



function computeAmount()
{
  
var amount = 0;

$("#tbodyParticulars tr").each(function() {

  var amtToPay = $(this).find("td").eq(3).html();    
  var num = parseFloat(amtToPay.replace(/,/g, ''));
  amount += num;
  
})
$("#ttlAmt").val(createCommas(amount.toFixed(2)));
}




















//HELPERS

$('.money2').mask("#,##0.00", {reverse: true});


function createCommas(x) {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return parts.join(".");
}


function isEmptyOrSpaces(str){
  return str === null || str.match(/^ *$/) !== null;
}



function diffdates() {
  var dp1 = document.getElementById('last_pay').value;
  var daily = document.getElementById('daily_fee_field').value;
  // Split timestamp into [ Y, M, D, h, m, s ]
  var t = dp1.split(/[- :]/);

  // Apply each element to the Date function
  var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
  console.log(d);

  dp2 = new Date();
  var date2 = dp2.getTime();
  var ONE_DAY = 1000 * 60 * 60 * 24


  // get total seconds between two dates
  var res = Math.abs(d - date2) / 1000;
  var days = Math.floor(res / 86400);
  var debt = days * daily;
  document.getElementById('debt_field').value = debt;

  // console.log(days);
  // console.log(debt);

}




function isNumberKey(txt, evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf('.') === -1) {
      return true;
    } else {
      return false;
    }
  } else {
    if (charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
    }
    return true;
  }


