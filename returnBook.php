<?php
include 'connect.php';
session_start();
$userEmail= $_SESSION['current'];
?>
<?php
$book_ID=$_SESSION['bookID'];
$sql="SELECT *FROM borrowed where bookID= '$book_ID' AND userEmail='$userEmail'";
$result =$connect->query($sql);
$checkExistence=false;
while($row = $result->fetch_assoc())
{
    if($row['bookID']== $book_ID && $row['userEmail']==$userEmail)
    {    
        $GLOBALS['checkExistence']=true;
    }
}
if($checkExistence)
{
    $sql="delete from borrowed
where userEmail='$userEmail' AND bookID ='$book_ID'";
$result =$connect->query($sql);
$sql="UPDATE users
set Rented = Rented-1 
where email='$userEmail'";
$result=$connect->query($sql);
header('location:student.php');
}
else
{
    $_SESSION['bookingError']= "You did not borrow this book"   ;
    header('location: bookDescription.php');
}

?>