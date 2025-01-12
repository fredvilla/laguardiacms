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
  "edit" => "edit_service.php?",
  "delete" => true
];
$_SESSION['back_url'] = "list_service.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal"
  data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-plus"></i> Add Service</button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_service.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>