<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_service_category";
// List
$list_title = "Service Category";
$list_header = [ "Name"];
$list_column = [ "name"];
$list_sql = "SELECT * from tbl_service_category";
$list_del_msg = "Service Category Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => false,
  "edit" => "edit_service_category.php?",
  "delete" => true
];
$_SESSION['back_url'] = "list_service_category.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal"
  data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-plus"></i> Create
  <?= $list_title ?></button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_category.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>