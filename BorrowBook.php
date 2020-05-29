<?php
include 'connect.php';
session_start();
$user_Email= $_SESSION['current'];
?>
<?php

$bn=$_SESSION['book'];

$times = time()+20;
$book_ID=$_SESSION['bookID'];
$sql="SELECT *FROM borrowed where userEmail='$user_Email'";
$result =$connect->query($sql);
$checkExistence=true;

while($row = $result->fetch_assoc())
{
    if($row['bookID']== $book_ID && $row['userEmail']==$user_Email)
    {

        $GLOBALS['checkExistence']=false;
    }

}
while($row = $result->fetch_assoc())
{
    if($row['bookID']== $book_ID && $row['userEmail']==$user_Email)
    {

        $GLOBALS['checkExistence']=false;
    }
}
if($checkExistence)
{
    $sql="insert into borrowed (userEmail,bookID,expires,bookname) values('".$user_Email."','".$book_ID."','".$times."','".$bn."')";
    $result =$connect->query($sql);

    header('location:student.php');
}
else
{
$_SESSION['bookingError']=  "Already Borrowed this book";
   header('location: bookDescription.php');

}

?>