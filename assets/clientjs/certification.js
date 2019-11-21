var datable;


$(document).ready(function(){

  $('#cert_table').DataTable({
    "ajax" : {
      "url" : global.settings.url + '/MainController/getcerttable',
      dataSrc : 'data'
    },
    "columns" : [{
      "data" : "id"
    },
    {
      "data" : "c_info_fullname_owner"
    },

    {
      "data" : "c_info_address"
    },
    {
      "data" : "c_info_stall_number"
    },

    {
      "data" : "btn"
    }]
  });



  $('.dataTables_length').addClass('bs-select');

  $('#certform').submit(function(e){
    e.preventDefault();
    $.ajax({
      url : global.settings.url + '/MainController/pdf2fcert',
      type : 'POST',
      data : $('#certform').serialize(),
      xhrFields: {
        responseType: 'blob'
      },
      success : function(res){
        //   $('#modalBirthday').modal('show');
        var a = document.createElement('a');
        var url = window.URL.createObjectURL(res);
        a.href = url;
        $('#iframe_preview_formgen').attr('src',url);
      },
      error : function(xhr){
        console.log(xhr.responseText);
      }
    });
  });





});

function setIframeSource() {
  var theSelect = document.getElementById('location');
  var theIframe = document.getElementById('iframe_preview_formgen');
  var theUrl;

  theUrl = theSelect.options[theSelect.selectedIndex].value;
  theIframe.src = theUrl;


}


function fetchdata(id){

$('#certmodal').modal("show");
console.log(id);
$.ajax({
  url: global.settings.url + '/MainController/get_cert_info_con',
  type: 'POST',
  data: {id: id},
  dataType:'JSON',
  success: function(res){
    console.log(res);

    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];
    const m = new Date();
    var month = monthNames[m.getMonth()];
    res = res[0];
    var d = new Date();
    var n = d.getDate();
    var year = new Date().getFullYear();
    $('#fname').val(res.firstname );
    $('#mname').val(res.middlename );
    $('#lname').val(res.lastname);
    $('#address').val(res.address);
    $('#natbus').val(res.nature_or_business);
    $('#flrlvl').val(res.address);
    $('#stall').val(res.unit_no);
    $('#floor_level').val(res.floor_level);
    $('#days').val(n);
    $('#month').val(month);
    $('#year').val(year);


  },
  error: function(xhr){
    console.log(xhr.responseText);
  }
})
}
