<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_equipment";
// List
$list_title = "Laboratory/Equipment";
$list_header = [ "Name", "Stock", "Price (₱)",];
$list_column = [ "name", "stock", "price"];
$list_sql = "SELECT * from tbl_equipment";
$list_del_msg = "Laboratory/Equipment Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_equipment.php?&",
  "edit" => false,
  "delete" => false
];
$_SESSION['back_url'] = "list_equipment.php";
?>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_equipment.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>