var datable;


$(document).ready(function(){

  // $('#add_vio_tab').DataTable({
  //   "ajax" : {
  //     "url" : global.settings.url + '/MainController/get_tenant_violation_con',
  //     dataSrc : 'data'
  //   },
  //   "columns" : [{
  //     "data" : "id"
  //   },
  //   {
  //     "data" : "c_info_fullname_owner"
  //   },
  //
  //   {
  //     "data" : "c_info_stall_number"
  //   },
  //
  //   {
  //     "data" : "vio_address"
  //   },
  //
  //
  //   {
  //     "data" : "c_info_fullname_occupant"
  //   },
  //   {
  //     "data" : "btn"
  //   }]
  // });



  // $('#getviolationtable').DataTable({
  //   "ajax" : {
  //     "url" : global.settings.url + '/MainController/get_violation_data_con',
  //     dataSrc : 'data'
  //   },
  //   "columns" : [{
  //     "data" : "description"
  //   },
  //   {
  //     "data" : "date_occured"
  //   },
  //
  //   {
  //     "data" : "status"
  //   },
  //   {
  //     "data" : "name"
  //   }]
  // });

  $('.dataTables_length').addClass('bs-select');

  $('#violationform').submit(function(e){
    e.preventDefault();
    console.log( $('#violationform').serializeArray());
    $.ajax({
      url : global.settings.url +'/MainController/save_violation_con',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
        Swal.fire({
          icon: 'success',
          title: 'Violation Added',
          text: 'This tenant must pay the fee before doing any transactions',
        });
          $('#violationmodal').modal("toggle");
      console.log(res);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });
  });

  $('#search_cl_f').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      var search = $("#search_cl_f").val();

      $('#tableNoStall').DataTable().clear().destroy();
      search_client(search);

    }
  });

});

function search_client(search) {
  $('#add_vio_tab').DataTable({
    "paging": true,
    "searching": false,
    "ordering": true,
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_tenant_violation_con',
      "data": {search:search},
      "dataType": "json",
      "type": "POST"
    },
    "columns" : [
      {
        "data" : "id"
      },
      {
        "data" : "c_info_fullname_owner"
      },

      {
        "data" : "c_info_stall_number"
      },

      {
        "data" : "vio_address"
      },


      {
        "data" : "c_info_fullname_occupant"
      },
      {
        "data" : "btn"
      }
  ]
  });
    $('.dataTables_length').addClass('bs-select');
}


function fetchdata(id){
  $('#violationmodal').modal("show");
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/gettenantpay',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);
      res = res[0];
      $('#stall_id_f').val(res.stall_id );
      $('#stall_num_f').val(res.unit_no );
      $('#owner_f').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
      $('#address_f').val(res.address);
      $('#occu_f').val(res.aofirstname + ' '+ res.aomiddlename +' ' + res.aolastname);


    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}
