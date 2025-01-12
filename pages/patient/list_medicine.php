<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_medicine";
// List
$list_title = "Medicine";
$list_header = [ "Type","Name", "Price (₱)", "Stock", "Total Price (₱)"];
$list_column = [ "type", "name", "price", "stock", "total"];
$list_sql = "SELECT m.*,sum(ifnull(ms.stock,0)) as stock, sum(ifnull(ms.stock,0)) * m.price as total FROM tbl_medicine m left join tbl_medicine_stock ms on ms.medicine_id = m.id group by m.id";
$list_del_msg = "Medicine Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_medicine.php?",
  "edit" => false,
  "delete" => false
];
$_SESSION['back_url'] = "list_medicine.php";
?>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_medicine.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>