<?php
session_start();
$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "laguardiacms";

$conn = mysqli_connect("$host", "$uname", "$pass", "$dbname");

if (!$conn) {
    echo "<h1>Database Error!</h1>";
    die();
}
