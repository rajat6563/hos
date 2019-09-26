<?php 
require_once 'helper/core.php';
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 
header('location: login.php');
?>