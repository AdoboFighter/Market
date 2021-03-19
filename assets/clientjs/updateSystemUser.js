var datable;

$(document).ready(function(){

  $("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
});

  $('.dataTables_length').addClass('bs-select');

  $('#updateuser').submit(function(e){
    user_id = $('#usr_id').val();
    e.preventDefault();
    if(user_id == null || user_id == ''){
      Swal.fire({
        icon: 'error',
        title: 'Select a user',
        text: 'Select a user to load data',
      })
    }else {
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
          $('#rec').modal("hide");
          console.log("yes");
          console.log( $('#updateuser').serializeArray() );
          $.ajax({
            url : global.settings.url +'/MainController/updateSystemUserCon',
            type : 'POST',
            data :$(this).serialize(),
            dataType : 'json',
            success : function(res){
              console.log(res);
              $('#sys_table').DataTable().ajax.reload();
              $('#updateuser').trigger("reset");
              Swal.fire({
                icon: 'success',
                title: 'System user updated',
              });

            },
            error : function(xhr){
              console.log(xhr.responseText);
            }

          });
        } else{
          console.log("no");
        }

      })
    }




  });


  function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
  }

  $('#search_cl_s').on('change', function() {
    var search = $("#search_cl_f").val();
    var searchcat = $(this).children("option:selected").val();
    if (isEmptyOrSpaces(search)) {
      console.log("do nothing");
    }else {
      $('#sys_table').DataTable().clear().destroy();
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
        $('#sys_table').DataTable().clear().destroy();
        search_client(search, searchcat);
      }
    }
  });



});

function changepassshow() {
  if ($('#usr_id').val() == "" ||  $('#usr_id').val() == null) {
    Swal.fire({
      title: 'No select a client first',
      icon: 'error',
      confirmButtonText: 'Ok'
    })
  }else{
    $("#user_id_change").val($("#usr_id").val());
    $("#changepassmodal").modal('show');
  }
}


function search_client(search, searchcat) {
  $('#sys_table').DataTable({
    "autoWidth": false,
    "paging": true,
    "searching": false,
    "ordering": true,
    "ajax" : {
      "url" : global.settings.url + '/MainController/getsystemusertablecon',
      "data": {search:search, searchcat:searchcat},
      "dataType": "json",
      "type": "POST"
    },
    "columns" : [{
      "data" : "usr_id"
    },
    {
      "data" : "usr_name"
    },

    {
      "data" : "usr_level"
    },

    {
      "data" : "usr_address"
    },
    {
      "data" : "usr_position"
    },

    {
      "data" : "btn"
    }]
  });
  $('.dataTables_length').addClass('bs-select');
}


function fetchdata(id){
  $('html, body').animate({
    scrollTop: $("#sect2").offset().top
  });
  $.ajax({
    url: global.settings.url + '/MainController/getusercon',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#usr_id').val(res.user_id );
      $('#usr_fn').val(res.usr_firstname );
      $('#usr_mn').val(res.usr_middlename);
      $('#usr_ln').val(res.usr_lastname);
      $('#usr_add').val(res.usr_address);
      $('#usr_cn').val(res.usr_contact_number);
      $('#usr_un').val(res.username);
      $('#usr_un_auth').val(res.username);
      $('#usr_id_auth').val(res.user_id);
      // $('#usr_pass').val(res.password);
      $('#usr_position').val(res.position);
      $('#user_lvl').val(res.user_level);

    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}


$('#login_account').submit(function(e){
  var id = $('#usr_un_auth').val();
  e.preventDefault();
  $.ajax({
    url : global.settings.url + '/Pages/login_acc',
    type : 'POST',
    data : $(this).serialize(),
    dataType : 'json',
    success : function(res){
      console.log(res.user_id);

      if(res.flag == 1)
      {
        $.ajax({
          url: global.settings.url + '/MainController/getusercon',
          type: 'POST',
          data: {
            id: id
          },
          dataType:'JSON',
          success: function(res){
            console.log(res);
            res = res[0];
            $('#usr_id').val(res.user_id );
            $('#usr_fn').val(res.usr_firstname );
            $('#usr_mn').val(res.usr_middlename);
            $('#usr_ln').val(res.usr_lastname);
            $('#usr_add').val(res.usr_address);
            $('#usr_cn').val(res.usr_contact_number);
            $('#usr_un').val(res.username);
            $('#usr_un_auth').val(res.username);
            $('#usr_id_auth').val(res.user_id);
            // $('#usr_pass').val(res.password);
            $('#usr_position').val(res.position);
            $('#user_lvl').val(res.user_level);

          },
          error: function(xhr){
            console.log(xhr.responseText);
          }
        })
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


$('#passform').submit(function(e){
  e.preventDefault();
  $.ajax({
    url : global.settings.url +'/MainController/update_pass',
    type : 'POST',
    data :$(this).serialize(),
    dataType : 'json',
    success : function(res){
      Swal.fire({
        icon: 'success',
        title: 'Password changed'
        // text: 'This tenant must pay the fee before doing any transactions',
      });

      console.log(res);
    },
    error : function(xhr){
      console.log(xhr.responseText);
    }
  });
  // console.log("pass form test");

});
