var datable;


$(document).ready(function(){

  $('#add_vio_tab').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/get_customer_violation_con',
      dataSrc : 'data'
    },
    "columns" : [{
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
    }]
  });

  $('.dataTables_length').addClass('bs-select');

  $('#violation').submit(function(e){
    e.preventDefault();
    console.log( $('#violation').serializeArray());
    $.ajax({
      url : global.settings.url +'/MainController/save_violation_con',
      type : 'POST',
      data :$(this).serialize(),
      dataType : 'json',
      success : function(res){
      console.log(res);
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
    url: global.settings.url + '/MainController/get_customer_info_vio_con',
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
