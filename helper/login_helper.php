<?php
require_once 'core.php';
$username = secureSuperGlobal($_POST['username']);
$password = secureSuperGlobal($_POST['password']);
$save = true;
if ($password == '') {
    echo "Please Enter Password";
    $save = false;
}
if ($username == '') {
    echo "Please Enter Username";
    $save = false;
}
if ($save == true) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $password = md5($password);
        // exists
        $mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND active = 1";
        $mainResult = $connect->query($mainSql);

        if ($mainResult->num_rows == 1) {
            $value = $mainResult->fetch_assoc();

            // set session
            $_SESSION['user_details'] = $value;
            $_SESSION['userId'] = $value['user_id'];
            $_SESSION['username'] = $value['username'];
            $_SESSION['displayname'] = $value['displayname'];
            $_SESSION['email'] = $value['email'];
            $_SESSION['usertype'] = $value['usertype'];
            echo true;
        } else {
            echo "Incorrect username/password combination";
        } // /else
    } else {
        echo "Username doesnot exists";
    }
}
