<?php
session_start();
if(!isset($_SESSION['bookingError']))
{
    $_SESSION['bookingError']=NULL;
}
?>
<html>
<head><link rel="stylesheet" type="text/css" href="bookDescription.css"></head>
<body>
<div id="all">  <?php
    include 'connect.php';
    if(isset($_GET['ID']))
    {

        $bookID=$_GET['ID'];
        $_SESSION['bookID']=$bookID;

    }
    else
    {
        $bookID =$_SESSION['bookID'];
    }


    $sql="SELECT *FROM books where ID = '$bookID'";
    $result=$connect->query($sql);
    $category=$bookID;
    while($row = $result->fetch_assoc())
    {
        if($row['ID']== $category)
        {
            $_SESSION['bookID']=$row['ID'];
            $_SESSION['book']=$row['bname'];
            echo '<li>Book name:'.$row['bname'].'</li>';
            echo '<li>author:'.$row['author'].'</li>';
            echo '<li>ID:'.$row['ID'].'</li>';
            echo '<li>isbn:'.$row['isbn'].'</li>';
            echo '<li>category:'.$row['category'].'</li>';
            echo '<li>Production year:'.$row['pyear'].'</li>';
            break;
        }
    }
    ?> </div>

<div id="all2" <?php
if($_SESSION['role']=='admin')
{
    echo 'hidden';
}
?>
>
    <form method='POST' action="BorrowBook.php">
        <input id="but" type="submit" value="borrow" name="Borrow">
    </form>
    <form method='POST' action="returnBook.php">
        <input id="but" type="submit" value="return" name="return">
    </form>
    <form method='POST' action="extendTime.php">
        <input id="but" type="submit" value="extend" name="extend">
    </form>
    <button id="but" type="button" ><a href="student.php">Main page</a></button>
    <div class="bookingError">
        <?php
        if(isset($_SESSION['bookingError']))
        {
            echo $_SESSION['bookingError'];
            $_SESSION['bookingError']=NULL;
        }


        ?>

    </div>
</div>

</body>
</html>
