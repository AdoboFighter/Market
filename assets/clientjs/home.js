var datable;


$(document).ready(function(){

  $( "#table_cheque" ).DataTable({
    "paging": false,
    "searching": false,
    "ordering": false
  });

    $('#check_table').on('click', function () {
  var table_cheque = $('#table_cheque').DataTable();
  var data = table
      .rows()
      .data();

      console.log(data);
    });



  var counter = 1;
  $('#add_cheque').on('click', function () {
    var cheq_amount = $( "#cheqAmountField" ).val();
    var cheq_number = document.getElementById('cheqNumField').value;
    var bank_branch = document.getElementById('bankBranchField').value;
    var table_cheque = $('#table_cheque').DataTable();



    var row_num = table_cheque.rows().count();
    console.log(row_num);

    if (row_num >= 3) {
      $('#chequelimit').modal("show");
    } else {
      table_cheque.row.add([
        cheq_number,
        cheq_amount,
        bank_branch,
        '<button type="button" class="btn btn-secondary">edit</button> &nbsp &nbsp <button type="button" class="btn btn-danger" id="Delete-btn">Delete</a></button> '
      ]).draw(false);
    }
  });

  $('#table_cheque tbody').on( 'click', 'button', function () {
    var table_cheque = $('#table_cheque').DataTable();
      table_cheque
          .row( $(this).parents('tr') )
          .remove()
          .draw();
  } );








});
