var base_url = window.location.origin + '/Market/';
clienttypepay();
function clienttypepay(){

  var clientselect  =  document.getElementById("clientselect");
  var clientselectvalue = clientselect.options[clientselect.selectedIndex].value;

  var tableNoStall = document.getElementById("tableNoStall");
  var tableTenant = document.getElementById("tableTenant");
  tableTenant.style.display = "";
  tableNoStall.style.display = "";

    if (clientselectvalue == "tenant") {
        tableNoStall.style.display = "none";
        tableTenant.style.display = "";


    } else if (clientselectvalue == "Ambulant"){
      tableNoStall.style.display = "";
      tableTenant.style.display = "none";



    } else if (clientselectvalue == "delivery"){
      tableNoStall.style.display = "";
      tableTenant.style.display = "none";


    } else if (clientselectvalue == "parking"){
      tableNoStall.style.display = "";
      tableTenant.style.display = "none";
    } else {
      tableNoStall.style.display = "";
      tableTenant.style.display = "none";
    }



}
