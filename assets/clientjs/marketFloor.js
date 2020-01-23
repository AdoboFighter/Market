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





$('#world-map').vectorMap({
  backgroundColor: '#22313F',
  onRegionClick: function (event, code) {
    $('#basicExampleModal').modal('show');
  },
});



// $('#location').on('change', function(e) {
//   $('#floortext').val(this.value);
//   e.preventDefault();
//   $.ajax({
//     url : global.settings.url + '/MainController/floorchange',
//     type : 'POST',
//     data : $('#floorform').serialize(),
//     xhrFields: {
//       responseType: 'blob'
//     },
//     success : function(res){
//       console.log(res);
//       //   $('#modalBirthday').modal('show');
//       var a = document.createElement('a');
//       var url = window.URL.createObjectURL(res);
//       a.href = url;
//       $('#iframe_preview_formgen').attr('src',url);
//     },
//     error : function(xhr){
//       console.log(xhr.responseText);
//     }
//   });
//
// });



});
