var datable;
var id;

$(document).ready(function(){



  $('#client_table').DataTable({
    "pagingType": "full_numbers",
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

  $('#updatecustomerinfo').submit(function(e){
    e.preventDefault();


          $.ajax({
              url: global.settings.url + '/MainController/updatecustomerinfo',
              type: 'POST',
              data: $(this).serialize(),
              dataType:'JSON',
            success: function(res){
              alert('update successful');
              $('#customer_id').val(null);
              $('#owner_fn').val(null);
              $('#owner_mn').val(null);
              $('#owner_ln').val(null);
              $('#owner_add').val(null);
              $('#owner_cn').val(null);

              $('#occu_fn').val(null);
              $('#occu_mn').val(null);
              $('#occu_ln').val(null);
              $('#occu_add').val(null);
              $('#occu_cn').val(null);

              $('#stall_id').val(null);
              $('#stall_number').val(null);
              $('#area').val(null);
              $('#daily_fee').val(null);
            },
            error:function(res){

            }
        });

      });

      // $("a").on('click', function(event) {
      //
      //   // Make sure this.hash has a value before overriding default behavior
      //   if (this.hash !== "") {
      //     // Prevent default anchor click behavior
      //     event.preventDefault();
      //
      //     // Store hash
      //     var hash = this.hash;
      //
      //     // Using jQuery's animate() method to add smooth page scroll
      //     // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      //     $('html, body').animate({
      //       scrollTop: $(hash).offset().top
      //     }, 800, function(){
      //
      //       // Add hash (#) to URL when done scrolling (default click behavior)
      //       window.location.hash = hash;
      //     });
      //   } // End if
      // });
});




function fetchdata(id){
  customerinfo(id);
  transactionhistory(id);

}

function customerinfo(id){

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
        $('#customer_id').val(res[0].customer_id)
        $('#owner_fn').val(res[0].firstname);
        $('#owner_mn').val(res[0].middlename);
        $('#owner_ln').val(res[0].lastname);
        $('#owner_add').val(res[0].address);
        $('#owner_cn').val(res[0].contact_no);

        $('#occu_fn').val(res[0].oafirstname);
        $('#occu_mn').val(res[0].oamiddlename);
        $('#occu_ln').val(res[0].oalastname);
        $('#occu_add').val(res[0].oaaddress);
        $('#occu_cn').val(res[0].contact_no);

        $('#stall_id').val(res[0].stall_id)
        $('#stall_number').val(res[0].stall_number);
        $('#area').val(res[0].area);
        $('#daily_fee').val(res[0].daily_fee);



    },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  })
}



  function transactionhistory(id)
  {
    $('#pay_hist_tab').DataTable().destroy();



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
