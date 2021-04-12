var datable;
var conCollectorName;
var conDateFrom;
var conDateTo;
var conClientType;

var exCollector;
var exDateFrom;
var exDateTo;
var exClientType;


var url = $(location). attr("href");
var id = url.substring(url.lastIndexOf('/') + 1);

function loadclient(id) {

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
        // clearitems();
        // console.log(res.customer_id);
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

$(document).ready(function(){

loadclient(id);


});
