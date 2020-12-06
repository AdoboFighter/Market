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

  $('#dateToday').text(month +","+" "+ n +" "+ year);

  $.ajax({
    url: global.settings.url +'/MainController/fetch_user',
    type:'POST',
    success:function(data)
    {

      console.log(data);
      data = JSON.parse(data);

      data.forEach(function(e, i){
        // $('#user_select').append($('<option><option/>').val(e.user_id).text(e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname));
        $('#user_select').append(new Option((e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname), (e.user_id)));
        // $('#SysUser').append(new Option((e.usr_firstname +' '+ e.usr_middlename+' '+e.usr_lastname), (e.user_id)));
      });
    }
  });

  $('#user_select').change(function(){
    console.log($(this).val());
    console.log($(this).find(':selected').text());

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

  $('#numvio').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofviolation',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        if (res == null) {
          $('#numvio').text("0");
        } else {
          $('#numvio').text(res);
        }

      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#numoftrans').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofcurtrans',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        if (res == null) {
          $('#numoftrans').text("0");
        } else {
          $('#numoftrans').text(res);
        }
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#stallspaid').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/stallspaid',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        if (res == null) {
          $('#stallspaid').text("0");
        } else {
          $('#stallspaid').text(res);
        }
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#debtstat').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/debtstat',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        if (res == null) {
          $('#debtstat').text("0");
        } else {
          $('#debtstat').text(res);
        }
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#transtodaytable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/transtodaytable',
      dataSrc : 'data'
    },
    "columns" : [
      {
        "data" : "id"
      },

      {
        "data" : "name"
      },

      {
        "data" : "or"
      },


      {
        "data" : "amount"
      },

      {
        "data" : "nature"
      },

      {
        "data" : "effectivity"
      },

      {
        "data" : "date"
      }]
    });

    $('#stallpaidtable').DataTable({
      "ajax" : {
        "url" : global.settings.url + '/MainController/stallpaidtable',
        dataSrc : 'data'
      },
      "columns" : [
        {
          "data" : "id"
        },

        {
          "data" : "name"
        },

        {
          "data" : "unit"
        },

        {
          "data" : "or"
        },


        {
          "data" : "amount"
        },

        {
          "data" : "nature"
        },

        {
          "data" : "effectivity"
        },

        {
          "data" : "date"
        }]
      });

      $('#ambutablehome').DataTable({
        "ajax" : {
          "url" : global.settings.url + '/MainController/ambutablehome',
          dataSrc : 'data'
        },
        "columns" : [
          {
            "data" : "id"
          },
          {
            "data" : "pay_ambu_name"
          },

          {
            "data" : "pay_ambu_location"
          },

          {
            "data" : "pay_ambu_locnum"
          },

          {
            "data" : "nature_of_business"
          }]
        });

      // $('#debttablewith').DataTable({
      //   "ajax" : {
      //     "url" : global.settings.url + '/MainController/debttablewith',
      //     dataSrc : 'data'
      //   },
      //   "columns" : [
      //     {
      //       "data" : "id"
      //     },
      //
      //     {
      //       "data" : "name"
      //     },
      //
      //     {
      //       "data" : "unit"
      //     },
      //
      //     {
      //       "data" : "or"
      //     },
      //
      //
      //     {
      //       "data" : "amount"
      //     },
      //
      //     {
      //       "data" : "nature"
      //     },
      //
      //     {
      //       "data" : "effectivity"
      //     },
      //
      //     {
      //       "data" : "date"
      //     }]
      //   });
      //
      //   $('#debttableno').DataTable({
      //     "ajax" : {
      //       "url" : global.settings.url + '/MainController/debttableno',
      //       dataSrc : 'data'
      //     },
      //     "columns" : [
      //       {
      //         "data" : "id"
      //       },
      //
      //       {
      //         "data" : "name"
      //       },
      //
      //       {
      //         "data" : "unit"
      //       },
      //
      //       {
      //         "data" : "or"
      //       },
      //
      //
      //       {
      //         "data" : "amount"
      //       },
      //
      //       {
      //         "data" : "nature"
      //       },
      //
      //       {
      //         "data" : "effectivity"
      //       },
      //
      //       {
      //         "data" : "date"
      //       }]
      //     });

      $('#getviolationtable').DataTable({
        "ajax" : {
          "url" : global.settings.url + '/MainController/get_violation_data_con',
          dataSrc : 'data'
        },
        "columns" : [
        {
          "data" : "customer_id"
        },
        {
          "data" : "description"
        },
        {
          "data" : "date_occured"
        },

        {
          "data" : "status"
        },
        {
          "data" : "name"
        }]
      });


      });


      $( "#userclick" ).on('click',function() {
        $('#userclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#userdetailsmodal").modal('show');

      });

      $( "#regambuclick" ).on('click',function() {
        $('#regambuclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#regambuclickmodal").modal('show');

      });

      $( "#violationclick" ).on('click',function() {
        $('#violationclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#violationclickmodal").modal('show');

      });

      $( "#stallspaidclick" ).on('click',function() {
        $('#stallspaidclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#stallspaidclickmodal").modal('show');

      });

      $( "#transtodayclick" ).on('click',function() {
        $('#transtodayclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#transtodayclickmodal").modal('show');

      });

      $( "#dateclick" ).on('click',function() {
        $('#dateclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });



      });

      $( "#debtclick" ).on('click',function() {
        $('#debtclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
        });

        $("#debtclickmodal").modal('show');

      });
