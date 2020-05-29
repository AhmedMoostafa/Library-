<?php
include 'connect.php';
session_start();

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $sql="SELECT email ,PASSWORD
FROM users";

    $result=$connect->query($sql);
 $exist=false;
while($row = $result->fetch_assoc()) {
   if($email==$row['email'])
   {
       $exist=true;
       break;
   }
}
if($exist)
{

    $_SESSION['errormsg']="this email already exist";
     header("location: signup.php");
}
else
{
    $sql="insert into users (uname,PASSWORD,email,role) values('".$username."','".$password."','".$email."','"."student"."')";
    $result =$connect->query($sql);
    $_SESSION['current']=$email;
    $_SESSION['role']='student';
    header("location: student.php");
}



