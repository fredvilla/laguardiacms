<?php
require_once('config/conn.php');

if (!empty($_GET)) {
  extract($_GET);
  // city
  if (isset($province_id)) {
    $table = 'tbl_city';
    $column = 'province_id';
    $id = $province_id;
  } else {
    // barangay default
    $table = 'tbl_barangay';
    $column = 'city_id';
    $id = $city_id;
  }
  $query = "SELECT * FROM $table where $column = '$id'";
  $query_run = mysqli_query($conn, $query);
  if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $res) {
      echo '<option value="' . $res['id'] . '" ' . ((isset($default) && $default == $res['id']) ? 'selected' : '') . ' zip="'.(($table =='tbl_city') ? $res['zip_code'] : 0).'">' . $res['name'] . '</option>';
    }
  }
}