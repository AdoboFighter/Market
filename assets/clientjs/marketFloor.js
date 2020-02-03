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

  $('#dateToday').text(month +","+" "+ n +" "+ year);

  $('#numstall').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofstalls',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numstall').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });

  $('#numambu').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofambu',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numambu').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });



  $('#numAllTrans').text(function() {
    $.ajax({
      url: global.settings.url + '/MainController/numberofcurtrans',
      type: 'POST',
      data: $(this).serialize(),
      dataType:'JSON',
      success: function(res){
        console.log(res);
        $('#numAllTrans').text(res);
      },
      error:function(res){
        console.log('sala');
      }
    });
  });





  var map = new jvm.Map({
    container: $('#map'),
    map: 'ground_floor',
    backgroundColor: '#22313F',
    onRegionClick: function (event, code) {
      $('#basicExampleModal').modal('show');
      $("#stallhead").text(map.getRegionName(code));
      $("#stallhead_pay").text(map.getRegionName(code));
      $("#stallinput").val(map.getRegionName(code));


      var stall_list_table =  $('#stall_floor_info').DataTable({

        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        searching: false,
        "ajax" : {
          "url" : global.settings.url + '/MainController/getstallFLOOR/' + code,
          "type": 'POST',
          "dataType":'JSON',

          dataSrc : 'data'
        },
        "columns" : [{
          "data" : "unit_no"
        },

        {
          "data" : "name"
        },


        {
          "data" : "payment"
        },


        {
          "data" : "client_info"
        }]
      });

      $('#basicExampleModal').on('hidden.bs.modal', function () {
        stall_list_table.destroy();

      });
    }
  });

  $('.dataTables_length').addClass('bs-select');


});


function launch_pay() {

}

function fetch_info() {
  $('#client_info_modal').modal('show');
}
