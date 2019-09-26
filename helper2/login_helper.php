<?php include '../includes/connect.php';
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
            $user_id = $value['user_id'];

            // set session
            $_SESSION['user_details'] = $value;
            $_SESSION['userId'] = $value['user_id'];
            $_SESSION['username'] = $value['username'];
            $_SESSION['displayname'] = $value['displayname'];
            $_SESSION['email'] = $value['user_name'];
            $_SESSION['usertype'] = $value['usertype'];
        } else {
            echo "Incorrect username/password combination";
        } // /else
    } else {
        echo "Username doesnot exists";
    }

    // $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE user_login = ?");
    // $stmt->execute([$_POST['username']]);
    // $user = $stmt->fetch();
    // if ($user && password_verify($password, $user['user_pass'])) {
    //     $_SESSION['user_details'] = $user;
    //     $_SESSION['user_id'] = $user['user_id'];
    //     $_SESSION['user_name'] = $user['user_name'];
    //     $_SESSION['user_login'] = $user['user_name'];
    //     $_SESSION['user_type'] = $user['user_type'];
    //     echo true;
    // } else {
    //     echo false;
    // }
}
