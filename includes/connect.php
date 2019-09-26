<?php
session_start();
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Kolkata');
$timestamp = time();
$page_url = $_SERVER['PHP_SELF'];
$host = 'localhost';
$db = 'inventorymanager';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
if ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != '127.0.0.1') {

}
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo '<script type="text/javascript">alert("Connection Success");</script>';
} catch (\PDOException $e) {
    // echo '<script type="text/javascript">alert("Connection Failed");</script>';
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
require 'common.php';
