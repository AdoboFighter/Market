var datable;

$(document).ready(function(){


  $('#sys_table').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getsystemusertablecon',
      dataSrc : 'data'
    },
    "columns" : [
      {
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

    $('#updateuser').submit(function(e){
      e.preventDefault();
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

    });


  });



  function fetchdata(id){

    console.log(id);
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
        $('#usr_pass').val(res.password);
        $('#usr_position').val(res.position);
        $('#user_lvl').val(res.user_level);

      },
      error: function(xhr){
        console.log(xhr.responseText);
      }
    })
  }
