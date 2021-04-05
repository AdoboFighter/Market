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


var fullDate = new Date();
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
const monthNames = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];
const m = new Date();
var month = monthNames[m.getMonth()];
var d = new Date();
var n = d.getDate();
var year = new Date().getFullYear();



$(document).ready(function(){
  $("#searchmodal").modal('show');
});


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

  $( "#print_nolayout" ).click(function() {
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
        $('#printModal').modal("hide");
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
    }

  });






  $("#payment_cash_tendered").keyup(function(){

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
    $('#cash_total').val($('#payment_cash_tendered').val());
    totalamountgiven();
  });


  $('#payment_cash_tendered').change(function(){
    // $('#cash_total').val($(this).val());


    console.log("ds");


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
    $('#cash_total').val($('#payment_cash_tendered').val());
    totalamountgiven();

  });




  $('#searchbtn').click(function(){
    $('#searchmodal').modal("show");
  });

  $('#view_cheq').click(function(){
    $('#viewcheq').modal("show");
  });

  $('#search_cl_s').on('change', function(){
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
      "autoWidth": false,
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
    // $('.dataTables_length').addClass('bs-select');
  }



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


  });


  $('#addRow').click(

    function() {
      $("#payment_amount_to_pay2").prop("disabled", false );
      $("#other_items").attr("hidden",true);
      $("#others_f").attr("required",false);
      $("#add_Newitem_form")[0].reset();

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
            clearitems();
            $("#payment_chq_total").text(0.00);
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
            $('#customer_name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
            $('#payor').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
            $('#payment_stall').val(res.unit_no);
            $('#address').val(res.address);
            $('#payorname').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
            $('#searchmodal').modal("hide");
            $('#ttlAmt').val(null);
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
        var len = $("#table_cheque tr").length;
        console.log(row_num);
        if (len >= 4) {
          Swal.fire({
            icon: 'error',
            title: 'Cheque Limit',
            text: 'Maximum of 3'
          });
        }else{



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
          td2.setAttribute('class','amtClass text-right');
          td3.innerHTML  = document.getElementById("payment_cheque_date").value;
          td4.innerHTML  = document.getElementById("payment_bank_branch").value;
          td5.innerHTML  = '<button type="button" class="btn_delete btn btn-danger btn-sm " id="'+row_id+'" onclick="deleteChq('+row_id+',this)">Delete</button>';
          row.appendChild(td1);
          row.appendChild(td2);
          row.appendChild(td3);
          row.appendChild(td4);
          row.appendChild(td5);
          table.children[0].appendChild(row);
          row_id++;
          row_num++;
          table_cheque.destroy();

          // if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
          //   // cash
          //   changeboth();
          //   totalamountgiven();
          // }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val().replace(',', '') > 0) {
          //   // cash and cheque
          //   console.log("hello cash anf cheque");
          //   changechequecash();
          //   totalamountgiven();
          // }else if ($('#payment_cash_tendered').val().replace(',', '') == 0 ||  $('#payment_cash_tendered').val() == ""){
          //   //cheque only
          //   changecheque();
          //   totalamountgiven();
          // }

          chq_total();
          checkpaymetn();


        }
      }
    });





    function checkpaymetn()
    {
      var paymenttype = $("input[name='pay[paymentCol]']:checked").val();
      console.log(paymenttype);


      if(paymenttype == 'cash')
      {
        changeboth();
      }
      else if(paymenttype == 'bank'){
        changecheque();
      }
      else{
        changechequecash();
      }
      totalamountgiven();
    }




    function deleteChq(id, r)
    {
      // $(row).closest('tr').remove();
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("table_cheque").deleteRow(i);
      add_line.splice(i-1,1);
      console.log(add_line);
      chq_total();
      checkpaymetn();

    }


    function chq_total()
    {
      var total = 0;

      $('.amtClass').each(function(){
        // var chqtotal = $(tr).find("td").eq(1).html();
        // var chqtotal =  $(tr).find('td:eq(1)').html();

        var chqtotal =  $(this).html();
        console.log(chqtotal);
        console.log( parseFloat(chqtotal));
        console.log( parseFloat(chqtotal.replace(/,/g, '')));

        total += parseFloat(chqtotal.replace(/,/g, ''));
        console.log(total);

      });

      console.log(total);

      $("#payment_chq_total").text(createCommas(total.toFixed(2)));
      $("#payment_cheque_total").val(createCommas(total.toFixed(2)));

    }




    function totalamountgiven() {

      var cash_tendered2 = $('#payment_cash_tendered').val().replace(/,/g, '');
      var cheque_display = $("#payment_cheque_total").val().replace(/,/g, '');
      console.log(cheque_display);


      // if ($("#payment_cheque_total").text() == "" || $('#payment_cheque_total').text() == "0") {
      //   //cash
      //   $('#total_amount_given').val($('#payment_cash_tendered').val());

      // }else if ($('#payment_cheque_total').text().length > 0 &&  $('#payment_cash_tendered').val()) {
      //   // cash and cheque

      //   totalgiven = parseFloat(cash_tendered2) + parseFloat(cheque_display);
      //   var num = parseFloat(totalgiven);
      //   var total_amount_given_var = createCommas(num.toFixed(2));
      //   // var total_amount_given_var = parseFloat(cash_tendered2) + parseFloat(cheque_display);

      //   if ($('#payment_cash_tendered').val() == "") {
      //     $('#total_amount_given').val("");
      //   }else if ($("#payment_cheque_total").text() == "" || $("#payment_cheque_total").text() == 0) {
      //     $('#total_amount_given').val("");
      //   }else {
      //     $('#total_amount_given').val(total_amount_given_var);
      //   }
      //   }else if ($('#payment_cash_tendered').val() == 0 ||  $('#payment_cash_tendered').val() == ""){
      //     //cheque only
      //     $('#total_amount_given').val($('#payment_cheque_total').text());

      //   }


      var paymenttype = $("input[name='pay[paymentCol]']:checked").val();
      console.log(paymenttype);


      if(paymenttype == 'cash')
      {
        $('#total_amount_given').val($('#payment_cash_tendered').val());
      }

      else if(paymenttype == 'bank')
      {
        $('#total_amount_given').val($('#payment_cheque_total').val());
      }
      else{
        ($('#payment_cash_tendered').val() == "")?cash_tendered2=0 : $('#payment_cash_tendered').val();
        ($("#payment_cheque_total").val() == "")?cheque_display=0 : $('#payment_cash_tendered').val();


        console.log(cash_tendered2);
        console.log(cheque_display);


        totalgiven = parseFloat(cash_tendered2) + parseFloat(cheque_display);
        var num = parseFloat(totalgiven);
        var total_amount_given_var = createCommas(num.toFixed(2));
        $('#total_amount_given').val(total_amount_given_var);

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
      var cheque_display = $("#payment_cheque_total").val().replace(/,/g, '');
      total = $('#ttlAmt').val().replace(/,/g, '');

      if ($("#payment_amount_to_pay").val() == '') {
        $('#change').val(0);
      } else if ($("#payment_cheque_total").val() == '' || $("#payment_cheque_total").val() == '') {
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
      var cheque_display = $("#payment_cheque_total").val().replace(/,/g, '');
      var cash_tendered2 = $('#payment_cash_tendered').val().replace(/,/g, '');
      var am_to_pay = $('#ttlAmt').val().replace(/,/g, '');

      change_cheque_cash = parseFloat(cash_tendered2) + parseFloat(cheque_display);

      if ($("#payment_amount_to_pay").val() == '') {
        console.log("do nothing");
        $('#change').val(null);
      } else if ($("#payment_cheque_total").val() == '') {
        console.log("do nothing");
        $('#change').val(null);
      }else if ($("#payment_cash_tendered").val() == '') {
        console.log("do nothing");
        $('#change').val(null);
      }else{
        var ttlAmt = parseFloat($('#ttlAmt').val().replace(/,/g, ''));
        var chqCash = parseFloat(change_cheque_cash);


        console.log(ttlAmt);
        console.log(chqCash);


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





    $( "#add_cheque_modal" ).click(function() {
      $('#cheqmodal').modal("show");
    });

    $('#searchmodal').modal({
      show: true,
      keyboard: false,
      backdrop: 'static'
    });


    $("#payment_type_of_payment").change(function(e){
      if ($(this).val() == 4014) {
        // $('#other_items').show();
        $('#other_items').removeAttr('hidden');
        $("#others_f").attr("required",true);
        console.log("hallu");
      }else {
        // $('#other_items').removeAttr('hidden');
        $("#other_items").attr("hidden",true);
        $("#others_f").attr("required",false);
      }


    });



    $('#payment_submit').submit(function(e){
      e.preventDefault();
      if ($('#payment_customer_id').val() == "" ||  $('#payment_customer_id').val() == null) {
        Swal.fire({
          title: 'No select a client first',
          icon: 'error',
          confirmButtonText: 'Ok'
        })
      }else{
        console.log("hello");

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
        payorval = $('#payorname').val();
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

                if ($('#change').val() == "" || $('#change').val() == null ||  $('#ttlAmt').val().replace(',', '') < 0 || $('#total_amount_given').val().replace(',', '') < 0
                || $('#total_amount_given').val().replace(',', '') == 0 ||  $('#ttlAmt').val().replace(',', '') == 0
                ||  $('#total_payment').val().replace(',', '') < 0 || $('#total_payment').val().replace(',', '') < 0 ){
                  Swal.fire({
                    icon: 'error',
                    title: 'Complete the transaction first.',
                  });
                }else if ($('#change').val().replace(',', '') < 0 || $('#change').val() == 'Invalid Input') {
                  Swal.fire({
                    icon: 'error',
                    title: 'Insufficient amount.',
                  });
                }else{

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
                  chq_total();


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
                      $('#frameasdas').attr('src',url);
                      $('#rec').modal('show');
                      // $("#frameasdas").get(0).contentWindow.printMe();
                      // $("#frameasdas").print();

                    },
                    error:function()
                    {
                    }

                  });

                }



              }
            },
            error: function(xhr){
              console.log(xhr.responseText);
            }
          })
        }
      }

    });

    // function printMe() {
    //   window.print()
    // }
    //
    // function printIframe(id)
    // {
    //   var iframe = document.frames
    //   ? document.frames[id]
    //   : document.getElementById(id);
    //   var ifWin = iframe.contentWindow || iframe;
    //
    //   iframe.focus();
    //   ifWin.printPage();
    //   return false;
    // }






    function printReceipt()
    {
      // $("#frameasdas").print();
      $('#rec').modal("hide");
      $('#printModal').modal({
        backdrop: 'static',
        keyboard: false
      })

      $.ajax({
        type: "POST",
        data:$("#payment_submit").serialize(),
        url: global.settings.url +'/MainController/printreceipt',
        xhrFields: {
          responseType: 'blob'
        },
        success:function(res)
        {
          var url = window.URL.createObjectURL(res);
          $('#printFrame').attr('src',url);
          $('#printModal').modal('show');
          // $("#printFrame").get(0).contentWindow.print();
          // $("#frameasdas").print();
        },
        error:function()
        {
          xhr.responseText()
        }
      });
    }




    function savedatanow()
    {

      var customer_id = $('#payment_customer_id').val();
      var tenant_id = $('#payment_tenant_id').val();
      var cash_tendered = $('#payment_cash_tendered').val().replace(',', '');
      var or_number =$('#payment_or_number').val();
      var payor = $('#payor').val();
      var total = parseFloat($('#ttlAmt').val().replace(',', ''));

      var no =  jQuery.parseJSON($("#no").val());
      var particulars =  jQuery.parseJSON($("#particulars").val());
      var date =  jQuery.parseJSON($("#date").val());
      var price = jQuery.parseJSON($("#price").val());
      var transaction_id = 0;
      var arrlength =  no.length - 1;
      var count = 0;

      var cash_rec = $('#cash_total').val();
      var cheque_rec = $('#payment_cheque_total').val();

      //reference number

      $('#today').val(currentDate);
      $('#days').val(n);
      $('#month').val(month);
      $('#year').val(year);
      $('#ornumber').val(res.or_number );
      var lastfourOR = $('#ornumber').val();
      // var tranIDVVAR = $('#transaction_id').val();
      console.log($('#today').val() + 'hello');
      var datenosl = $('#today').val().replace(/\//g, '');
      var lastfour = lastfourOR.substr(lastfourOR.length - 4);
      $('#todaynosl').val(datenosl);
      var refnumpay $('#refnum').val(datenosl + lastfour );




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
            ,payor:payor
            ,total:total
            ,count:i
            ,cheque_rec:cheque_rec
            ,cash_rec:cash_rec
            ,reference_num:refnumpay
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
        var others_val = $('#others_f').val();
        console.log($('#payment_effectivity').val());
        console.log(typeid);
        if (typeid == 4014) {
          console.log("testing others");
          var id =  $("#tbodyParticulars > tr").length;
          id=id +1;
          var html = "";
          html += "<tr>";
          html += "<td>"+typeid+"</td>";
          html += "<td>"+others_val+"</td>";
          html += "<td>"+date+"</td>";
          html += "<td class='text-right amtToPay'>"+amount+"</td>";
          html += "<td><button class='btn btn-outline-danger btn-sm' type='button' onclick='removeItem(this)'>Remove</button></td>";
          html += "</tr>";
          $("#tbodyParticulars").append(html);

        }else {
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
        }


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
        checkpaymetn();
      }

      function clearitems()
      {
        $("#tbodyParticulars").empty();
      }






      $('input[name="pay[paymentCol]"]').change(function(){

        $(".payment_details").val("");
        $("#total_amount_given").val(0.00);
        $("#payment_cheque_total").val(0.00);
        $("#payment_chq_total").text(0.00);
        $("#change").val(0.00);
        $("#payment_or_number").val("");

        var table_cheque = document.getElementById("table_cheque");
        for (var i = table_cheque.rows.length - 1; i > 0; i--) {
          table_cheque.deleteRow(i);
        }

        $(".bankCashCol").attr("hidden", true);
        // $(".bankCashColadd").attr("hidden", true)
        var desc = $(this).val();

        $("."+desc+"Col").attr("hidden", false)

        if (desc == 'bank')
        {
          $("#payment_cash_tendered").attr("readonly", true);
        }
        else{
          $("#payment_cash_tendered").attr("readonly", false)
        }

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
        $("#total_payment").val($("#ttlAmt").val());

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

        //new shit
        //new shit
        //new shit
        //new shit

        $('#sub_total_box').click(function(){
          if($(this).is(":checked")){
            console.log("checked");
            $("#payment_amount_to_pay2").prop("disabled", false );

          }

          else if($(this).is(":not(:checked)")){
            console.log("not checked");
            $("#payment_amount_to_pay2").prop("disabled", true );
            $("#payment_amount_to_pay2").val(0);
          }
        });

      function refnumtest() {

        $('#today').val(currentDate);
        $('#days').val(n);
        $('#month').val(month);
        $('#year').val(year);
        $('#orref').val($('#payment_or_number').val());

        var lastfourOR = $('#payment_or_number').val();
        // var tranIDVVAR = $('#transaction_id').val();
        var datenosl = $('#today').val().replace(/\//g, '');
        var lastfour = lastfourOR.substr(lastfourOR.length - 4);
        // $('#todaynosl').val(datenosl);
        // $('#refnum').val(datenosl + lastfour + tranIDVVAR);

        console.log(datenosl + lastfour);



      }
