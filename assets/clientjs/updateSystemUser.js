var datable;

$(document).ready(function(){

  $('.dataTables_length').addClass('bs-select');

  $('#updateuser').submit(function(e){
    e.preventDefault();
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


function search_client(search, searchcat) {
  $('#sys_table').DataTable({
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

  // $("#loginauthmodal").modal('show');
  // console.log(id);
  // $.ajax({
  //   url: global.settings.url + '/MainController/getusercon',
  //   type: 'POST',
  //   data: {
  //     id: id
  //   },
  //   dataType:'JSON',
  //   success: function(res){
  //     console.log(res);
  //     res = res[0];
  //     $('#usr_un_auth').val(res.username);
  //     $('#usr_id_auth').val(res.user_id);
  //   },
  //   error: function(xhr){
  //     console.log(xhr.responseText);
  //   }
  // })

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
