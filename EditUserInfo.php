<?php
session_start();
include 'connect.php';
$_SESSION['answer']=NULL;
$validpass=true;
if(isset($_POST['newpass'])){
    if($_POST['newpass']!=$_POST['renewpass']) {
        $_SESSION['answer']='Confirmation password mismatched';
        header("location:editUserInfoForm.php");
        $validpass = false;
    }
}
$validemail=true;
if($_POST['newemail']!=$_SESSION['current']){
    $sql = "SELECT * FROM users";
    $result=$connect->query($sql);
    $row;
    while ($row = $result->fetch_assoc()) {
        if ($row['email'] == $_POST['newemail']) {
            $validemail=false;
            $_SESSION['answer']='this email is already exist';
            header("location:editUserInfoForm.php");
            break;
        }
    }
}
if($validemail&&$validpass){
    $newemial=$_POST['newemail'];
    $newuname=$_POST['newuname'];
    $newpass=$_POST['newpass'];
    $old=$_SESSION['current'];
    $sql=" UPDATE users
        SET email ='$newemial' , uname = '$newuname', PASSWORD= '$newpass'
        WHERE email='$old'";
    $result=$connect->query($sql);
    if($result){
        $_SESSION['answer']='edit succeed';

        header("location:editUserInfoForm.php");
    }
}
?>
