// Call the dataTables jQuery plugin

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

$(document).ready(function() {
  var table = $('#dataTable').DataTable();
  var currentURL = window.location.href;
  var substringToCheck = "list_appointment.php";
  

  if (currentURL.includes(substringToCheck)) {

  const newInput = document.createElement("input");
  newInput.type = "date";
  newInput.min = formatDate();
  newInput.id = "dateFilter";
  newInput.value = formatDate();
    
  const newlabel = document.createElement("label");
  newlabel.innerHTML = "&nbsp Date:";
  newlabel.appendChild(newInput);
    
  document.querySelector("#dataTable_filter").appendChild(newlabel);

    
    $('#dateFilter').on('keyup', function () {
      today = new Date($(this).val())
      var options = {year: 'numeric', month: 'long', day: 'numeric' };
      console.log(today.toLocaleDateString("en-US", options));
      table.column(3).search(today.toLocaleDateString("en-US", options)).draw();
    });
    $('#dateFilter').trigger('keyup');
  }
});
