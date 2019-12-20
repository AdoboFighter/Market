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


$(document).ready(function(){


  $('#cert_table').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcerttable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "c_info_fullname_owner"
    },

    {
      "data" : "c_info_address"
    },
    {
      "data" : "c_info_stall_number"
    },

    {
      "data" : "btn"
    }]
  });

  $('#location').on('change', function(e) {
    $('#cert').val(this.value);
    e.preventDefault();
    $.ajax({
      url : global.settings.url + '/MainController/pdf2fcert',
      type : 'POST',
      data : $('#certform').serialize(),
      xhrFields: {
        responseType: 'blob'
      },
      success : function(res){
        //   $('#modalBirthday').modal('show');
        var a = document.createElement('a');
        var url = window.URL.createObjectURL(res);
        a.href = url;
        $('#iframe_preview_formgen').attr('src',url);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });

  });

  $('.dataTables_length').addClass('bs-select');

  $('#certform').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: global.settings.url + '/MainController/updatecert',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        $('#certmodal').modal("toggle");
        Swal.fire({
          icon: 'success',
          title: 'Certification Effectivity Removed',
        });
        $('#cert_table').DataTable().ajax.reload();

      },
      error:function(res){
        console.log('sala');
      }
    });
  });

    });


  function fetchdata(id){


    $('#certmodal').modal("show");




    console.log(id);
    $.ajax({
      url: global.settings.url + '/MainController/get_cert_info_con',
      type: 'POST',
      data: {id: id},
      dataType:'JSON',
      success: function(res){
        console.log(res);
        res = res[0];
        $('#transaction_id').val(res.transaction_id );
        $('#fname').val(res.firstname );
        $('#mname').val(res.middlename );
        $('#lname').val(res.lastname);
        $('#address').val(res.address);
        $('#natbus').val(res.nature_or_business);
        $('#flrlvl').val(res.address);
        $('#stall').val(res.unit_no);
        $('#floor_level').val(res.floor_level);
        $('#or_number').val(res.or_number);
        $('#payment_amount').val(res.payment_amount);
        $('#address').val(res.address);
        $('#today').val(currentDate);
        $('#days').val(n);
        $('#month').val(month);
        $('#year').val(year);


      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
