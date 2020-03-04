var datable;

$(document).ready(function(){

  $( "#payhistbtn" ).click(function() {
    $('#violationmodal').modal('show');

  });

  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };

  $( "#payhistbtn" ).click(function() {
    $('#violationmodal').modal('show');
  });

  $('#search_cl_f').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    var search = $("#search_cl_f").val();

    $('#parkTable').DataTable().clear().destroy();
    search_client(search);

  }
});



function search_client(search) {
  $('#parkTable').DataTable({
    "paging": true,
    "searching": false,
    "ordering": true,
    "ajax" : {
      "url" : global.settings.url + '/MainController/getparkingpaytablecon',
      "data": {search:search},
      "dataType": "json",
      "type": "POST"
    },
    "columns" : [

      {
        "data" : "id"
      },

      {
        "data" : "pay_parking_lot"
      },

      {
        "data" : "pay_parking_name"
      },

      {
        "data" : "btn"
      }

  ]
  });
    $('.dataTables_length').addClass('bs-select');
}




  // datable = $('#parkTable').DataTable({
  //   "ajax" : {
  //     "url" : global.settings.url + '/MainController/getparkingpaytablecon',
  //     dataSrc : 'data'
  //   },
  //   "columns" : [
  //     {
  //       "data" : "id"
  //     },
  //
  //     {
  //       "data" : "pay_parking_lot"
  //     },
  //
  //     {
  //       "data" : "pay_parking_name"
  //     },
  //
  //     {
  //       "data" : "btn"
  //     }]
  //   });
    $('.dataTables_length').addClass('bs-select');

    $("#park_lot").inputFilter(function(value) {
      return /^-?\d*$/.test(value); });

      $('#updatecustomerinfo').submit(function(e){
        e.preventDefault();


        $.ajax({
          url: global.settings.url + '/MainController/updateparkinginfo',
          type: 'POST',
          data: $(this).serialize(),
          dataType:'JSON',
          success: function(res){
            Swal.fire({
              icon: 'success',
              title: 'Updated',
            });
            $('#updatecustomerinfo')[0].reset();
            datable.ajax.reload();

          },
          error:function(res){

          }
        });

      });


    });





    function fetchdata(id){
      fetchdata2(id);
      transactionhistory(id);

    }

    function fetchdata2(id){

      console.log(id);
      $.ajax({
        url: global.settings.url + '/MainController/getparkingpay',
        type: 'POST',
        data: {
          id: id
        },
        dataType:'JSON',
        success: function(res){
          console.log(res);
          res = res[0];
          $('#customer_id').val(id);
          $('#name').val(res.firstname + ' '+ res.middlename +' ' + res.lastname);
          $('#stall').val(res.unit_no);
          $('#park_lot').val(res.lot_no);
          $('#driver_id').val(res.driver_id);


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
          "url" : global.settings.url + '/MainController/getcustomertransactionhistorypark/' + id,
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
