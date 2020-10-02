var datable;
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
var add_line = [];
var row_num = 1;
var row_id = 0;
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
var id;



$(document).ready(function(){

  $('#TenantPay').on('hidden.bs.modal', function () {


    var a = $(this).attr("id");

    row_num = 1;
    delete add_line[a];
    $('#row'+a+'').remove();

    delete add_line[a];
    $('#row'+a+'').remove();

    delete add_line[a];
    $('#row'+a+'').remove();
  });

  $('#dateToday').text(month +","+" "+ n +" "+ year);

  $('#add_cheque').on('click', function () {
    console.log(row_num);
    if (row_num >= 4) {
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
    }

  });

  $('#payment_amount_to_payment').change();

  $('#demo').num2words();

  $(document).on('click', '.btn_delete', function(){
    var a = $(this).attr("id");
    row_num--;
    delete add_line[a];
    $('#row'+a+'').remove();
  });

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

      //
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

  $('#printrec').submit(function(e){
    e.preventDefault();

    $.ajax({
      type: "POST",
      data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
      url: global.settings.url +'/MainController/paymentreceiptprint',
      xhrFields: {
        responseType: 'blob'
      },

      success:function(data)
      {
        console.log("hmmm");
        // document.getElementById('frameasdas').contentWindow.location.reload();

        var url = window.URL.createObjectURL(data);
        $('#frameasdas').attr('src',url);
        $('#rec').modal('show');
        $('#rec').modal('hide');

        //  $('#frameasdas').attr('src',data);


      },
      error:function()
      {

      }

    });

  });

  $('#payment_or_number').change(function(){
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
        }

      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  });

  $('#numstall').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofstalls',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numstall').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#numambu').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofambu',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numambu').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#sub_total').click(function(){
    if($(this).is(":checked")){
      particular();
      if($('#payment_amount_to_pay').val() == ""){
        amount_to_pay = 0;
      }
      else
      {
        amount_to_pay = $('#payment_amount_to_pay').val();
      }
      total = parseFloat(total) + parseFloat(amount_to_pay);
      $('#total').val(total);

    }
    else if($(this).is(":not(:checked)")){
      $('#total').val($('#payment_amount_to_pay').val());
    }
  });

  $('#payment_amount_to_pay').change(function(){
    if($('#sub_total').is(":not(:checked)")){
      $('#total').val($('#payment_amount_to_pay').val());
    }
    if($('#sub_total').is(":checked")){
      particular();
      if($('#payment_amount_to_pay').val() == ""){
        amount_to_pay = 0;
      }
      else
      {
        amount_to_pay = $('#payment_amount_to_pay').val();
      }
      total = parseFloat(total) + parseFloat(amount_to_pay);
      $('#total').val(total);
    }
  });

  $('.partnum').change(function(){
    if($('#sub_total').is(":checked")){
      particular();
      if($('#payment_amount_to_pay').val() == ""){
        amount_to_pay = 0;
      }
      else
      {
        amount_to_pay = $('#payment_amount_to_pay').val();
      }
      total = parseFloat(total) + parseFloat(amount_to_pay);
      $('#total').val(total);
    }
  });

  $('#payment_type').change(function(){

    payment_type = $('#payment_type').val();
    if($('#payment_type').val() == 'cash')
    {

      $('#paymentDet').show();
      $('#chequeDetails').hide();
      $('#payment_cash_tendered').prop('disabled',false);
    }
    else if($('#payment_type').val() == 'cheque'){
      $('#paymentDet').show();
      $('#chequeDetails').show();
      $('#payment_cash_tendered').prop('disabled',true);
    }
    else if($('#payment_type').val() == 'cashandcheque')
    {
      $('#paymentDet').show();
      $('#chequeDetails').show();
      $('#payment_cash_tendered').prop('disabled',false);
    }
    else{
      $('#paymentDet').hide();
      $('#chequeDetails').hide();
      $('#payment_cash_tendered').prop('disabled',true);
    }

  });

  $('#payment_submit').click(function(){


    text1 = $('#part1text').val();
    text2 = $('#part2text').val();
    text3 = $('#part3text').val();
    text4 = $('#part4text').val();
    text5 = $('#part5text').val();
    text6 = $('#part6text').val();
    text7 = $('#part7text').val();

    num1 = $('#part1num').val();
    num2 = $('#part2num').val();
    num3 = $('#part3num').val();
    num4 = $('#part4num').val();
    num5 = $('#part5num').val();
    num6 = $('#part6num').val();
    num7 = $('#part7num').val();

    ntw = $('#ntwntw').val();
    console.log(ntw);

    customer_id = $('#payment_customer_id').val();
    tenant_id = $('#payment_tenant_id').val();
    type_of_payment = $('#payment_type_of_payment').val();
    or_number =$('#payment_or_number').val();
    amount_to_pay = $('#payment_amount_to_pay').val();
    cash_tendered = $('#payment_cash_tendered').val();
    payment_effectivity = $('#payment_effectivity').val();
    payment_name = $('#payment_name').val();
    total = parseFloat($('#total').val());
    var fund_id = 1;
    var payment_type = $('#payment_type').val();






    add_line = add_line.filter(function(el){
      return el != null;
    });




    switch(payment_type)
    {
      case "cash":
      $.ajax({
        type: "POST",
        data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
        url: global.settings.url +'/MainController/savetransaction',
        success: function(res){
          $('#TenantPay').modal("hide");
          // $('#rec').modal('show');
          $.ajax({
            type: "POST",
            data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
            url: global.settings.url +'/MainController/paymentreceipt',
            xhrFields: {
              responseType: 'blob'
            },

            success:function(data)
            {


              // document.getElementById('frameasdas').contentWindow.location.reload();

              var url = window.URL.createObjectURL(data);
              $('#frameasdas').attr('src',url);
              $('#rec').modal('show');

              //  $('#frameasdas').attr('src',data);

            },
            error:function()
            {

            }

          });

          // $('#payer').val(payment_name);
          // $('#totalprint').val(total);
          // $('#cashcheck').val(payment_type);
          // $('#print').modal('show');
        },
        error: function(res){

        }
      });


      break;
      case "cheque":

      $.ajax({
        type: "POST",
        data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
        url: global.settings.url +'/MainController/savetransaction',
        success: function(res){

          res= jQuery.parseJSON(res);

          transaction_id = res[0].transaction_id;


          for(var i = 0; i< add_line.length;i++)
          {

            add_line[i]['ch[fk_transaction_id]'] = transaction_id;

            $.ajax({
              type: "POST",
              data: add_line[i],
              url: global.settings.url +'/MainController/savecheque',

              success: function(res){
                $('#TenantPay').modal("hide");
              },
              error: function(res){

              }
            });
            check_amount[i] =  add_line[i]['ch[cheque_amount]'];
            check_number[i] =  add_line[i]['ch[cheque_number]'];
            check_date[i] =    add_line[i]['ch[cheque_date]'];
            bank[i] =          add_line[i]['ch[bank_branch]'];
          }

          $.ajax({
            type: "POST",
            data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
            url: global.settings.url +'/MainController/paymentreceipt',
            xhrFields: {
              responseType: 'blob'
            },

            success:function(data)
            {

              // document.getElementById('frameasdas').contentWindow.location.reload();

              var url = window.URL.createObjectURL(data);
              $('#frameasdas').attr('src',url);
              $('#rec').modal('show');

              //  $('#frameasdas').attr('src',data);


            },
            error:function()
            {

            }

          });
        },
        error: function(res){

        }
      });





      break;

      case "cashandcheque":


      $.ajax({
        type: "POST",
        data:{fund_id:fund_id,payment_type:payment_type,customer_id:customer_id,tenant_id:tenant_id,type_of_payment:type_of_payment,or_number:or_number,amount_to_pay:amount_to_pay,cash_tendered:cash_tendered,payment_effectivity:payment_effectivity},
        url: global.settings.url +'/MainController/savetransaction',
        success: function(res){

          res= jQuery.parseJSON(res);

          transaction_id = res[0].transaction_id;
          for(var i = 0; i< add_line.length;i++)
          {

            add_line[i]['ch[fk_transaction_id]'] = transaction_id;
            $.ajax({
              type: "POST",
              data: add_line[i],
              url: global.settings.url +'/MainController/savecheque',

              success: function(res){
                $('#TenantPay').modal("hide");
              },
              error: function(res){

              }
            });

            check_amount[i] =  add_line[i]['ch[cheque_amount]'];
            check_number[i] =  add_line[i]['ch[cheque_number]'];
            check_date[i] =    add_line[i]['ch[cheque_date]'];
            bank[i] =          add_line[i]['ch[bank_branch]'];

          }

          $.ajax({
            type: "POST",
            data: {amount_to_pay:amount_to_pay,type_of_payment:type_of_payment,ntw:ntw,check_amount:check_amount,check_number:check_number,check_date:check_date,bank:bank,or_number:or_number,text1:text1,text2:text2,text3:text3,text4:text4,text5:text5,text6:text6,text7:text7,num1:num1,num2:num2,num3:num3,num4:num4,num5:num5,num6:num6,num7:num7,payment_name:payment_name,total:total,payment_type:payment_type},
            url: global.settings.url +'/MainController/paymentreceipt',
            xhrFields: {
              responseType: 'blob'
            },

            success:function(data)
            {

              // document.getElementById('frameasdas').contentWindow.location.reload();

              var url = window.URL.createObjectURL(data);
              $('#frameasdas').attr('src',url);
              $('#rec').modal('show');

              //  $('#frameasdas').attr('src',data);


            },
            error:function()
            {

            }

          });


        },
        error: function(res){

        }
      });



      break;
      default:
      alert("");
      break;


      customer_id = "";
      tenant_id = "";
      type_of_payment = "";
      or_number = "";
      amount_to_pay = "";
      cash_tendered = "";
      payment_effectivity = "";
      fund_id = 1;
      payment_type = "";

    }
  });

  $('#numAllTrans').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofcurtrans',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numAllTrans').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('.dataTables_length').addClass('bs-select');

  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: global.settings.url + '/MainController/updatecustomerinfo',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        Swal.fire({
          icon: 'success',
          title: 'Updated',
        });
        $('#client_info_modal').modal('hide');
        $('#client_table').DataTable().ajax.reload();
        $('#updatecustomerinfo')[0].reset();

      },
      error:function(res){

      }
    });
  });

  $( "#payhistbtn" ).click(function() {
    $('#client_info_modal').modal('hide');
    $('#violationmodal').modal('show');
  });



  // jvector map jvector map jvector map jvector map jvector map jvector map jvector map jvector map
  // jvector map jvector map jvector map jvector map jvector map jvector map jvector map jvector map
  var myCustomColors = {
    "FC-49": '#4E7387',
    "FC-25":'#333333',
    "name262":'#333333'
    };

  var map = new jvm.Map({
    container: $('#map'),
    map: 'ground_floor',
    backgroundColor: '#22313F',
    series: {
        regions: [{

            attribute: "fill",
            values: {
              "FC-49": '#4E7387',
              "FC-25":'#333333',
              "name262":'#333333'
            },

        }],

    },
    onRegionClick: function (event, code) {
      // Swal.fire({
      //   icon: 'error',
      //   title: 'Under development',
      // });

      $('#basicExampleModal').modal('show');
      $("#stallhead").text(map.getRegionName(code));
      $("#stallhead_pay").text(map.getRegionName(code));
      $("#stallinput").val(map.getRegionName(code));

      var stall_list_table =  $('#stall_floor_info').DataTable({

        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        searching: false,
        "ajax" : {
          "url" : global.settings.url + '/MainController/getstallFLOOR/' + code,
          "type": 'POST',
          "dataType":'JSON',

          dataSrc : 'data'
        },
        "columns" : [{
          "data" : "unit_no"
        },

        {
          "data" : "name"
        },

        {
          "data" : "effectivity"
        },



        {
          "data" : "payment"
        },


        {
          "data" : "client_info"
        }]
      });

      $('#basicExampleModal').on('hidden.bs.modal', function () {
        stall_list_table.destroy();
      });
    }

  });

  map.series.regions[0].setValues(myCustomColors);
  // jvector map jvector map jvector map jvector map jvector map jvector map jvector map jvector map
  // jvector map jvector map jvector map jvector map jvector map jvector map jvector map jvector map

  $('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box
       if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
           $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
       }
   });
});

