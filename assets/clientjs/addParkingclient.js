// var base_url = window.location.origin + '/Market/';

$(document).ready(function(){

  $('#add_vio_tab').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/add_park_get_stall',
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





  $('#savePark').submit(function(e){
  e.preventDefault();
  console.log( $('#savePark').serializeArray() );
  $.ajax({
       url : global.settings.url +'/MainController/saveparking',
       type : 'POST',
       data : $(this).serialize(),
       dataType : 'json',
       success : function(res){
       console.log(res);
       Swal.fire({
         icon: 'success',
         title: 'Added',
       });
       $('#violationmodal').modal("toggle");
       $('#savePark')[0].reset();
       },
       error : function(xhr){
         console.log(xhr.responseText);
       }

     });


  });
});


function fetchdata(id){
       $('#savePark')[0].reset();
  console.log(id);
  $.ajax({
    url: global.settings.url + '/MainController/getcustomerinfopark',
    type: 'POST',
    data: {
      id: id
    },
    dataType:'JSON',
    success: function(res){
      console.log(res);


      if (res == 'withpark') {
        Swal.fire({
          icon: 'error',
          title: 'Tenant Has a existing Parking client',
        });
      }else {
        res = res[0];
        $('#customer_id').val(res.customer_id );
        $('#tenant_id').val(res.tenant_id );
        $('#violationmodal').modal("show");
      }






    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}
