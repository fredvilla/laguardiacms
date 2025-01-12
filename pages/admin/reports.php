<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_services";
// List
$list_title = "Report's";

$list_header = ["Patient Name", "Doctor", "Status", "Appointment Date", "Amount"];
$list_column = ["patient_name", "doctor_name", 'status', "appointment_date", "amount"];


if (isset($_GET['from']) && isset($_GET['to'])) {
  $list_sql = "SELECT a.*,date_format(appointment_date, '%M %d, %Y') as appointment_date , concat(ifnull(p.fname,''), ' ', ifnull(p.mname,''), ' ', ifnull(p.lname,'')) as patient_name,concat(ifnull(d.fname,''), ' ', ifnull(d.mname,''), ' ', ifnull(d.lname,'')) as doctor_name, app.amount,app.change FROM tbl_appointment a left join patient p on p.id = a.patient_id left join doctor d on d.id = a.doctor_id left join tbl_appointment_payment app on app.appointment_id = a.id where a.appointment_date between '" . $_GET['from'] . "' AND '" . $_GET['to'] . "' order by a.appointment_date asc";
} else {
  $list_sql = "SELECT a.*,date_format(appointment_date, '%M %d, %Y') as appointment_date , concat(ifnull(p.fname,''), ' ', ifnull(p.mname,''), ' ', ifnull(p.lname,'')) as patient_name,concat(ifnull(d.fname,''), ' ', ifnull(d.mname,''), ' ', ifnull(d.lname,'')) as doctor_name, app.amount,app.change FROM tbl_appointment a left join patient p on p.id = a.patient_id left join doctor d on d.id = a.doctor_id left join tbl_appointment_payment app on app.appointment_id = a.id order by a.appointment_date asc";
}
$list_del_msg = "Service Deleted Successfully!";
$list_enable_actions = false;
$list_actions = [
  "view" => "view_service.php?&",
  "edit" => "edit_service.php?",
  "delete" => true
];
$_SESSION['back_url'] = "list_service.php";
?>
<form class="form-inline" style="margin-left: 30px; padding:0">
  <div class="form-group mb-2">
    <label for="" class="mr-2">Date From </label>
    <input type="date" name="from" required class="form-control" id="staticEmail2" placeholder="Date From" value="<?= isset($_GET['from']) ? $_GET['from'] : "" ?>">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="" class="mr-2">To </label>
    <input type="date" name="to" required class="form-control" id="inputPassword2" placeholder="Date To" value="<?= isset($_GET['to']) ? $_GET['to'] : "" ?>">
  </div>
  <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
  <button type="button" class="btn btn-primary mb-2" id="btn-print">Print</button>
</form>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_service.php');
  include_once('../layout/list.php'); ?>

  <script>
    function printData() {
      var divToPrint = document.getElementById("printTable");
      newWin = window.open("");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
      newWin.close();
    }

    $('#btn-print').on('click', function() {
      printData();
    })
  </script>
  <?php
  include_once('../layout/footer.php');
  ?>