//end of doc ready end of doc ready end of doc ready end of doc ready
//end of doc ready end of doc ready end of doc ready end of doc ready
//end of doc ready end of doc ready end of doc ready end of doc ready

function launch_pay(id){
  // $.ajax({
  //   url: global.settings.url + '/MainController/checkviolationpay',
  //   type: 'POST',
  //   data: {
  //     id: id
  //   },
  //   dataType:'JSON',
  //   success: function(res){
  //     if (res == 'withviolation') {
  //       Swal.fire({
  //         icon: 'error',
  //         title: 'Pay the violation first',
  //       });
  //
  //     }else {
  //       res = res[0];
  //       $('#TenantPay').modal("show");
  //       $('#paymentDet').hide();
  //       $('#chequeDetails').hide();
  //       $('#payment_type').val(null);
  //       $('.payment_details').val('');
  //       $('.rowrow').remove();
  //       $('#payment_cheque_number').val("");
  //       $('#payment_cheque_amount').val("");
  //       $('#payment_cheque_date').val("");
  //       $('#payment_bank_branch').val("");
  //       stall_no = res.unit_no;
  //       $('#payment_customer_id').val(res.customer_id);
  //       $('#payment_name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
  //       $('#payment_tenant_id').val(res.tenant_id);
  //     }
  //   },
  //   error: function(xhr){
  //     console.log(xhr.responseText);
  //   }
  // })
}



