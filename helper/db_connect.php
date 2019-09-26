<?php
// session_start();
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Kolkata');
$timestamp = time();
$page_url = $_SERVER['PHP_SELF'];
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stock";
$charset = 'utf8mb4';

if ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != '127.0.0.1') {
    $localhost = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "stock";
}
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if ($connect->connect_error) {
    die("Connection Failed : " . $connect->connect_error);
} else {
    // echo "Successfully connected";
}
require 'common.php';
?>