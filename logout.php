<?php
require_once('config/conn.php');
session_destroy();
header('location:index.php');