function fetchdata(id){
  $('#client_info_modal').modal('show');
  customerinfo(id);
  transactionhistory(id);
}

function customerinfo(id){
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfopaycon',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      $('#customer_id').val(res[0].customer_id)
      $('#owner_fn').val(res[0].firstname);
      $('#owner_mn').val(res[0].middlename);
      $('#owner_ln').val(res[0].lastname);
      $('#owner_add').val(res[0].address);
      $('#owner_cn').val(res[0].contact_no);

      $('#occu_fn').val(res[0].oafirstname);
      $('#occu_mn').val(res[0].oamiddlename);
      $('#occu_ln').val(res[0].oalastname);
      $('#occu_add').val(res[0].oaaddress);
      $('#occu_cn').val(res[0].contact_no);

      $('#stall_id').val(res[0].stall_id)
      $('#stall_number').val(res[0].stall_number);
      $('#area').val(res[0].area);
      $('#daily_fee').val(res[0].daily_fee);
      $('#stall_flr_lvl').val(res[0].floor_level);
      $('#nature_or_business').val(res[0].nature_or_business);
      $('#business_id').val(res[0].business_id);
      $('#business_name').val(res[0].business_name);
      $('#Section').val(res[0].Section);

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}



function transactionhistory(id){
  $('#pay_hist_tab').DataTable().destroy();
  $('#pay_hist_tab').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcustomertransactionhistory/' + id,
      type: 'GET',
      dataSrc : "data",
    },
    "columns" : [{
      "data" : "or_no"
    },

    {
      "data" : "nature_of_payment"
    },

    {
      "data" : "amount"
    },


    {
      "data" : "date"
    }]

  });

  $('.dataTables_length').addClass('bs-select');
}

function particular(){

  if($('#part1num').val() == ""){
    num1 = 0;
  }
  else{
    num1 = $('#part1num').val();
  }

  if($('#part2num').val() == ""){
    num2 = 0;
  }
  else{
    num2 = $('#part2num').val();
  }

  if($('#part3num').val() == ""){
    num3 = 0;
  }
  else{
    num3 = $('#part3num').val();
  }

  if($('#part4num').val() == ""){
    num4 = 0;
  }
  else{
    num4 = $('#part4num').val();
  }

  if($('#part5num').val() == ""){
    num5 = 0;
  }
  else{
    num5 = $('#part5num').val();
  }

  if($('#part6num').val() == ""){
    num6 = 0;
  }
  else{
    num6 = $('#part6num').val();
  }

  if($('#part7num').val() == ""){
    num7 = 0;
  }
  else{
    num7 = $('#part7num').val();
  }

  total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) + parseFloat(num5) + parseFloat(num6) + parseFloat(num7);

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
