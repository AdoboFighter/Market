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
      // {
      //   "data" : "id"
      // },

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
      },

      {
        "data" : "cancel"
      }

    ]
  });

  $('#stallpaidtable').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/stallpaidtable',
      dataSrc : 'data'
    },
    "columns" : [
      // {
      //   "data" : "id"
      // },

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

      $('#notestable').DataTable({
        "ajax" : {
          "url" : global.settings.url + '/MainController/getstallnotes',
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
            "data" : "unit_no"
          },

          {
            "data" : "btn_view"
          },


          {
            "data" : "btn_add"
          }]
        });


        $('#debttable').DataTable({
          "autoWidth": false,
          "ajax" : {
            "url" : global.settings.url + '/MainController/debttable',
            dataSrc : 'data'
          },
          "columns" : [

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
              "data" : "btn_view"
            }]
          });

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

          $( "#notesclick" ).on('click',function() {
            $('#notesclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
              $(this).removeClass();
            });

            $("#notesclickmodal").modal('show');

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

          $( "#ORcancelclick" ).on('click',function() {
            $('#ORcancelclick').addClass('animated bounceIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
              $(this).removeClass();
            });

            $("#ORcancelmodal").modal('show');

          });

          $('#noteaddform').submit(function(e){
            var isNewOrUpdate =  $('#note_id').val();
            if (isNewOrUpdate == "" || isNewOrUpdate == null) {
              e.preventDefault();
              $.ajax({
                url : global.settings.url +'/MainController/save_notes',
                type : 'POST',
                data :$(this).serialize(),
                dataType : 'json',
                success : function(res){
                  Swal.fire({
                    icon: 'success',
                    title: 'Note Added'
                    // text: 'This tenant must pay the fee before doing any transactions',
                  });
                  $('#notesaddmodal').modal("toggle");
                  $('#noteaddform')[0].reset();
                  console.log(res);
                },
                error : function(xhr){
                  console.log(xhr.responseText);
                }
              });
            }else {
              e.preventDefault();
              $.ajax({
                url : global.settings.url +'/MainController/update_note',
                type : 'POST',
                data :$(this).serialize(),
                dataType : 'json',
                success : function(res){
                  Swal.fire({
                    icon: 'success',
                    title: 'Note Saved'
                    // text: 'This tenant must pay the fee before doing any transactions',
                  });
                  $('#notesaddmodal').modal("toggle");
                  $('#noteaddform')[0].reset();
                  console.log(res);
                },
                error : function(xhr){
                  console.log(xhr.responseText);
                }
              });
            }


          });

          function viewnotes(id) {
            $("#notesviewmodal").modal('show');
            $("#notesclickmodal").modal("toggle");
            $('#viewnotestable').DataTable().clear().destroy();
            getviewnote(id);
            getnameheader(id);

          }

          function addnotes(id) {
            $('#noteaddform')[0].reset();
            $('#note_id_fk').val(id);
            $('#notesmodaldynamic').text("Add new note");
            $("#notesaddmodal").modal('show');
          }

          function getnameheader(id) {
            $.ajax({
              url: global.settings.url + '/MainController/getcustomerinfocon',
              type: 'POST',
              data: {
                id: id
              },
              dataType:'JSON',
              success: function(res){
                console.log(res.unit_no);
                $('#namednote').text(res[0].unit_no);

              },
              error: function(xhr){
                console.log(xhr.responseText);
                console.log("putang ina lang :)???");
              }
            })
          }

          function getviewnote(fk_custid_note) {

            $('#viewnotestable').DataTable({
              "paging": true,
              "searching": false,
              "ordering": true,
              "ajax" : {
                "url" : global.settings.url + '/MainController/getviewnote',
                "data": {fk_custid_note:fk_custid_note},
                "dataType": "json",
                "type": "POST"
              },
              "columns" : [{
                "data" : "title"
              },

              {
                "data" : "date_added"
              },

              {
                "data" : "btn_view"
              },

              {
                "data" : "btn_delete"
              }]
            });
            $('.dataTables_length').addClass('bs-select');
          }

          function viewnotedb(id) {
            $("#notesviewmodal").modal('toggle');
            $("#notesaddmodal").modal('show');

            $.ajax({
              url: global.settings.url + '/MainController/getnotesingles',
              type: 'POST',
              data: {
                id: id
              },
              dataType:'JSON',
              success: function(res){
                console.log(res.unit_no);
                $('#notesmodaldynamic').text("Note Details");
                // $('#dynamicbtnnotetxt').text("Save");
                $('#note_id').val(res[0].note_id);
                $('#note_title').val(res[0].title);
                $('#note_date').val(res[0].date_added);
                $('#note_desc').val(res[0].note);
                $('#note_id_fk').val(res[0].fk_customer_id_note);

              },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            })

          }

          function deletenotedb(id) {
            console.log(id);
            $.ajax({
              url : global.settings.url +'/MainController/delete_note',
              type : 'POST',
              data :{
                id: id
              },
              dataType : 'json',
              success : function(res){
                Swal.fire({
                  icon: 'success',
                  title: 'Note removed'
                  // text: 'This tenant must pay the fee before doing any transactions',
                });
                $('#viewnotestable').DataTable().ajax.reload();
                console.log(res);
              },
              error : function(xhr){
                console.log(xhr.responseText);
              }
            });

          }


          $('#cancelorform').submit(function(e){
            var or_number = $('#ORnum_f').val();
            var form = $(this);
            e.preventDefault();

            // $.ajax({
            //   url: global.settings.url + '/MainController/cancelor',
            //   type: 'POST',
            //   data: $(this).serialize(),
            //   dataType:'JSON',
            //   success: function(res){
            //     $('#ORcancelmodal').modal("toggle");
            //     Swal.fire({
            //       icon: 'success',
            //       title: 'OR cancelled',
            //     });
            //
            //   },
            //   error:function(res){
            //     console.log('sala');
            //   }
            // });

            $.ajax({
              url: global.settings.url + '/MainController/checkOr',
              type: 'POST',
              data: {
                or_number: or_number
              },
              dataType:'JSON',
              success: function(res){

                if(res=="wala"){
                  Swal.fire({
                    title: 'O.R number does not exist!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                  })
                }else {
                  Swal.fire({
                    title: 'Remove Effectivity?',
                    text: "are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Remove',
                    // reverseButtons: true
                  }).then((result) => {
                    if (result.value) {

                      $.ajax({
                        url: global.settings.url + '/MainController/cancelor',
                        type: 'POST',
                        data: form.serialize(),
                        dataType:'JSON',
                        success: function(res){
                          $('#ORcancelmodal').modal("toggle");
                          Swal.fire({
                            icon: 'success',
                            title: 'OR cancelled',
                          });

                        },
                        error:function(res){
                          console.log('sala');
                        }
                      });

                    }else {
                      console.log("do nothing");
                    }
                  })

                }

              },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            })

          });

          function topay(id) {
            Swal.fire({
              title: 'Proceed to payment?',

              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Proceed',
              // reverseButtons: true
            }).then((result) => {
              if (result.value) {

                window.open(global.settings.url + '/pages/view/paymentTenant/'+id,'_blank');

                // $.ajax({
                //   url : global.settings.url +'/MainController/proceedtopay/' + id,
                //   type : 'POST',
                //   data : {id:id},
                //   dataType : 'html',
                //   success : function(res){
                //     console.log("controller worikng");
                //     window.open(global.settings.url + '/pages/view/dev/MainController?proceedtopay='+id,'_blank');
                //     // location.href = global.settings.url + '/pages/view/dev', '_blank';
                //
                //   },
                //   error : function(xhr){
                //     console.log('Controller not working');
                //     console.log(xhr.responseText);
                //   }
                // })

                // $.ajax({
                //   url : global.settings.url +'/MainController/proceedtopay/' + id,
                //   type : 'POST',
                //
                //   dataType : 'json',
                //   success : function(res){
                //
                //     console.log(res);
                //     var a = document.createElement('a');
                //     var url = window.URL.createObjectURL(res);
                //
                //     a.href = global.settings.url + '/pages/view/dev';
                //
                //     location.href = global.settings.url + '/pages/view/dev';
                //     window.open(global.settings.url + '/pages/view/dev', '_blank');
                //
                //
                //
                //   },
                //   error : function(xhr){
                //     console.log("controller not working");
                //
                //   }
                //
                // });

              }else {
                console.log("do nothing");
              }
            })

          }
