<?php
include_once('../layout/header.php');
// Modal
$table = "User";
// List
$list_title = "User List";
$list_header = ["Access", "Full's Name", "Email", "Contact Number"];
$list_column = ["access", "fullname", "email", "cn"];
$list_sql = "SELECT x.* from (
select a.*,1 as access_id,'admin' as access,  concat(IFNULL(a.fname, ''),' ', IFNULL(a.mname,''), ' ',IFNULL(a.lname,'') ) as fullname,concat('+63',a.cn) as contact,date_format(a.created_date, '%M %d, %Y') as date_created  from admin a union 
select d.*,2 as access_id,'doctor' as access, concat(IFNULL(d.fname, ''),' ', IFNULL(d.mname,''), ' ',IFNULL(d.lname,'') ) as fullname,concat('+63',d.cn) as contact,date_format(d.created_date, '%M %d, %Y') as date_created  from doctor d union 
select s.*,4 as access_id,'staff' as access,  concat(IFNULL(s.fname, ''),' ', IFNULL(s.mname,''), ' ',IFNULL(s.lname,'') ) as fullname,concat('+63',s.cn) as contact,date_format(s.created_date, '%M %d, %Y') as date_created  from staff s union 
select p.id,p.fname,p.cn,p.addrss,p.email,p.uname,p.password,p.mname,p.lname,p.province_id,p.city_id,p.barangay_id,p.house_no,p.zip_code,p.pic,p.created_date,3 as access_id,'patient' as access, 
concat(p.fname,' ', p.mname, ' ',p.lname ) as fullname,concat('+63',p.cn) as contact,date_format(p.created_date, '%M %d, %Y') as date_created 
 from patient p) x";
$list_del_msg = "User Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_user.php?type=:access&",
  "edit" => "edit_user.php?type=:access&",
  "delete" => true
];
$_SESSION['back_url'] = "list_users.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-user-plus"></i> Add User</button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_user.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>