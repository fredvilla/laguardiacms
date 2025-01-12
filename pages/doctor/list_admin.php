<?php
include_once('../layout/header.php');
// Modal
$table = "admin";
// List
$list_title = "Admin";
$list_header = [ "Admin's Name", "Email", "Contact Number"];
$list_column = [ "fullname", "email", "cn"];
$list_sql = "SELECT *,concat(fname,' ', mname, ' ',lname ) as fullname,concat('+63',cn) as cn  FROM $table";
$list_del_msg = "Admin Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_user.php?type=admin&",
  "edit" => false,
  "delete" => true
];
$_SESSION['back_url'] = "list_admin.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal"
  data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-user-plus"></i> Add Admin</button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_user.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>