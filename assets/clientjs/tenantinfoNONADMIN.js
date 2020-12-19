var datable;
var id;

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

  $("#business_id").inputFilter(function(value){
    return /^-?\d*$/.test(value);  });

    $("#occu_cn").inputFilter(function(value){
      return /^-?\d*$/.test(value);  });

      $("#owner_cn").inputFilter(function(value){
        return /^-?\d*$/.test(value);  });

        $( "#payhistbtn" ).click(function() {
          $('#violationmodal').modal('show');
        });

        function isEmptyOrSpaces(str){
          return str === null || str.match(/^ *$/) !== null;
        }

        $('#search_cl_s').on('change', function() {
          var search = $("#search_cl_f").val();
          var searchcat = $(this).children("option:selected").val();
          if (isEmptyOrSpaces(search)) {
            console.log("do nothing");
          }else if ($(this).children("option:selected").text() == "Please Select") {
            console.log("do nothing");
          }else {
            $('#client_table').DataTable().clear().destroy();
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
              $('#client_table').DataTable().clear().destroy();
              search_client(search, searchcat);
            }
          }
        });

        function search_client(search, searchcat) {
          $('#client_table').DataTable({
            "paging": true,
            "searching": false,
            "ordering": true,
            "ajax" : {
              "url" : global.settings.url + '/MainController/getcustomerinfotable',
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
            }

          ]
        });
        // $('.dataTables_length').addClass('bs-select');
      }




      // $('#client_table').DataTable({
      //   "ajax" : {
      //     "url" : global.settings.url + '/MainController/getcustomertable',
      //     dataSrc : 'data'
      //   },
      //   "columns" : [{
      //     "data" : "id"
      //   },
      //
      //   {
      //     "data" : "c_info_stall_number"
      //   },
      //
      //   {
      //     "data" : "c_info_area"
      //   },
      //
      //
      //   {
      //     "data" : "c_info_daily_fee"
      //   },
      //
      //
      //   {
      //     "data" : "c_info_fullname_owner"
      //   },
      //
      //   {
      //     "data" : "c_info_fullname_occupant"
      //   },
      //   {
      //     "data" : "btn"
      //   }]
      // });



      $('.dataTables_length').addClass('bs-select');







    });

    //end of doc ready




    function diffdates2() {
      var dp1 = document.getElementById('last_pay').value;
      var daily = document.getElementById('daily_fee').value;



      if(new Date() <= new Date(dp1))
      {//compare end <=, not >=
        //your code here
        document.getElementById('debt_field').value = "STILL PAID";

      }else {
        // Split timestamp into [ Y, M, D, h, m, s ]
        var t = dp1.split(/[- :]/);

        // Apply each element to the Date function
        var d = new Date(Date.UTC(t[0], t[1]-1, t[2]));
        console.log(d);

        dp2 = new Date();
        var date2 = dp2.getTime();
        var ONE_DAY = 1000 * 60 * 60 * 24


        // get total seconds between two dates
        var res = Math.abs(d - date2) / 1000;
        var days = Math.floor(res / 86400);
        var debt = days * daily;
        if (debt == 0) {
          document.getElementById('debt_field').value = "PAID";
        } else {
          document.getElementById('debt_field').value = debt;
        }
        // document.getElementById('debt_field').value = debt;

        console.log(days);
        console.log(debt);

        var start = new Date("2010-04-01");
      }

      // var end   = new Date(),
      // diff  = new Date(end - dp1),
      // days  = diff/1000/60/60/24;
      // days;
      // var debt = days * daily;
      // document.getElementById('debt_field').value = debt;
      // console.log(days);
    }

    function getdebt(id) {
      console.log(id);
      $.ajax({
        url: global.settings.url + '/MainController/getdebtcon',
        type: 'POST',
        data: {
          id: id
        },
        dataType:'JSON',
        success: function(res){
          console.log(res);


          if (res == "stillnopay") {
            $('#last_pay').val("No history of past transactions");
            $('#debt_field').val("");
          }else {
            $('#last_pay_type').val(res[0].payment_nature_name);
            $('#last_pay').val(res[0].effectivity);
            diffdates2();
          }

        },
        error: function(xhr){
          console.log(xhr.responseText);

        }
      });

    }

    function fetchdata(id){
      document.getElementById("updatecustomerinfo2").reset();
      customerinfo(id);
      transactionhistory(id);
      getdebt(id);
    }

    function customerinfo(id){
      console.log(id);
      $.ajax({
        url: global.settings.url + '/MainController/getcustomerinfocon',
        type: 'POST',
        data: {
          id: id
        },
        dataType:'JSON',
        success: function(res){
          console.log(res);
          $('#last_pay').val();
          console.log(res[0].customer_id);
          $('#customer_id').val(res[0].customer_id)
          $('#owner_fn').val(res[0].firstname);
          $('#owner_mn').val(res[0].middlename);
          $('#owner_ln').val(res[0].lastname);
          $('#owner_add').val(res[0].address);
          $('#owner_cn').val(res[0].contact_number);
          $('#occu_fn').val(res[0].aofirstname);
          $('#occu_mn').val(res[0].aomiddlename);
          $('#occu_ln').val(res[0].aolastname);
          $('#occu_add').val(res[0].aoaddress);
          $('#occu_cn').val(res[0].ao_cn);
          $('#stall_id').val(res[0].stall_id)
          $('#stall_number').val(res[0].unit_no);
          $('#area').val(res[0].sqm);
          $('#daily_fee').val(res[0].dailyfee);
          $('#stall_flr_lvl').val(res[0].floor_level);
          $('#nature_or_business').val(res[0].nature_or_business);
          $('#business_id').val(res[0].business_id);
          $('#business_name').val(res[0].business_name);
          $('#Section').val(res[0].Section);
          $('#date_occupied').val(res[0].date_occupied);
          $('#last_pay').val(res[0].payment_datetime);

          $('#stallf_date_reg').val(res[0].date_registered);
          $('#stallf_date_renew').val(res[0].date_renewed);

          // diffdates();
          // if (res[0].customer_id == null) {
          //   console.log("yepo");
          // }else {
          //   console.log('nahhh');
          // }

        },
        error: function(xhr){
          console.log(xhr.responseText);
          console.log('yow');
        }
      })
    }



    function transactionhistory(id){
      $('#pay_hist_tab').DataTable().clear().destroy();
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


    function openauth(){

      $("#loginauthmodal").modal('show');

    }


    $('#updatecustomerinfo2').submit(function(e){
      console.log("helllo");
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
          $('#client_table').DataTable().ajax.reload();
          // $('#updatecustomerinfo')[0].reset();
        },
        error:function(res){

        }
      });
    });
    

    $('#login_account').submit(function(e){
      e.preventDefault();
      $.ajax({
        url : global.settings.url + '/Pages/login_acc',
        type : 'POST',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(res){

          if(res.user_level == 0)
          {
            Swal.fire({
              title: 'Are you sure?',
              text: "Do you want to save changes?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                $("#loginauthmodal").modal('hide');
                $( "#updatecustomerinfo2" ).submit();



              } else{
                console.log("no");

              }

            })


          }else if (res.user_level == 1) {
            Swal.fire({
              icon: 'error',
              title: 'User Not Authorized'
            });
          }
          else if(res == 'usernameError'){
            Swal.fire({
              icon: 'error',
              title: 'Wrong Credentials',
              text: 'Username not found'
            });
          }
          else if(res == 'passwordError'){
            Swal.fire({
              icon: 'error',
              title: 'Wrong Credentials',
              text: 'password does not match'
            });
          }


        },
        error : function(xhr){
          console.log('kenneth');
          console.log(xhr.responseText);
        }
      })

    });
