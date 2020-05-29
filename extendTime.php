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
$checkExtended=false;
while($row = $result->fetch_assoc())
{
    if($row['bookID']== $book_ID && $row['userEmail']==$userEmail)
    {    
        $GLOBALS['checkExistence']=true;
        if($row['ifExtended']==1)
        {
            $GLOBALS['checkExtended']=true;
        }
    }
}
if($checkExistence)
{
    
    if(!$checkExtended)
    {
    $sql="UPDATE borrowed
    set expires = expires+180, ifExtended=ifExtended +1
    where userEmail='$userEmail' AND bookID='$book_ID'";
    $result=$connect->query($sql);
    header('location:student.php');
    }
    else
    {
        $_SESSION['bookingError']= "You have already extended the borrowing period". "</br>"."You can't extend it again";
        header('location:bookDescription.php');

    }
}
else
{
    $_SESSION['bookingError']= "You did not borrow this book";
    header('location: bookDescription.php');

}
?>

