var datable;


$(document).ready(function(){

  $('#client_table').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcustomertable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },

    {
      "data" : "c_info_stall_number"
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
    }]
  });



  $('.dataTables_length').addClass('bs-select');


});


function fetchdata(id){

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
      res = res[0];

      $('#owner_fn').val(res.firstname );
      $('#owner_mn').val(res.middlename );
      $('#owner_ln').val(res.lastname);
      $('#owner_add').val(res.address);
      $('#owner_cn').val(res.dailyfee);
      $('#stall_number').val(res.unit_no);
      $('#area').val(res.sqm);
      $('#daily_fee').val(res.dailyfee);

      $('#occu_fn').val(res.aofirstname );
      $('#occu_mn').val(res.aomiddlename );
      $('#occu_ln').val(res.aolastname);
      $('#occu_add').val(res.aoaddress);
      $('#occu_cn').val(res.ao_cn);


      // $('#pay_hist_tab').DataTable({
      //   destroy: true,
      //   "ajax" : {
      //     "url" : global.settings.url + '/MainController/getcustomerinfocon',
      //     dataSrc : 'data',
      //     data: {id: id},
      //     type: 'POST',
      //     dataType:'JSON'
      //   },
      //   "columns" : [
      //   {
      //     "data" : "c_info_OR"
      //   },
      //
      //   {
      //     "data" : "c_info_nature"
      //   },
      //
      //
      //   {
      //     "data" : "c_info_amount"
      //   },
      //
      //   {
      //     "data" : "c_info_date"
      //   }]
      // });



    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}
