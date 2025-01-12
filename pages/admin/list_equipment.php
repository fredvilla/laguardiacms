<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_equipment";
// List
$list_title = "Laboratory/Equipment";
$list_header = [ "Name","Category", "Stock", "Price (₱)",];
$list_column = [ "name","category", "stock", "price"];
$list_sql = "SELECT e.*,ec.name as category from tbl_equipment e inner join tbl_equipment_category ec on ec.id = e.equipment_category_id";
$list_del_msg = "Laboratory/Equipment Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_equipment.php?&",
  "edit" => "edit_equipment.php?",
  "delete" => true
];
$_SESSION['back_url'] = "list_equipment.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal"
  data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-plus"></i> Add Equipment</button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_equipment.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>