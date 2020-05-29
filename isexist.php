<?php
include 'connect.php';
session_start();

$sql="SELECT email ,PASSWORD,role
FROM users;";
$password = $_POST['password'];
$exist = false;
if (preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{1,16}$/", $password )) {

} else {
    $_SESSION['notexist']=true;
    header('location: login.php');
}

    $result = $connect->query($sql);
    $email = $_POST['email'];

    while ($row = $result->fetch_assoc()) {
        if ($email == $row['email'] && $password == $row['PASSWORD']) {
            $exist = true;
            $_SESSION['current'] = $email;
            break;
        }
    }
    $_SESSION['role'] = $row['role'];
    if ($exist == false) {
        $_SESSION['notexist']=true;
        header('location: login.php');
    } else {
        if ($_POST['remChkBox'] == '1' || $_POST['remChkBox'] == 'on') {
            $hour = time() + 60;
            setcookie('email', $email, $hour);
            setcookie('pass', $password, $hour);
        }
        if ($row['role'] == 'student') {
            header('location: student.php?stat=true');
        } else {
            header('location: admin.php');
        }


    }

