<?php
function is_valid_email($email)
{
    if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", $email)) {
        return false;
    }
    return true;
}
function is_valid_phone($phone)
{
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
        return false;
    }
    return true;
}
function secureSuperGlobal($var)
{
    $var = htmlspecialchars(stripslashes($var));
    $var = str_ireplace("script", "blocked", $var);
    // $var    = mysql_escape_string($var);
    return $var;
}
