<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_services";
// List
$list_title = "Service's";
$list_header = [ "Name",  "Price (₱)",];
$list_column = [ "name",  "price"];
$list_sql = "SELECT * from tbl_services";
$list_del_msg = "Service Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_service.php?&",
  "edit" => false,
  "delete" => false
];
$_SESSION['back_url'] = "list_service.php";
?>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_service.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>